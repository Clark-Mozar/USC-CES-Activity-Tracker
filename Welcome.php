<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
include("DBConnection.php");
$user_id=$_SESSION['user_id'];

$resultA = mysqli_query($conn,"SELECT * FROM tblusers WHERE user_id=$user_id");
while(false !=($rowA= mysqli_fetch_array($resultA)))
            {
                $userid = $rowA['user_id'];
                $Fname = $rowA['firstName'];
                $Lname = $rowA['lastName'];
            }
 echo "<font color=white>EMPLOYEE ID NUMBER: </font><font color=f2ac59><b>" .$userid."</b></font><br>". "<font color=white>EMPLOYEE NAME: </font><b><font color=f2ac59>" .$Fname. " " .$Lname. "</b></font><br>";

?>

