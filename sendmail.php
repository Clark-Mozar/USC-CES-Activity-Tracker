
<?php
session_start();
include("DBConnection.php");

 $uname = &$_POST['user_name'];
 $user_id=&$_POST['user_id'];
 $emailAdd=&$_POST['emailAdd'];
 $pass1=&$_POST['pass1'];
 $pass2=&$_POST['pass2'];
 $passw1=md5($pass1);
 $passw2=md5($pass2);
 function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
	}
 $tempPass=randomPassword();
 $sql = "SELECT * FROM tblusers WHERE emailAdd='$emailAdd'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >0) {
           
            if(strpos($emailAdd,'usc.edu.ph') === false){
             echo"<center><font color=#cc0000><b> Invalid Email</b></font></center>";
              include("frmforgotpassword.php");
            }
            elseif($passw1!=$passw2){
                 include("frmforgotpassword.php");
              echo"<center><font color=#cc0000><b> Password Mismatch</b></font></center>";   
            }
            else{
			$sqls = "UPDATE tblusers SET pass1='$passw1', pass2='$passw2' WHERE emailAdd='$emailAdd'";
			$result = mysqli_query($conn, $sqls); 
			$resultB =mysqli_affected_rows($conn);
             include("index.php");
            if(!$resultB){
                die(mysqli_error($conn));
              }else{
                echo"<center><font color=blue><b>Password Changed Successfuly </b></font></center>"; 
              }
			
            }
                  
        }
        else{
        
         include("frmforgotpassword.php");
        echo"<center><font color=#cc0000><b> No Email Address has been registered</b></font></center>";
        }
//==================================

// <?php
// session_start();
// include("DBConnection.php");

//  $uname = &$_POST['user_name'];
//  $user_id=&$_POST['user_id'];
//  $emailAdd=&$_POST['emailAdd'];
//   $passw1=md5($pass1);
// $passw2=md5($pass2);

//  function randomPassword() {
//     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//     $pass = array(); //remember to declare $pass as an array
//     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
//     for ($i = 0; $i < 8; $i++) {
//         $n = rand(0, $alphaLength);
//         $pass[] = $alphabet[$n];
//     }
//     return implode($pass); //turn the array into a string
// 	}
//  $tempPass=randomPassword();
//  $sql = "SELECT * FROM tblusers WHERE emailAdd='$emailAdd'";

//         $result = mysqli_query($conn, $sql);

//         if (mysqli_num_rows($result) >0) {
// 			$to = $emailAdd;
//             $subject = 'Reset Password Link';   
//             $content = "Please use this temporary password: ".$tempPass;
// 			$headers = "From: florivenc@gmail.com\r\n";
			
// 			$sqls = "UPDATE tblusers SET tempPass='$tempPass' WHERE emailAdd='$emailAdd'";
// 			$result = mysqli_query($conn, $sqls); 
// 			$resultB =mysqli_affected_rows($conn);
//             if(!$resultB){
//                 die(mysqli_error($conn));
//               }
// 			if (mail($to, $subject, $content, $headers))
// 			{
// 			include("index.php");
// 			echo "<center>Success!. Please check your email address</center>";
// 			//echo "http://localhost:81/frmregister.php";
// 			} 
// 			else {
//    			echo "ERROR";
// 			}
          
               
//         }
//         else{
        
//         include("index.php");
//         echo"<center><font color=#cc0000><b> No Email Address has been registered</b></font></center>";
//         }



//=============================




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