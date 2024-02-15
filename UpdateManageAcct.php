

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}else{
  echo"Please Login";
  include("index.php");
}
?>
<?php
include("MainPage.php");
?>
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
  /* background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,121,20,1) 0%, rgba(13,135,113,1) 97%, rgba(8,8,8,1) 100%); */
  background-size: cover;
  box-shadow: 23px 5px 29px 1px #1CD03F;
}

.agileits-top {
  padding: 3em;
}


input[type="text"], input[type="event"], input[type="password"],input[type="date"],input[type="time"], select[class="usertype"] {
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
    overflow:scroll;
    height:650px;
    /* overflow-x: hidden; */
}
@media screen and (max-width: 800px){
  .buttonsub {
  background-color: #4CAF50;
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="ViewEvents.css" />  -->
    <title>Manage Account</title>
  </head>
<center>
<div class="scrollit">
<?php
$resultA = mysqli_query($conn,"SELECT * FROM tblusers U  WHERE user_id=$user_id");
while (false !=($rowA= mysqli_fetch_array($resultA)))
            {
                $userid = $rowA['user_id'];
                $Fname = $rowA['firstName'];
                $Lname = $rowA['lastName']; 
            }
?>
<?php
include_once 'DBConnection.php';
$resultB = mysqli_query($conn,"SELECT * FROM tblusers U WHERE U.user_id='" . $_GET['user_id'] . "'");
if(!$resultB){
  die(mysqli_error($conn));
}
while ($rowB= mysqli_fetch_array($resultB))
            {
             
                $user_id=$rowB['user_id'];
                $fname=$rowB['firstName'];
                $lname=$rowB['lastName'];
                $Empname = $rowB['firstName'].$rowB['lastName'];
                $username = $rowB['user_name'];
                $utype = $rowB['userType'];
                $email= $rowB['emailAdd'];
                $isActive= $rowB['isActive'];
               
            }
?>
 <body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
<form action="UpdateUser.php" method="POST" enctype="multipart/form-data">      
    <input type="text" class="id" name="user_id" value="<?php echo $user_id;  ?>" readonly>
    <input type="text" class="user" value="<?php echo $Empname;  ?>"><br>
    <input type="text" class="title" id='username' name="user_name" placeholder="User Name" value="<?php echo"$username";  ?>">
    <input type="text" class="title" id='fname' name="fname" placeholder="First Name" value="<?php echo"$fname";  ?>">
    <input type="text" class="title" id='lname' name="lname" placeholder="Last Name" value="<?php echo"$lname";  ?>">
    <input type="text" class="email" id="email" name="email" placeholder="Email" value="<?php echo"$email";  ?>" >
    <?php
    if (strpos($utype, "CES") !== false) {
      echo '<select name="typeOfUser" class="usertype" id="usertype" name="usertype" required>';
      echo '<option value="CESRep">CES Representative</option>';
      echo '<option value="CESCo">CES Coordinator</option>';
      echo '</select>';
    }
    ?>
    
    <!-- <input type="checkbox" class="isActive" id="isActive" name="isActive">Is Active?<br> -->
    <button type="submit" name="activate" class="buttonsub">Activate</button>
    <button type="submit" name="deactivate" class="buttonsub">Deactivate</button>      
    <button type="submit" name="update" class="buttonsub">Update Account</button><br>
    <button type="reset" name="reset" class="cancelbtn">Cancel Entries</button>
    </form>
				
        </div>
      </div>
    
    </div>
    <!-- //main -->
  </body>
  </html>   
