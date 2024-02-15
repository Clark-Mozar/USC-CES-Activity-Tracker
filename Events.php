
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
        $eventname = mysqli_real_escape_string($conn,$_REQUEST['event']);
        $uid = &$_REQUEST['user_id'];
        $dateFrom =  &$_REQUEST['dateFrom'];
        $dateTo = &$_REQUEST['dateTo'];
        $timestart = &$_REQUEST['timestart'];
        $timeend= &$_REQUEST['timeend'];
        $details = mysqli_real_escape_string($conn,$_REQUEST['details']);
        $course = &$_REQUEST['course'];
        $yr=&$_REQUEST['yr'];
         
        // Performing insert 
        // here our table name is tblusers
   if($_REQUEST['event']=="" ){
           
           echo "<center><font color=red><b>Please Complete all fields.</b></font></center>";
   }else{
        
             $sql = "INSERT INTO tblevent(user_id,event_name,date_start,date_end,timestart,timeend,event_details,course,yr) VALUES ('$uid','$eventname',
            '$dateFrom','$dateTo','$timestart','$timeend','$details','$course','$yr')";
            
         if(!$sql){
          die(mysqli_error($conn));
        }
                if(mysqli_query($conn, $sql)){
                    $startdatetime = date('Y-m-d H:i:s', strtotime($dateFrom . 'T' . $timestart));
                    $enddatetime = date('Y-m-d H:i:s', strtotime($dateTo . 'T' . $timeend));
                    $url = 'https://maker.ifttt.com/trigger/USCEVENT/with/key/cNcOze7SKcCBx1WmHRiYKi';
                    $data = array('value1' => $eventname, 'value2' => $startdatetime, 'value3' => $enddatetime);

                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data),
                        ),
                    );

                    $context  = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);

                    include("MainPage.php");
               
                    echo '<div class="displayReg">'; 
                    echo "Event Name: " .$eventname."<br>";
                    echo "Start: ".$dateFrom." ".$timestart."<br>";
                    echo "End: ". $dateTo." ".$timeend."<br>";
                    echo "Details: ".$details."<br>";
                    echo "<a href='ViewEvents.php'>View Events</a>";
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
