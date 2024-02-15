<?php
session_start();
include("DBConnection.php");

 $uname = $_POST['user_name'];
 $email = $_POST['emailAdd'];
 $pass = $_POST['pass1'];
 $tempPass=$_POST['tempPass'];
 $user_id=$_POST['user_id'];
 $passw=md5($pass);
 $sql = "SELECT * FROM tblusers WHERE emailAdd='$email' AND  (pass1='$passw' OR tempPass='$pass')";
 $result = mysqli_query($conn, $sql);

 $sql1 = "SELECT * FROM tblusers WHERE emailAdd='$email'";
 $result1 = mysqli_query($conn, $sql1);

 $sql1A = "SELECT * FROM tblusers WHERE isActive=1 AND emailAdd='$email'";
 $result1A = mysqli_query($conn, $sql1A);

 if (mysqli_num_rows($result1)<1) 
 {
    echo "<center><font color=red><b>Email Address not yet registered</b></font></center>";   
    include("indexlogin.php");
 }
 elseif (mysqli_num_rows($result1A)<1) 
 {
    echo "<center><font color=red><b>Email Address not yet activated. Please contact your CES Representative</b></font></center>";   
    include("indexlogin.php");
 }
 else
 {
        if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['emailAdd'] === $email && ($row['pass1'] === $passw  || $row['tempPass'] === $pass)) {
                //echo "Logged in!";
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['firstName'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['userType'] =$row['userType'];
                $_SESSION['course'] =$row['course'];

                include("MainPage.php"); 
                include("Homedef.php"); 
             
                $sqls = "UPDATE tblusers SET tempPass='' WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $sqls); 
                $resultB =mysqli_affected_rows($conn);
                }
        }else{
         echo"<center><font color=#cc0000><b>Incorrect Password</b></font></center>";
         include("indexlogin.php");    
        }
 }    
        if(!$result){
                die(mysqli_error($conn));
              } 
?>          