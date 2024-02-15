<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>
<?php
include_once 'DBConnection.php';
          $userid = $_SESSION['user_id'];
          $subid= &$_POST['file_id'];
       
          $Points = &$_POST['Points'];
              
        if(isset($_POST['update'])) 
          {
           if(isset($_POST['update'])) 
          {
           $sqls = "UPDATE tblsubmission SET Points='$Points', rateby_id='$userid', isApproved='Approved' WHERE file_id='$subid'";
           $result = mysqli_query($conn, $sqls); 
           $resultB =mysqli_affected_rows($conn);
           if(!$resultB){
            die(mysqli_error($conn));
          }
                 if ($resultB>0) {
                 include("MainPage.php");
	              echo "<font color=blue>Points has been posted !</font>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=ViewSub\">";  
   
	  } else {
        echo "<font color=red>Cannot Add Points.</font>";
         }
         }
         }
?>  