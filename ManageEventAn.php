<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  /* font: 1em sans-serif; */
  /* background-color: #ea952f; */
}
.welcome{
  margin-top: 8px;
  margin-bottom: 2px;
  font-size: 12px;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 2px;
  height: 450px; 
}

/* Clear floats after the columns */

.scrollit {
    overflow:scroll;
    height:500px;
    /* overflow-x: hidden; */
}
/* th{
    background-color: #ea952f;
} */
.tip {
  width: 0px;
  height: 0px;
  position: absolute;
  background: transparent;
  border: 10px solid #ccc;
}
.tip-left {
  top: 10px;
  left: -25px;
  border-top-color: transparent;
  border-left-color: transparent;
  border-bottom-color: transparent;  
}
.body .message {
  min-height: 30px;
  border-radius: 3px;
  font-family: Arial;
  font-size: 10px;
  line-height: 1.5;
  color: #797979;

}
.dialogbox .body {
  position: relative;
  max-width: 300px;
  height: auto;
  margin: 20px 10px;
  padding: 5px;
  background-color: #DADADA;
  border-radius: 3px;
  border: 5px solid #ccc;
 ;
}

@media screen and (max-width: 600px){
	h2 {
    font-size: 10px;

}
/* .p1, .p2, .p3{
    font-size: 8px;

} */
.scrollit {
    overflow:scroll;
    height:550px;
    /* overflow-x: hidden; */
}
}
@media screen and (max-width: 800px){
	h2 {
    font-size: 14px;

}
/* .p1, .p2, .p3{
    font-size: 14px;

} */
.scrollit {
    overflow:scroll;
    height:500px;
    /* overflow-x: hidden; */
}
.welcome{
  margin-top: 8px;
  margin-bottom: 2px;
  font-size: 12px;
}
    

}
img{
  height: 20px;
  width: 20px;
}
</style>
</head>
<body>


<div class="row">
  <div class="column">
    <h2>Events</h2>
    <p>
    <div class="scrollit">
<table id="customers" class="cust" border=1>

  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
            include("DBConnection.php");
            
            if(mysqli_connect_errno()){
                    echo mysqli_connect_error();
                    exit();
            }else{
            $selectQuery = "SELECT EV.event_id,EV.event_name,EV.event_details,EV.date_start,EV.timestart,EV.date_end,EV.timeend,U.firstName,U.lastName FROM tblevent EV LEFT JOIN tblusers U ON EV.user_id=U.user_id WHERE IsCancelled=True ORDER BY EV.date_start DESC";
            $result = mysqli_query($conn,$selectQuery);
            if(mysqli_num_rows($result) > 0){
            }else{
                $msg = "No Record found";
                }
            }
     ?>


<?php
                while($row = mysqli_fetch_assoc($result)){
            
                // echo '<div class="box1"><br><tbody><tr>';
                // //echo '<td>'.$row['event_id'].'</td>'; 
                // echo '<p class="p1">Event: <font color="green">'.$row['event_name'].'</font><br>';
                // echo 'Venue/Details: '.$row['event_details'].'<br>';
                // echo 'Date & Time Start: <font color="maroon">'.$row['date_start'].":".$row['timestart'].'</font><br>';  
                // echo 'Date & Time End: <font color="maroon">'.$row['date_end'].":".$row['timeend'].'</font><br>';
                // echo 'Posted by: <font color="blue">'.$row['firstName']." ".$row['lastName'].'</font><br>';
                // echo '<a href="RestoreEvent.php?event_id='. $row["event_id"].'"><img src="restore.png"></img></a>';
                // echo '</p></tr></tbody>'; 
                // echo '<p class="p3"><br>================================</p><br></div>'; 
                 echo '<div class="dialogbox">';
                      echo '<div class="body">';
                        echo '<span class="tip tip-left"></span>';
                        echo '<div class="message">';
                        echo '<span>Event: <font color="green">'.$row['event_name'].'</font><br>';
                        echo 'Venue/Details: '.$row['event_details'].'<br>';
                        echo 'Date & Time Start: <font color="maroon">'.$row['date_start'].":".$row['timestart'].'</font><br>';
                        echo 'Date & Time End: <font color="maroon">'.$row['date_end'].":".$row['timeend'].'</font><br>';
                        echo 'Posted by: <font color="blue">'.$row['firstName']." ".$row['lastName'].'</font><br>';
                        echo '<a href="RestoreEvent.php?event_id='. $row["event_id"].'"><img src="restore.png"></img></a>';
                        echo '</span>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
            }?>
      </p>
    </div>
  </body>
</table>
</html>
        </div>
    </p>
  </div>
  <div class="column">
    <h2>Announcements</h2>
    <p>
    <div class="scrollit">
<table id="customers" class="cust" border=1>

  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
            include("DBConnection.php");
            
            if(mysqli_connect_errno()){
                    echo mysqli_connect_error();
                    exit();
            }else{
            $selectQuery = "SELECT AN.ann_id,AN.ann_name,AN.ann_details,AN.dateposted,U.firstName,U.lastName,AN.status,U.userType FROM tblannouncement AN LEFT JOIN tblusers U ON AN.uid=U.user_id WHERE AN.status=False ORDER BY AN.dateposted DESC";
            $result = mysqli_query($conn,$selectQuery);
            if(mysqli_num_rows($result) > 0){
            }else{
                $msg = "No Record found";
                }
            }
     ?>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                
                // echo '<div class="box2"><br><tbody><tr>';
                // //echo '<td>'.$row['event_id'].'</td>'; 
                // echo '<p class="p2">Event: <font color="green">'.$row['ann_name'].'</font><br>';
                // echo 'Details: '.$row['ann_details'].'<br>';
                // echo 'Date Posted: <font color="maroon"> '.$row['dateposted'].'<br></font>';  
                // echo 'Posted by: <font color="blue">'.$row['firstName']." ".$row['lastName'].'</font><br>';
                // echo '<a href="RestoreAnn.php?ann_id='. $row["ann_id"].'"><img src="restore.png"></img></a>';
                // echo '</p></tr></tbody>'; 
                // echo '<p class="p3"><br>================================</p><br></box>'; 
                echo '<div class="dialogbox">';
                      echo '<div class="body">';
                        echo '<span class="tip tip-left"></span>';
                        echo '<div class="message">';
                        echo '<span><font color="blue" size="2" valign="left">'.$row['firstName']." ".$row['lastName'].'</font><br>';
                        echo 'Posted on <font color="maroon"> '.$row['dateposted'].'<br></font>';
                        echo '<font color="green">'.$row['userType'].'</font><br>';
                        echo '<font color="green"><b>'.$row['ann_name'].'</b><br></font>';
                        echo '<font color="black">'.$row['ann_details'].'</font><br>';
                        echo '<a href="RestoreAnn.php?ann_id='. $row["ann_id"].'"><img src="restore.png"></img></a>';
                      echo '</span>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
            }?>
      </p>
    </div>
  </body>
</table>
</html>
        </div>
    </p>
  </div>
</div>
</body>
</html>
