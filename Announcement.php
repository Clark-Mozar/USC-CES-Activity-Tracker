
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}else{
    include("index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport">
<style>

.displayReg {
  width: 100%;
  padding: 12px 20px;
  margin: 0px 0px;
  display: flex;
  justify-content: center;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


</style>
</head>
<body>

<div class="scrollit">
<table id="customers">
<tbody>
<?php
include("DBConnection.php");
?>





<?php
 
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 7 values from the form data(input)
        $ann_name =  mysqli_real_escape_string($conn,$_REQUEST['ann_name']);
        $ann_details = mysqli_real_escape_string($conn,$_REQUEST['details']);
        $uid = &$_REQUEST['user_id'];
        date_default_timezone_set('Asia/Manila');
        $dateposted = date("Y-m-d H:i:s");
        $c = $_REQUEST['course'];
        $yr=&$_REQUEST['yr'];
        include("MainPage.php");
         
        // Performing insert 
        // here our table name is tblusers
   if($_REQUEST['ann_name']=="" ){
         
           echo "<center><font color=red><b>Please Complete all fields.</b></font></center>";
   }else{
        
             $sql = "INSERT INTO tblannouncement(uid,ann_name,ann_details,dateposted,course,yr) VALUES ('$uid','$ann_name',
            '$ann_details','$dateposted','$c','$yr')";

if(!$sql){
  die(mysqli_error($conn));
}
         
                if(mysqli_query($conn, $sql)){
                    echo '<div class="displayReg">'; 
                    echo "Announcement Title: " .$ann_name."<br>";
                    echo "Details: ".$ann_details."<br>";
                    echo "Posted: ".$dateposted."<br>";
                    echo "Course: ".$c."<br>";
                    echo "<a href='ViewAnnouncement.php'>View Announcements</a>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=Home\">";  
                } else{
                    echo "ERROR: Hush! Sorry $sql."
                    . mysqli_error($conn);
                    
                   echo '</div>'; 
        }
         
        // Close connection
        mysqli_close($conn);
        }
   
      
   
 ?>
