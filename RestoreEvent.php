<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>
<?php
include_once 'DBConnection.php';
          $userid = $_SESSION['user_id'];
          $event_id = $_GET['event_id'];
           $sqls = "UPDATE tblevent SET IsCancelled=False WHERE event_id='$event_id'";
           $result = mysqli_query($conn, $sqls); 
           $resultB =mysqli_affected_rows($conn);
           if(!$resultB){
            die(mysqli_error($conn));
          }
                 if ($resultB>0) {
                 include("MainPage.php");
	   echo "<font color=blue>Event has been restored!</font>";
     echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=Home\">";
	 } else {
        echo "<font color=red>Cannot Restore Event.</font>";
         }
        
    
?>  