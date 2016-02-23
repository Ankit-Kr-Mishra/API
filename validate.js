function checkUser(username){
    field = username.value;
    if(field.length < 5){
        O('infoname').innerHTML='&nbsp;&#x2718; minimum 5 characters';
                         S('infoname').color = 'red';return;
    }
    else if(field.length > 15){
        O('infoname').innerHTML='&nbsp;&#x2718; maximum 15 characters';
                         S('infoname').color = 'red';return;
    }
  else if (/[^a-zA-Z0-9_-]/.test(field)){
       O('infoname').innerHTML='&nbsp;&#x2718; see alert';
                         S('infoname').color = 'red';
      alert("Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n");
      return;
  }
     params  = "username=" + username.value
        request = new ajaxRequest()
        request.open("POST", "checkuser.php", true)
         request.setRequestHeader("Content-type",
          "application/x-www-form-urlencoded")
        request.setRequestHeader("Content-length", params.length)
        request.setRequestHeader("Connection", "close")
         request.onreadystatechange = function()
        {
          if (this.readyState == 4)
            if (this.status == 200)
              if (this.responseText != null)
                O('infoname').innerHTML = this.responseText
        }
        request.send(params)
      }
       function ajaxRequest()
      {
        try { var request = new XMLHttpRequest() }
        catch(e1) {
          try { request = new ActiveXObject("Msxml2.XMLHTTP") }
          catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
              request = false
        } } }
        return request
      }
function checkPass(pass){
    password = pass.value;
    if (password.length<6) {O('infopass').innerHTML = '&nbsp;&#x2718; minimum 6 characters.';
                         S('infopass').color = 'red';
                        }
  else if (password.length > 15){
      O('infopass').innerHTML = '&nbsp;&#x2718;too long(max=15)';
                         S('infopass').color = 'red';
  }
  else if (!/[a-z]/.test(password) || ! /[A-Z]/.test(password) ||
           !/[0-9]/.test(password)){
      O('infopass').innerHTML = '&nbsp;&#x2718;see alert';
                         S('infopass').color = 'red';
      alert('Password requires one each of a-z, A-Z and 0-9.')
  }
  else{
    O('infopass').innerHTML = '&nbsp;&#x2714;';
                         S('infopass').color = 'green';
  }
}
 
function checkEmail(email){
    field = email.value;
    if (field == "") {
        O('infoemail').innerHTML = '&nbsp;&#x2718; empty';
                         S('infoemail').color = 'red';
    }
    else if (!((field.indexOf(".") > 0) &&
               (field.indexOf("@") > 0)) ||
              /[^a-zA-Z0-9.@_-]/.test(field)){
        O('infoemail').innerHTML = '&nbsp;&#x2718; Invalid email address.';
                         S('infoemail').color = 'red';
    }
    else{
         O('infoemail').innerHTML = '&nbsp;&#x2714;';
                         S('infoemail').color = 'green';
    }
}

function checkAnswer(ans){
     field = ans.value;
     if (field == ""){
          O('infoanswer').innerHTML = '&nbsp;&#x2718; empty';
                         S('infoanswer').color = 'red';
     } 
  else if (field.length > 30){
       O('infoanswer').innerHTML = '&nbsp;&#x2718;too long(max=30)';
                         S('infoanswer').color = 'red';
  }
  else{
         O('infoanswer').innerHTML = '&nbsp;&#x2714;';
                         S('infoanswer').color = 'green';
    } 
}
function validate(form)
      {
        fail  = validateUsername(form.username.value)
        fail += validatePassword(form.password.value)
        fail += validateEmail(form.email.value)
        fail += validateAnswer(form.answer.value)

        if   (fail == "")   return true
        else { alert(fail); return false }
          
function validateUsername(field)
{
  if (field == "") return "No Username was entered.\n"
  else if (field.length < 5 || field.length > 15)
    return "Usernames must be at least 5 and at max 15 characters\n"
  else if (/[^a-zA-Z0-9_-]/.test(field))
    return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n"
  return ""
}

function validatePassword(field)
{
  if (field == "") return "No Password was entered.\n"
  else if (field.length < 6 || field.length > 15)
    return "Passwords must be at least 6 and at max 15 characters.\n"
  else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) ||
           !/[0-9]/.test(field))
    return "Passwords require one each of a-z, A-Z and 0-9.\n"
  return ""
}

function validateAnswer(field)
{
   if (field == "") return "No Answer was entered.\n"
  else if (field.length > 30)
    return "Answer must be less than 30 characters"
  return ""
}

function validateEmail(field)
{
  if (field == "") return "No Email was entered.\n"
    else if (!((field.indexOf(".") > 0) &&
               (field.indexOf("@") > 0)) ||
              /[^a-zA-Z0-9.@_-]/.test(field))
      return "The Email address is invalid.\n"
  return ""
}    
      }