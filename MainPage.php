<?php
//session_start();
include("DBConnection.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="CES.png">
<style>
  * {
  box-sizing: border-box;
  /* font: 1em sans-serif; */
  /* background-color: #ea952f; */

}
#company_logo{
width:10px;
height:10px;
margin: 3;
padding: 5;
background-image:url('');
}
body {background-color: white;
overflow: auto;
border: 0px solid #f1f1f1;
margin: 4px;
        }
.welcome{
  margin-top: 10px;
  margin-bottom: 2px;
  font-size: 12px;
 
}
        
/* ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: f38604;
} */

#menu {
	/* background: #f7f7f2; */
	/* background: linear-gradient(to bottom,  #21CC26,  #1C2BFF); */
	color: #FFF;
	height: 45px;
	padding-left: 18px;
	border-radius: 10px;
}
#menu ul, #menu li {
	margin: 0 auto;
	padding: 0;
	list-style: none
}
#menu ul {
	width: 100%;
}
#menu li {
	float: left;
	display: inline;
	position: relative;
}
#menu a {
	display: block;
	line-height: 45px;
	padding: 0 14px;
	text-decoration: none;
	color: #FFFFFF;
	font-size: 16px;
}
#menu a.dropdown-arrow:after {
	content: "\25BE";
	margin-left: 5px;
}
#menu li a:hover {
	color: #0099CC;
	background: #53ff1a;
}
#menu input {
	display: none;
	margin: 0;
	padding: 0;
	height: 45px;
	width: 100%;
	opacity: 0;
	cursor: pointer
}
#menu label {
	display: none;
	line-height: 45px;
	text-align: center;
	position: absolute;
	left: 35px
}
#menu label:before {
	font-size: 1.6em;
	content: "\2261"; 
	margin-left: 20px;
}
#menu ul.sub-menus{
	height: auto;
	overflow: hidden;
	width: 170px;
	background: #444444;
	position: absolute;
	z-index: 99;
	display: none;
}
#menu ul.sub-menus li {
	display: block;
	width: 100%;
}
#menu ul.sub-menus a {
	color: #FFFFFF;
	font-size: 16px;
}
#menu li:hover ul.sub-menus {
	display: block
}
#menu ul.sub-menus a:hover{
	background: #F2F2F2;
	color: #444444;
}
*
{
    margin: 0;
    padding:0;
    font-family: 'Roboto', sans-serif;
}


.container
{
    width: 100%;
    height: 100vh;
    /* background-image:linear-gradient(rgb(255, 255, 255)); */
     /* background:#f7f7f2; */
    background-position: center;
    background-size: cover;
    box-sizing: border-box;
}

.words
{
    color: white;
    margin-left: 40px;
}

.navbar
{
    height:11%;
    display: flex;
    align-items: center;
    /* background-color: green; */
}

.avatar
{
    width: 300px;
    cursor: pointer;
}

.menu-icon
{
    width: 30px;
    cursor: pointer;
    margin-left: 40px;
    margin-right: 40px;
}

nav
{
    flex: 1;
    text-align: left;
}

nav a
{
    text-decoration: none;
    color: black;
    font-size: 12px;
    padding: 12px 16PX;
    display: block;
}

.content
{
    width: 100%;
    position: relative;
    margin-left: 2px;
    margin-top: 10px;
}

.menu-button
{
    background-color: transparent;
    color: white;
    padding: 10px;
    font-size: 15px;
    cursor: pointer;
    border: none;
}

.right-menu
{
    margin-top: -38px;
    float: right;
    position: relative;
    display: block;
}

.dropdown-menu
{
    display: none;
    position: absolute;
    background-color: white;
    min-width: 158px;
    right:10px;
    z-index: 1;
}

.dropdown-menu a:hover,.dropdown-menu1 a:hover{
    background-color: #007500;
    color: #fff;
}

.right-menu:hover .dropdown-menu,.right-menu1:hover .dropdown-menu1{
    display: block;
}

.right-menu:hover .menu-button,.right-menu1:hover .menu-button
{
    background-color: transparent;
}


.scrollit {
    overflow:scroll;
    height:360px;
    /* overflow-x: hidden; */
}
.right-menu1
{
  margin-top: -52px;
  margin-right: 90px;
    float: right;
    position: relative;
    display: block;
}
.dropdown-menu1
{
    display: none;
    position: absolute;
     /* background-color: rgb(17, 95, 89); */
      background-color: #ffffff;
    min-width: 158px;
    z-index: 1;
}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="ViewEvents.css" />  -->
    <title>Document</title>
  </head>
<center>
<div class="scrollit">


</style>
</head>
<body>
<title>USC Community Extension Services</title>
<header>

      <?php
        include("header.php");
        $user_name=$_SESSION['user_name'];
        $user_id=$_SESSION['user_id'];
        $userType=$_SESSION['userType'];
        $course=$_SESSION['course'];
      
   
        date_default_timezone_set('Asia/Manila');
        $date=date("F j, Y, g:i a");
        $points=0;
        $resultB = mysqli_query($conn,"SELECT uid,SUM(Points) AS pnts FROM tblsubmission WHERE uid=$user_id Group by uid");
        if(!$resultB){
          die(mysqli_error($conn));
        }
        while ($rowB= mysqli_fetch_array($resultB))
            {
                $points= $rowB['pnts']; 
            }
        ?>
</header>

<?php
  if($_SESSION['userType']=="Student"){
  // echo "<b><p align='right' class='welcome'><b><font color=black>Hi! ".$user_name."</font>||<font color=#1a1aff>User ID:".$user_id."</font><font color=#1a1aff>||</font><font color=f2ac59>Today is: " .$d."</font>||<font color=blue>You have earned</font><font color=green size=5> ".$points."</font><font color=red> points</font>";
  // echo '<nav id="menu"><ul>';
  // echo '<li><a class="active" href="MainPage.php?pageid=Home">Home</a></li>';
  // echo '<li><a href="MainPage.php?pageid=FileSubmitForm">File Submission</a></li>';
  // echo '<li><a href="MainPage.php?pageid=ViewSub">View Submission</a></li>';
  // echo '<li><a href="MainPage.php?pageid=UpdateProf">Update Profile</a></li>';
  // echo '<li><a href="Logout.php">Logout</a></li>'; 
  // echo '</ul></nav>';
  echo '<div class="navbar">';
  echo '<nav>';
  echo "<b><p align='left' class='welcome'><b><font color=black size=4>Hi! ".$user_name."</font>";
        echo '<div class="right-menu">';
                echo '<button class="menu-button"><img src="menu-icon-13.png" class="menu-icon"></button>';
                    echo '<div class="dropdown-menu">';
                        echo '<a class="active" href="MainPage.php?pageid=Home">HOME'.'('.$user_name.')</a>';
                        // echo '<a href="MainPage.php?pageid=FileSubmitForm">File Submission</a>';
                        echo '<a href="MainPage.php?pageid=ViewSubStud">View Submission</a>';
                        echo '<a href="MainPage.php?pageid=Calendar">Calendar</a>';
                        echo '<a href="MainPage.php?pageid=UpdateProf">Update Profile</a>';
                        echo '<li><a href="Logout.php">Logout</a></li>'; 
                    echo '</div>';
                echo '</div>';
                echo '</nav>';
     echo '</div>';
     echo '<div class="right-menu1">';
    echo '<svg
    class="star-1"
    width="59"
    height="30"
    viewBox="0 0 59 54"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      d="M29.5 0L36.1232 18.6565H57.5562L40.2165 30.1869L46.8397 48.8435L29.5 37.3131L12.1603 48.8435L18.7835 30.1869L1.44383 18.6565H22.8768L29.5 0Z"
      fill="#D9D9D9"
    />
  </svg>';
                               
   echo '<div class="dropdown-menu1">';
   echo 'You have earned<font color=#067A2B size=4><br>'.$points.'</font><font color= #067A2B> points</font>';
    echo '</div>';
echo '</div>';

  }elseif($_SESSION['userType']=="CESRep"){
    // echo "<b><p align='right' class='welcome'><b><font color=black>Hi! ".$user_name."</font>||<font color=#1a1aff>User ID:".$user_id."</font><font color=#1a1aff>||</font><font color=f2ac59>Today is: " .$d."</font>";
    // echo '<nav id="menu"><ul>';
    // echo '<li><a class="active" href="MainPage.php?pageid=Home">Home</a></li>';
    // echo '<li><a href="MainPage.php?pageid=EventForm">Events</a></li>';
    // echo '<li><a href="MainPage.php?pageid=AnnForm">Announcements</a></li>';
    // echo '<li><a href="MainPage.php?pageid=ViewSub">View Submission</a></li>';
    // echo '<li><a href="MainPage.php?pageid=UpdateProf">Update Profile</a></li>';
    //  echo '<li><a href="MainPage.php?pageid=ViewSum">View Summary</a></li>';
    // echo '<li><a href="Logout.php">Logout</a></li>'; 
    // echo '</ul></nav>';
  echo '<div class="navbar">';
  echo '<nav>';
  echo "<b><p align='left' class='welcome'><b><font color=black size=4>Hi!</font><font color=black size=4> ".$user_name."</font>";
        echo '<div class="right-menu">';
                echo '<button class="menu-button"><img src="menu-icon-13.png" class="menu-icon"></button>';
                    echo '<div class="dropdown-menu">';
                        echo '<a class="active" href="MainPage.php?pageid=Home">HOME'.'('.$user_name.')</a>';
                        echo '<a href="MainPage.php?pageid=EventForm">Events</a>';
                        echo '<a href="MainPage.php?pageid=AnnForm">Announcements</a>';
                        echo '<a href="MainPage.php?pageid=Calendar">Calendar</a>';
                        // echo '<a href="MainPage.php?pageid=ViewSub">View Submission</a>';
                        echo '<a href="MainPage.php?pageid=UpdateProf">Update Profile</a>';
                         echo '<a href="MainPage.php?pageid=ViewSum">View Summary</a>';
                        echo '<a href="MainPage.php?pageid=ManageAcct">Manage Account</a>';
                               echo '<a href="MainPage.php?pageid=ManageEventAn">Manage Posting</a>';
                        echo '<a href="Logout.php">Logout</a>'; 
                    echo '</div>';
                echo '</div>';
                echo '</nav>';
     echo '</div>';
      
  }
  else{
    // echo "<b><p align='right' class='welcome'><b><font color=black>Hi! ".$user_name."</font>||<font color=#1a1aff>User ID:".$user_id."</font><font color=#1a1aff>||</font><font color=f2ac59>Today is: " .$d."</font>";
    // echo '<nav id="menu"><ul>';
    // echo '<li><a class="active" href="MainPage.php?pageid=Home">Home</a></li>';
    // echo '<li><a href="MainPage.php?pageid=EventForm">Events</a></li>';
    // echo '<li><a href="MainPage.php?pageid=AnnForm">Announcements</a></li>';
    // echo '<li><a href="MainPage.php?pageid=ViewSub">View Submission</a></li>';
    // echo '<li><a href="MainPage.php?pageid=UpdateProf">Update Profile</a></li>';
    // echo '<li><a href="MainPage.php?pageid=ManageAcct">Manage Account</a></li>';
    // echo '<li><a href="MainPage.php?pageid=ManageEventAn">Manage Posting</a></li>';
    // echo '<li><a href="MainPage.php?pageid=ViewSum">View Summary</a></li>';
    // echo '<li><a href="Logout.php">Logout</a></li>'; 
    // echo '</ul></nav>';
    echo '<div class="navbar">';
  echo '<nav>';
   echo "<b><p align='left' class='welcome'><b><font color=black size=4>Hi!</font><font color=black size=4> ".$user_name."</font>";
        echo '<div class="right-menu">';
                echo '<button class="menu-button"><img src="menu-icon-13.png" class="menu-icon"></button>';
                    echo '<div class="dropdown-menu">';
                        echo '<a class="active" href="MainPage.php?pageid=Home">HOME'.'('.$user_name.')</a>';
                        echo '<a href="MainPage.php?pageid=EventForm">Events</a>';
                        echo '<a href="MainPage.php?pageid=AnnForm">Announcements</a>';
                        echo '<a href="MainPage.php?pageid=Calendar">Calendar</a>';
                        // echo '<a href="MainPage.php?pageid=ViewSub">View Submission</a>';
                        echo '<a href="MainPage.php?pageid=UpdateProf">Update Profile</a>';
                        echo '<a href="MainPage.php?pageid=ManageAcct">Manage Account</a>';
                         echo '<a href="MainPage.php?pageid=ViewManageScore">Manage Points</a>';
                        echo '<a href="MainPage.php?pageid=ManageEventAn">Manage Posting</a>';
                         echo '<a href="MainPage.php?pageid=ViewSum">View Summary</a>';
                        echo '<a href="Logout.php">Logout</a>'; 
                    echo '</div>';
                echo '</div>';
                echo '</nav>';
     echo '</div>';

  }
  
?>

<!-- <ul>
  <li><a class="active" href="MainPage.php">Home</a></li>
  <li><a href="MainPage.php?pageid=EventForm">Events</a></li>
  <li><a href="MainPage.php?pageid=AnnForm">Announcements</a></li>
  <li><a href="MainPage.php?pageid=FileSubmitForm">File Submission</a></li>
  <li><a href="MainPage.php?pageid=LeaveApp">Maintenance/SetUp</a></li>
  <li><a href="Logout.php">Logout</a></li> 
</ul> -->
</body>
</html>
</div>




<?php
  if (! isset($_GET['pageid']))
  {
    //include('./index.php');

  } else {

    $page = $_GET['pageid'];

    switch($page)
    {
      case 'EventForm':
        include('EventForm.php');
        break;
      case 'Home':
        include('Homedef.php');
        break;

      case 'AnnForm':
        include('./AnnForm.php');
        break;

      case 'FileSubmitForm':
        include('FileSubmitForm.php');
        break;
      case 'ViewSub':
        include('ViewSubmission.php');
        break;
      case 'ViewSubStud':
        include('ViewSubStudent.php');
        break;
      case 'UpdateSubmission':
        include('UpdateSubmission.php');
        break;
      case 'ManageAcct':
        include('ViewManage.php');
        break;
      case 'ViewManageScore':
        include('ViewManageScore.php');
        break;
      case 'ManageEventAn':
        include('ManageEventAn.php');
        break;
      case 'ViewEvents':
        include('ViewEvents.php');
        break;
      case 'ViewSum':
        include('ViewSummaryPoints.php');
        break;
      case 'Home':
        include('Homedef.php');
        break;
      case 'JoinForm':
        include('joinForm.php');
        break;
      case 'UpdateProf':
          include('frmUpdateProf.php');
          break;
      case 'Calendar':
          include('calendar.php');
          break;
      default:
        // include('Homedef.php');
        include('HomedefMain.php');
        break;
    }
  }

?>
<?php
if(!isset($_SESSION['user_id'])) //If user is not logged in then he cannot access the profile page
 {
 //echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
//  include("index.php");
// header("Location: http://uscces.great-site.net/?i=1", true, 301);
header("Location: http://uscces.great-site.net/?i=1");
exit();
 }
 ?>

