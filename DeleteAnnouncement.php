<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>

<?php
include_once 'DBConnection.php';

if(isset($_GET['ann_id'])){
    $userid = $_SESSION['user_id'];
    $ann_id = $_GET['ann_id'];
     $sqls = "UPDATE tblannouncement SET status=False WHERE ann_id='$ann_id'";
     $result = mysqli_query($conn, $sqls); 
     $resultB =mysqli_affected_rows($conn);
     if(!$resultB){
      die(mysqli_error($conn));
    }
           if ($resultB>0) {
           include("MainPage.php");
 echo "<font color=blue>Announcement has been deleted!</font>";
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=Home\">";
} else {
  echo "<font color=red>Cannot Delete Announcement.</font>";
   }
  

}
         
?>  