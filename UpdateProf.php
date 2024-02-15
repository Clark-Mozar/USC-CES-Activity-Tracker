<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>
<?php
include_once 'DBConnection.php';
include("MainPage.php");
          $userid = $_SESSION['user_id'];   
          $fname =  &$_REQUEST['firstName'];
          $lname = &$_REQUEST['lastName'];
          $email =  &$_REQUEST['emailAdd'];
          $username = &$_REQUEST['user_name'];
          $pass1 = &$_REQUEST['pass1'];
          $pass2= &$_REQUEST['pass2'];
          $usertype = &$_REQUEST['typeOfUser'];
          $passw1=md5($pass1);
          $passw2=md5($pass2);
          $sql = "SELECT * FROM tblusers WHERE emailAdd='$email' AND user_id!='$userid'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) >0) {
       
            echo "<center><font color=red><b>There is already existing account associated with this email address associated</b></font></center>";       
          }elseif($pass1!=$pass2){
            echo "<center><font color=red><b>Password mismatched!</b></font></center>";
            } 
          else{
           if(isset($_POST['update'])) {
           if(isset($_POST['update'])) {
          //  $sqls = "UPDATE tblusers SET firstName='$fname',lastName='$lname',emailAdd='$email',user_name='$username',pass1='$passw1',pass2='$passw2' WHERE user_id='$userid'";
          if($_POST['pass1']==""|| $_POST['pass2']=="") {
                         $sqls = "UPDATE tblusers SET firstName='$fname',lastName='$lname',emailAdd='$email',user_name='$username' WHERE user_id='$userid'"; 
          }
          else{
             $sqls = "UPDATE tblusers SET firstName='$fname',lastName='$lname',emailAdd='$email',user_name='$username',pass1='$passw1',pass2='$passw2' WHERE user_id='$userid'";
          }
         
           $result = mysqli_query($conn, $sqls); 
           $resultB =mysqli_affected_rows($conn);
                 if ($resultB>0) {
	        echo "<font color=blue>Account has been successfully updated!</font>";
   
	        } else {
        echo "<font color=red>Cannot Update User Account.</font>";
         }
         }
         }
      }
        
?>  