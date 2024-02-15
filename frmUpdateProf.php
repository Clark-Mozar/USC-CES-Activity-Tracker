
<!DOCTYPE html>
<html>
<head>
<meta name="viewport", initial-scale=1">
<style>
<style>
.welcome{
  margin-top: 8px;
  margin-bottom: 2px;
  font-size: 12px;
}
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, dl, dt, dd, ol, nav ul, nav li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  /* font: inherit; */
  vertical-align: baseline;
}

a {
  text-decoration: none;
}
textarea{
  width: 100%;
}
.txt-rt {
  text-align: right;
}

.txt-lt {
  text-align: left;
}

.txt-center {
  text-align: center;
}

.float-rt {
  float: right;
}

.float-lt {
  float: left;
}

/* .clear {
  clear: both;
}

.pos-relative {
  position: relative;
}

.pos-absolute {
  position: absolute;
}

.vertical-base {
  vertical-align: baseline;
}

.vertical-top {
  vertical-align: center;
} */


/* nav.vertical ul li {
  display: block;
}

nav.horizontal ul li {
  display: inline-block;
}
 */

img {
  max-width: 100%;
}


body {

  background-attachment: fixed;
  font-family: 'Roboto', sans-serif;
}

h1 {
  font-size: 3em;
  text-align: center;
  color: #fff;
  font-weight: 100;
  text-transform: capitalize;
  letter-spacing: 4px;
  font-family: 'Roboto', sans-serif;
}

/*-- main --*/
/* .main-w3layouts {
  padding: 1em 0 1em;
} */

.main-agileinfo {
  width: 100%;
  height: 100%;
  margin: 1em auto;
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,121,20,1) 0%, rgba(13,135,113,1) 97%, rgba(8,8,8,1) 100%);
  background-size: cover;
  box-shadow: 23px 5px 29px 1px #1CD03F;
}

.agileits-top {
  padding: 3em;
}


input[type="text"], input[type="event"], input[type="password"],input[type="date"],input[type="time"] {
  font-size: 0.9em;
  color: #070202;
  font-weight: 100;
  width: 100%;
  display: block;
  border: solid 1px;
  padding: 0.8em;
  border: solid 1px #070202;
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: #FFFFFF;
  background-position: -800px 0;
  background-size: 100%;
  background-repeat: no-repeat;
  color: #070202;
  font-family: 'Roboto', sans-serif;
  border-radius: 8px;
}
textarea{
  border-radius: 8px;
}
input.event, input.text.w3lpass{
  margin: 1em 0;

.wrapper {
  position: relative;
  overflow: hidden;
}
}
.buttonsub {
  background-color: #47d147;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

/*-- responsive-design --*/


.buttonsub:hover {
  opacity: 0.8;
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
  padding: 12px;
  /* overflow: auto; */
}

span.psw {
  float: right;
  padding-top: 16px;
}
[type="date"] {
  background:#fff url('https://www.vhv.rs/dpng/d/424-4243517_computer-icons-calendar-clip-art-small-calendar-icon.png')  97% 50% no-repeat ;
}
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 0;
}

.scrollit {
    overflow: hidden;
    height:650px;
    /* overflow-x: hidden; */
}
@media screen and (max-width: 800px){
  .buttonsub {
  background-color: #0341fc;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}
.cancelbtn {
  width: 50%;
  padding: 10px 18px;
  background-color: #f44336;
}
.scrollit {
    overflow:scroll;
    height:550px;
    /* overflow-x: hidden; */
}
    

}
</style>
<!DOCTYPE html>
<html>
<head>
<title>Post Announcement</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>
<?php
include_once 'DBConnection.php';
$user_id=$_SESSION['user_id'];
$resultB = mysqli_query($conn,"SELECT * FROM tblusers S WHERE S.user_id='$user_id'");
if(!$resultB){
  die(mysqli_error($conn));
}
while ($rowB= mysqli_fetch_array($resultB))
            {
             
                $fname= $rowB['firstName'];
                $lname=$rowB['lastName'];
                $emailAdd=$rowB['emailAdd'];
                $username = $rowB['user_name'];
                $pass1 = $rowB['pass1'];
                $pass2 = $rowB['pass2'];
               
            }
?>
<body>
<center>
<title>Update User Profile</title>
<form action="/UpdateProf.php" method="post" name="formreg">
  <div class="container">
    
    <input type="hidden"  name="Empname">
    <input type="text" placeholder="First Name" name="firstName" value="<?php echo"$fname";  ?>" required>
    <br>
    <input type="text" placeholder="Last Name" name="lastName" value="<?php echo"$lname";  ?>" required>
    <br>
    <input type="text" placeholder="Email" value="<?php echo"$emailAdd";  ?>" onfocusout="ValidateEmail(document.formreg.emailAdd)" id="emailAdd" name="emailAdd" required>
    <br>
    <input type="text" placeholder="Username" name="user_name" value="<?php echo"$user_name";  ?>" >
    <br>
 
    <input type="password" placeholder="Password" name="pass1">
    <br>  
 
    <input type="password" placeholder="Confirm Password" name="pass2">
    <br> 
        
    <button class="buttonsub" type="submit" name="update" id="Submit">Update</button><br>
    <button type="reset" name="reset" class="cancelbtn">Cancel</button>        
    <br>

   
  </div>
  
  
</form>
</center>
</body>
</html>

<script>
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
</script>


