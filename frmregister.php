<style>
body {
  margin-top: 0px;
  background-color: #ffffff;
  background-image: url('USC-TC.jpg');
  background-size: cover;
  background-position: center;
}

.form {
  width: fit-content;
  height: fit-content;
  position: inline;
  margin: auto;
  border-color: #3c4049;
  border-width: 1px;
  /* background-color: #006622; */
  background-color: #ffffff;
  box-sizing: border-box;
  padding: 2%;
  border-radius: 1%;
  box-shadow: 0 3px 10px 4px #242527;
  font-family: "Nunito", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background-color: rgba(255, 255, 255, 0.7);
}

.sign {
  width: 50%;
  color: white;
  background-color: #568af2;
  float: left;
  padding: 10px;
  box-sizing: border-box;
  font-size: 20px;
  text-align: center;
}
.log {
  width: 50%;
  color: white;
  background-color: gray;
  float: right;
  padding: 10px;
  box-sizing: border-box;
  font-size: 20px;
  text-align: center;
}
.log:hover,
.sign:hover,
.sgnbtn:hover {
  background-color: #568afce0 !important;
}
h1 {
  color: white;
  text-transform: capitalize;
  display: inline-block;
  width: 100%;
  text-align: center;
}
span.ast {
  color: #568afc;
  margin: 1px;
}
.sgnbtn {
  bottom: 0;
  width: 50%;
  padding: 5px;
  background-color: #568afc;
  text-transform: uppercase;
  font-size: 15px;
  color: white;
  border: none;
  margin-top: 5px;
}
.frow {
  display: flex;
  width: 100%;
}
.first {
  float: left;
  width: 100%;
  margin-right: 5px;
}
.first input {
  width: 100%;
  border-width: 1px;
  border-style: solid;
  border-color: #c3d4f7;
  box-sizing: border-box;
}
.last {
  float: right;
  width: 100%;
  margin-left: 5px;
}
.last input {
  width: 100%;
  border-width: 1px;
  border-style: solid;
  border-color: #c3d4f7;
  box-sizing: border-box;
}
.form input,
.form select {
  width: 100%;
  padding: 10px 15px;
  font-size: 15px;
  margin: 8px 0;
  background: #eee;
  border-radius: 15px;
}
.form input[type="submit"] {
  background: #028113;
  color: WHITE;
  text-transform: capitalize;
  font-size: 20px;
  cursor: pointer;
}
.form input[type="submit"]:hover {
  /* background: #265828; */
  background-color: #50ba5e;
  color: white;
}
img {
  height: 80px;
  width: 80px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>USC CES</title>
   <link rel="icon" href="CES.png">
   <!-- custom css file link  -->
   <!--<link rel="stylesheet" href="register_form.css">-->

</head>
<body>
   
<div class="form">

   <form action="processregister.php" method="post">
      <center><h1><font color="black">SIGN IN</font></h1></center>
      <input type="hidden"  name="Empname">
       <div class="frow"><input type="text" placeholder="ID Number" name="idnum" required>
       <input type="email" placeholder="USC Email" onfocusout="ValidateEmail(document.formreg.emailAdd)" id="emailAdd" name="emailAdd" required>
      </div>
       <div class="frow">
         <input type="text" placeholder="First Name" name="firstName" required>
         <input type="text" placeholder="Last Name" name="lastName" required>
      </div>
      <div class="frow"><input type="text" placeholder="Username" name="user_name" required></DIV>
      <div class="frow"><input type="password" placeholder="Password" name="pass1" required>
      <input type="password" placeholder="Confirm Password" name="pass2" required></div>
      <select name="course">
         <option value="" disabled selected>Course</option>
         <option>BS Civil Engineering</option>
         <option>BS Chemical Engineering</option>
         <option>BS Computer Engineering</option>
         <option>BS Electrical and Electronics Engineering</option>
         <option>BS Mechanical Engineering</option>
         <option>BS Industrial Engineering</option>
      </select><br>
                <select name="yr">
                    <option value="" disabled selected>Year</option>
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                </select><br>
      
      <input type="submit" name="submit" value="Sign In" class="form-btn-sub">
      <p><font color="green"><center>Already have an account?</font> <a href="indexlogin.php">Login Now</center></a></p>
          <br><center><a href="index.php" class="main">Back to Main</a></center>
   </form>

</div>

</body>
</html>