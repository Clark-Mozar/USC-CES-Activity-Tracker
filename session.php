<?php
   include('DBConnection.php');
   
   $user_id = $_SESSION['user_id'];
   $Empname=$_SESSION['Empname'];
   
   $ses_sql = mysqli_query($db,"select user_id,Empname from tblusers where user_id = '$user_id' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_id'];

   if(!isset($_SESSION['user_id'])){
      header("location:index.php");
      die();
   }
?>