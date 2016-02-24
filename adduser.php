<?php 
   require_once 'header.php';
   if(isset($_POST['submit'])){
     $username = sanitizeString($_POST['username']); 
     $password = sanitizeString($_POST['password']);
     $email = sanitizeString($_POST['email']);
     $apikey = 'none';
     $birthday = sanitizeString($_POST['birthday']);
     $birthday = substr($birthday,0,4).substr($birthday,5,2).substr($birthday,8,2);
     $birthday = substr(date('r',strtotime($birthday)),0,16);   
     $question = sanitizeString($_POST['question']);
     $answer = sanitizeString($_POST['answer']);
     $salt1 = "zq&h*";
     $salt2 = "pz!@";
     $hash_password = hash('ripemd128', "$salt1$password$salt2");
     queryMysql("INSERT INTO members VALUES('$username', '$hash_password','$email','$birthday','$apikey',$question,'$answer')");
       echo "Congo! Sign up successfull please login here !!!!<br><a href='http://10.8.121.232/try/'>Log in</a>";
   }
       else{
       echo "Sign up failed please try again !!!";
   } 
?>
