
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport">
<style>



</style>
</head>
<body>

<?php
include("DBConnection.php");
?>


<?php
 
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 7 values from the form data(input)
        // $eventname =  &$_REQUEST['event'];
        $uid = &$_REQUEST['user_id'];
        $eventid=  &$_REQUEST['event_id'];
        $dateposted = date("Y-m-d H:i:s");
        $course= &$_REQUEST['course'];
        $yr=&$_REQUEST['yr'];
         
        // Performing insert 
        // here our table name is tblusers
            $selectcheck = "SELECT * FROM tblsubmission WHERE event_id=$eventid AND uid=$uid";
            $resultcheck = mysqli_query($conn,$selectcheck);
        if(mysqli_num_rows($resultcheck) > 0){
            include("MainPage.php");
            echo"You have already joined the event";
            }else{
        $sql = "INSERT INTO tblsubmission(uid,event_id,dateregistered,course,yr) VALUES ('$uid','$eventid',
            '$dateposted','$course','$yr')";
         if(!$sql){
          die(mysqli_error($conn));
            }
                if(mysqli_query($conn, $sql)){
                    include("MainPage.php");
               
                    echo '<div class="displayReg">'; 
                    // echo "Event Name: " .$eventname."<br>";
                    // echo "Start: ".$dateFrom." ".$timestart."<br>";
                    // echo "End: ". $dateTo." ".$timeend."<br>";
                    // echo "Details: ".$details."<br>";
                    // echo "<a href='ViewEvents.php'>View Events</a>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=Home\">";
             
                 $sql = "SELECT * FROM tblusers WHERE user_id='$uid'";
                 $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $emailAdd=$row['emailAdd'];
                }
            //     if (mysqli_num_rows($result) >0) {
			//         $to = $emailAdd;
            //         $subject = 'Event';   
            //         $content = "You have Successfully Joined an Event ";
			//         $headers = "From: florivenc@gmail.com\r\n";
		
			//         if (mail($to, $subject, $content, $headers))
			//         {
			//         // echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=Home\">";
			// // echo "<center>Success!. Please check your email address</center>";
			// //echo "http://localhost:81/frmregister.php";
			// } 
			// else {
   			// echo "ERROR";
			// }
          
               
        // }
                } else{
                    echo "ERROR: Hush! Sorry $sql."
                    . mysqli_error($conn);
                    
                   echo '</div>'; 
        }
    } 
        // Close connection
        mysqli_close($conn);
        
   
      
   
 ?>
