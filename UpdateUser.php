<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>
<?php
include_once 'DBConnection.php';
include("MainPage.php");


          $userid = $_POST['user_id'];
          // $userid = &$_GET['user_id'];   
          $fname =  &$_REQUEST['fname'];
          $lname = &$_REQUEST['lname'];
          $email =  &$_REQUEST['email'];
          $username = &$_REQUEST['user_name'];
          $pass1 = &$_REQUEST['pass1'];
          $pass2= &$_REQUEST['pass2'];
          $usertype = &$_REQUEST['typeOfUser'];
          $isActive=&$_REQUEST['isActive'];
          

  
             if(isset($_POST['update'])) {
             if(isset($_POST['update'])) {

              $sqls = "UPDATE tblusers SET firstName='$fname',lastName='$lname',user_name='$username',userType='$usertype' WHERE user_id='$userid'";
              $result = mysqli_query($conn, $sqls); 
              $resultB =mysqli_affected_rows($conn);
              if(!$resultB){
                die(mysqli_error($conn));
              }
            if ($resultB>0) {
                  echo "<font color=blue>Account has been successfully updated!</font>";
     
            } else {
          echo "<font color=red>Cannot Update User Account.</font>";
           }
           }
           }
          
           if(isset($_POST['activate'])) {
              $sqls = "UPDATE tblusers SET isActive=1 WHERE user_id='$userid'";
              $result = mysqli_query($conn, $sqls); 
              $resultB =mysqli_affected_rows($conn);
              echo "<font color=blue>Account activated!</font>";
           }
          if(isset($_POST['deactivate'])) {
              $sqls = "UPDATE tblusers SET isActive=0 WHERE user_id='$userid'";
              $result = mysqli_query($conn, $sqls); 
              $resultB =mysqli_affected_rows($conn);
              echo "<font color=blue>Account deactivated!</font>";
           }
           
?>  