
<!DOCTYPE html>
<html>
<head>
<meta name="viewport", initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 20%;
  padding: 5px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity: 0.8;
}

.combo {

  
}

.cancelbtn {
  width: 20%;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 10px;
}

.myLogo{
    width: 60px; 
    height: 60px;
    margin-top: -10px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #ffa31a;
  text-align: center;
}
</style>
</head>
<body">
<?php
include("header.php");
?>
<center>
<form action="sendmail.php" method="post" name="formreg">
  <div class="container">
    
    <input type="hidden"  name="Empname">
    <input type="text" placeholder="Email" onfocusout="ValidateEmail(document.formreg.emailAdd)" id="emailAdd" name="emailAdd" required>
    <br>
    <input type="password" placeholder="Password" name="pass1" required> <br>
     <input type="password" placeholder="Confirm Password" name="pass2" required> <br>
    <button type="submit" name="submit" id="Submit">Reset Password</button><br>
    <button type="reset" name="reset" class="cancelbtn">Cancel</button>        
    <br>
    <br>
  <a href="indexlogin.php">Click here to Login</a>
  </div>
  
  
</form>
</center>
</body>
</html>

<!-- <script>
function ValidateEmail(input) {

  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {

   // alert("Valid email address!");
   // document.formreg.emailAdd.focus();
    return true;

  } else {

    alert("Invalid email address!");
    document.getElementById('emailAdd').value = " "; 
    document.formreg.emailAdd.focus();
    return false;

  }
  
  

}
</script> -->

<?php
include("footer.php")
?>