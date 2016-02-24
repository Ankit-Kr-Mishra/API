<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="validate.js"></script>
    <script src="OSC.js">    </script>
</head>
<body id="bodyIndex">
    <h1>Log in to use our API</h1>
    <div id="img"><img id="bus" src="images.jpg"></div>
    <span id="info"></span>  
       <?php 
   require_once 'header.php';
   if(isset($_POST['submit'])){
     $username = sanitizeString($_POST['username']); 
     $password = sanitizeString($_POST['password']);
     $salt1 = "zq&h*";
     $salt2 = "pz!@";
     $hash_password = hash('ripemd128', "$salt1$password$salt2");
     $result = queryMySQL("SELECT * FROM members WHERE username='$username' AND password='$hash_password'");

     if ($result->num_rows == 0)
      {
        echo "<script>document.getElementById('info').innerHTML = 'Invalid user'</script>";
      }
      else
      {
        $_SESSION['username'] = $username; 
        $_SESSION['password'] = $password;
        $result->data_seek(0);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['email'] = $row['email'];
        $_SESSION['birthday'] = $row['birthday'];
        $_SESSION['apikey'] = $row['apikey'];  
        $_SESSION['question'] = $row['question'];
        $_SESSION['answer'] = $row['answer'];
        echo "<script>document.getElementById('info').innerHTML = 'Welcome to timepass<br><a href=generate.php>click here</a>'</script>";
      }
   }
?> 
        <script>
         div = S('img');bus = S('bus');
         div.paddingLeft = (window.innerWidth-(window.innerWidth*0.26))/2 + 'px';
         bus.height = window.innerHeight*0.3 + 'px';
         bus.width = window.innerWidth*0.26 + 'px';   
    </script>
         <table id="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee" hidden="hidden">
      <th colspan="3" align="center">Signup Form</th>
      <form method="post" action="adduser.php" onsubmit="return validate(this)">
        <tr><td>Username</td>
            <td><input type="text" maxlength="16" name="username" required="required" onblur="checkUser(this)"></td>
            <td><span id='infoname'></span></td>
        </tr>
        <tr><td>Password</td>
            <td><input type="password" maxlength="20" name="password"  autocomplete="off" required="required" onblur="checkPass(this)"></td>
            <td><span id='infopass'></span></td>
        </tr>
        <tr><td>Email</td>
            <td><input type="email" maxlength="64" name="email" required="required" onblur="checkEmail(this)"</td>
            <td><span id='infoemail'></span></td>
        </tr>
        <tr><td>Birthday</td>
            <td><input type="date" name="birthday" required="required"></td>
            <td><span></span></td>
        </tr>
        <tr><td>Security Question</td>
            <td><select name="question" size="1" required="required">
                <option value="1">pet's name</option>
                <option value="2">girlfriend's name</option>
                <option value="3">boyfriend's name</option>
                <option value="4">favourite colour</option>
                <option value="5">favourite book</option>
                </select></td>
            <td><span></span></td>
        </tr>
        <tr><td>Answer</td>
            <td><input type="text" maxlength="32" name="answer" required="required" onblur="checkAnswer(this)"></td>
            <td><span id='infoanswer'></span></td>
        </tr>
        <tr><td colspan="3" align="center"><input type="submit" name='submit' value="Signup"></td>
        </tr>
      </form>
    </table>
    <script>
     function show(){
              document.getElementById('signup').hidden="";
          }
    </script>
    <table id="details" cellspacing=15px><form action="index.php" method="post">
       <tr><td id="username"> Username  </td>
           <td><input type="text" name="username" class="up" required='required'></td>
       </tr>
       <tr><td id="username">Password  </td>
           <td><input type=password name="password" class="up" required='required'></td>
       </tr>
       <tr><td colspan="2"></td>
       </tr>
       <tr><td colspan="2"></td>
       </tr>
       <tr><td colspan="2"></td>
       </tr>
       <tr><th colspan="2" align="center"><input type="submit" value="login" name="submit" class="login"> </th>
       </tr>
    </form></table>
    <script>
      det = S('details');
         det.top = (window.innerHeight)*0.476 + 'px'; 
         det.left = window.innerWidth*0.3724 + 'px';
    </script>
    <div id="chhotu"> <span>Don't have an account?<a onclick="show()"><u>sign up</u></a></span><br></div>
</body>
</html>
