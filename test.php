<?php

//Block 1
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "4270372_ucces"; 
$table = "tblusers"; 

//Block 2
$from= 'fcoritico@opascor.com.ph';

//Block 3
$subject= $_POST['subject'];
$body= $_POST['body'];

//Block 4
$conn=mysqli_connect($host,$user,$password,"4270372_ucces");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

//Block 5
$query= "SELECT * FROM $table";
$result= mysqli_query ($conn, $query) 
or die ('Error querying database.');

//Block 6
while ($row = mysqli_fetch_array($result)) {
$first_name= $row['firstName'];
$last_name= $row['lastName'];
$email= $row['emailAdd'];

//Block 7
$msg= "Dear $first_name $last_name,\n$body";
mail($email, $subject, $msg, 'From:' . $from);
echo 'Email sent to: ' . $email. '<br>';
}

//Block 8
mysqli_close($conn);
?>