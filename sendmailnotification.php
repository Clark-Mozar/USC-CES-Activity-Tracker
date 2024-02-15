
<?php
session_start();
include("DBConnection.php");

//  $uname = &$_POST['user_name'];
//  $user_id=&$_POST['user_id'];
//  $emailAdd=&$_POST['emailAdd'];

 
 $sql = "SELECT * FROM tblusers WHERE user_id='$userid'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >0) {
			$to = $emailAdd;
            $subject = 'Event';   
            $content = "You have Successfully Joined an Event: ".$tempPass;
			$headers = "From: florivenc@gmail.com\r\n";
		
			if (mail($to, $subject, $content, $headers))
			{
			include("index.php");
			// echo "<center>Success!. Please check your email address</center>";
			//echo "http://localhost:81/frmregister.php";
			} 
			else {
   			echo "ERROR";
			}
          
               
        }
        else{
        
        include("index.php");
        echo"<center><font color=#cc0000><b> No Email Address has been registered</b></font></center>";
        }





// <?php
// //
// // *** To Email ***
// $to = 'florivenc@yahoo.com';
// //
// // *** Subject Email ***
// $subject = 'Reset Password Link';

// // *** Content Email ***
// $content = 'http://localhost:81/frmregister.php';


// //
// //*** Head Email ***
// $headers = "From: florivenc@gmail.com\r\n";
// //
// //*** Show the result... ***
// if (mail($to, $subject, $content, $headers))
// {
// 	include("index.php");
// 	echo "Success!. Please check your email address";
// 	//echo "http://localhost:81/frmregister.php";
// } 
// else 
// {
//    	echo "ERROR";
// }
// ?>