<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
    * {
      box-sizing: border-box;
      /* font: 1em sans-serif; */
      /* background-color: #ea952f; */
    }

    .welcome {
      margin-top: 8px;
      margin-bottom: 2px;
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
      overflow: scroll;
      height: 500px;
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
      font-size: 15px;
      line-height: 1.5;
      color: #000000; 
      background-color: #ffffff;

    }
    span{
       background-color: #ffffff;
       color: #000000;
    }
    .message{
       background-color: #ffffff;
    }
    .dialogbox .body {
      position: relative;
      max-width: 650px;
      height: auto;
      margin: 20px 10px;
      padding: 5px;
      background-color: #DADADA;
      border-radius: 3px;
      border: 4px solid #ccc;

    }

.eventsRectangle {
  position: absolute;
  width: 630px;
  left: 20px;
  height: 536px;
  top: 171px;
  border-style: solid;
  border-color: rgb(17, 95, 89);
  border-width: 5px;
  border-radius: 10px;
  max-width: auto;
}

.announcementsRectangle{
  position: absolute;
  width: 630px;
  left: 700px;
  right: 600px;
  height: 536px;
  top: 171px;
  border-style: solid;
  border-color: rgb(17, 95, 89);
  border-width: 5px;
  border-radius: 10px;
  max-width: auto;
}
img {
  border-radius: 2%;
  height: 25px;
  width: 25px;
  
}

    @media screen and (max-width: 400px) {
      h2 {
        font-size: 20px;

      }
 .column {
      float: left;
      width: 100%;
      padding: 2px;
      height: 500px;
    }

    /* Clear floats after the columns */

    .scrollit {
      overflow: scroll;
      height: 20px;
      /* height: -50px; */
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
      border: 3px solid #ccc;
    }

    .tip-left {
      top: 4px;
      left: -12px;
      border-top-color: transparent;
      border-left-color: transparent;
      border-bottom-color: transparent;
    }

    .body .message {
      min-height: 10px;
      border-radius: 3px;
      font-family: Arial;
      font-size: 8px;
      line-height: 1.5;
      color: #000000; 
      background-color: #ffffff;

    }
    span{
       background-color: #ffffff;
       color: #000000;
    }
.message{
   background-color: #ffffff;
}
    .dialogbox .body {
      position: relative;
      max-width: 325px;
      height: auto;
      margin: 5px 3px;
      padding: 2px;
      background-color: #DADADA;
      border-radius: 3px;
      border: 1px solid #ccc;

    }

.eventsRectangle {
  position: absolute;
  width: 340px;
  left: 16px;
  height: 400px;
  top: 171px;
  border-style: solid;
  border-color: rgb(17, 95, 89);
  border-width: 2px;
  border-radius: 10px;
}

.announcementsRectangle{
  position: absolute;
  width: 340px;
  left: 16px;
  height: 400px;
  top: 620px;
  border-style: solid;
  border-color: rgb(17, 95, 89);
  border-width: 2px;
  border-radius: 10px;
}

img {
  border-radius: 2%;
  height: 12px;
  width: 12px;
  
}

    }

    @media screen and (max-width: 800px) {
      h2 {
        font-size: 20px;

      }

      /* .p1, .p2, .p3{
    font-size: 14px;

} */
      .scrollit {
        overflow: scroll;
        height: 350px;
        /* overflow-x: hidden; */
      }

      .welcome {
        margin-top: 8px;
        margin-bottom: 2px;
        font-size: 12px;
      }


    }

    .buttonsub {
      /* background-color: #ffffff; */
      color: red;
      padding: 3px 2px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 30%;
      height: 10%
    }

    .buttonsub:hover {
      opacity: 0.8;
    }

    .calbelow {
      /* float: center; */
      width: 100%;
      padding-top: 100px;
      padding-left: 25%;
      padding-right: 25%;
      height: 750px;
      margin-top: 50px;

    }
  </style>
</head>

<body>

  <title>Events & Announcements</title>

  <div class="row">
    <div class="column">

      <p>
        <div class="eventsRectangle">
          <h2><font color="black">Events</font></h2>
        <div class="scrollit">
          <table id="customers" class="cust" border=1>

            <body class="parent-cont">
              <div class="sidebar">
                <p>
                  <?php
            include("DBConnection.php");
            $userType=$_SESSION['userType'];
             $course=$_SESSION['course'];
            if(mysqli_connect_errno()){
                    echo mysqli_connect_error();
                    exit();
            }else{
               if($_SESSION['userType']=="Student"){
                $selectQuery = "SELECT EV.event_id,EV.event_name,EV.event_details,EV.date_start,EV.timestart,EV.date_end,EV.timeend,U.firstName,U.lastName,EV.user_id, EV.course,U.course FROM tblevent EV LEFT JOIN tblusers U ON EV.course=U.course WHERE IsCancelled=False AND U.course='$course' AND U.user_id='$user_id' ORDER BY EV.date_start DESC";
               }else{
                $selectQuery = "SELECT EV.event_id,EV.event_name,EV.event_details,EV.date_start,EV.timestart,EV.date_end,EV.timeend,U.firstName,U.lastName,EV.user_id FROM tblevent EV LEFT JOIN tblusers U ON EV.user_id=U.user_id WHERE IsCancelled=False ORDER BY EV.date_start DESC";
               }

            $result = mysqli_query($conn,$selectQuery);
            if(!$result){
              die(mysqli_error($conn));
            }
            if(mysqli_num_rows($result) > 0){
            }else{
                $msg = "No Record found";
                }
            }

     ?>

                  <?php

                while($row = mysqli_fetch_assoc($result)){
                  $eventid=$row['event_id'];
                  $selectQueryB = "SELECT EV.event_id,EV.event_name,EV.event_details,EV.date_start,EV.timestart,EV.date_end,EV.timeend,U.firstName,U.lastName,                                           EV.user_id, EV.course,U.course FROM tblevent EV LEFT JOIN tblusers U ON EV.user_id=U.user_id WHERE event_id='$eventid'";
                  $resultPostedby = mysqli_query($conn,$selectQueryB);
                  $rowPosted=mysqli_fetch_array($resultPostedby);
                $datestart=$row['date_start'];
                $dateend=$row['date_end'];
                    echo '<div class="dialogbox">';
                      echo '<div class="body">';
                        echo '<span class="tip tip-left"></span>';
                        echo '<div class="message">';
                        echo '<span>Event: <font color="blue"></font>'.$row['event_name'].'</font></span><br>';
                        // echo 'Venue/Details:<font style="background-color:white;>  '.$row['event_details'].'</font><br>';
                            echo 'Venue:'.$row['event_details'].'<br>';
                        echo 'Date & Time Start:<font style="background-color:white;" color="maroon"> '.date('F d, Y',strtotime($row['date_start']))." :".date('l', strtotime($datestart))." ".date('h:i A',strtotime($row['timestart'])).'</font><br>';
                        echo 'Date & Time End: <font style="background-color:white;" color="maroon"> '.date('F d, Y',strtotime($row['date_end']))." : ".date('l', strtotime($dateend))." ".date('h:i A',strtotime($row['timeend'])).'</font><br>';
                        // echo 'Date & Time Start: <font color="maroon">'.date('F d, Y',strtotime($row['date_start']))." :".date('D h:i A',strtotime($row['timestart'])).'</font><br>';
                        // echo 'Date & Time End: <font color="maroon">'.date('F d, Y',strtotime($row['date_end']))." : ".date('D h:i A',strtotime($row['timeend'])).'</font><br>';
                        echo 'Posted by: <font style="background-color:white;"> '.$rowPosted['firstName']." ".$rowPosted['lastName'].'</font><br>';
                        // echo 'Posted by: <font color="blue">'.$row['firstName']." ".$row['lastName'].'</font><br>';

                        $selectchecktype = "SELECT * FROM tblusers WHERE user_id=$user_id AND userType='Student'";
                        $resultchecktype = mysqli_query($conn,$selectchecktype);


                        $selectcheck = "SELECT * FROM tblsubmission WHERE event_id=".$row['event_id']." AND uid=$user_id";
                        $resultcheck = mysqli_query($conn,$selectcheck);

                        $checkSubmitted= "SELECT * FROM tblsubmission WHERE event_id=".$row['event_id']." AND uid=$user_id AND file_attached<>''";
                        $checkFile = mysqli_query($conn,$checkSubmitted);

                        if(mysqli_num_rows($resultchecktype) > 0){
                         if(mysqli_num_rows($resultcheck) > 0){
                        echo '<font color="#ff3300" style="background-color:white;">Already Registered to this event</font><br></a>';
                          if(mysqli_num_rows($checkFile) > 0){
                            echo'<font color="blue">File has been submitted</font><br><a href="MainPage.php?pageid=FileSubmitForm&&event_id='. $row["event_id"].'">Edit & Resubmission</a>';
                          }else{
                             echo '<a href="MainPage.php?pageid=FileSubmitForm&&event_id='. $row["event_id"].'"><font color="blue" style="background-color:white;">Click Here to submit the file</font><br></font></a>';
                          }
                        }else{
                        echo '<a href="MainPage.php?pageid=JoinForm&&event_id='. $row["event_id"].'"><button class="buttonsub" type="submit" name="btnJoin" style="background-color:white;" /><font style="background-color:white;">Join Event</a></font>';
                        }
                        }else{
                          //  echo ' <a href="ViewEvents.php"><font color="#ff3300">View Events</font></a>';
                          echo '<a href="MainPage.php?pageid=ViewSub&&event_id='. $row["event_id"].'"><font color="#ff3300" style="background-color:white;">Click Here to View Participants</font></a>&nbsp &nbsp <button class="buttonsub" type="submit" name="submit" style="background-color:white;"><a href="DeleteEvent.php?event_id='. $row["event_id"].' style="background-color:white;""><img src="trash.png" alt="icon" style="background-color:white;">
            </div></button></a><br>';
                        }



                       
                        echo '</div>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
                // echo '<div class="box1"><br><tbody><tr>';
                // //echo '<td>'.$row['event_id'].'</td>';
                // echo '<p class="p1">Event: <font color="green">'.$row['event_name'].'</font><br>';
                // echo 'Venue/Details: '.$row['event_details'].'<br>';
                // echo 'Date & Time Start: <font color="maroon">'.$row['date_start'].":".$row['timestart'].'</font><br>';
                // echo 'Date & Time End: <font color="maroon">'.$row['date_end'].":".$row['timeend'].'</font><br>';
                // echo 'Posted by: <font color="blue">'.$row['firstName']." ".$row['lastName'].'</font>';
                // echo '</p></tr></tbody>';
                // echo '<p class="p3"><br>================================</p><br></div>';
            }
            // while($rowPosted = mysqli_fetch_assoc($resultPostedby)){
            //               echo 'Posted by: <font color="blue">'.$rowPosted['firstName']." ".$rowPosted['lastName'].'</font><br>';
            //              }


            ?>
                </p>
              </div>
            </body>
          </table>

</html>
</div>
</p>
</div>

<div class="column">

  <p>

    <div class="announcementsRectangle">
       <h2><font color="black">Announcements</font></h2>
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
                if($_SESSION['userType']=="Student"){
                $selectQuery = "SELECT AN.ann_id,AN.ann_name,AN.ann_details,DATE_FORMAT(AN.dateposted,'%b %d, %Y : %a %h:%i %p') AS dateposted,U.firstName,U.lastName,AN.status,U.userType,AN.course,U.course,AN.yr,U.yr FROM tblannouncement AN LEFT JOIN tblusers U ON AN.course=U.course WHERE AN.status=True AND AN.course=U.course AND AN.course='$course' AND U.user_id='$user_id' ORDER BY AN.dateposted DESC";
                }else{
                $selectQuery = "SELECT AN.ann_id,AN.ann_name,AN.ann_details,DATE_FORMAT(AN.dateposted,'%b %d, %Y : %a %h:%i %p') AS dateposted,U.firstName,U.lastName,AN.status,U.userType FROM tblannouncement AN LEFT JOIN tblusers U ON AN.uid=U.user_id WHERE AN.status=True ORDER BY AN.dateposted DESC";
                }

            $result = mysqli_query($conn,$selectQuery);
            if(mysqli_num_rows($result) > 0){
            }else{
                $msg = "No Record found";
                }
            }


     ?>

              <?php

                while($row = mysqli_fetch_assoc($result)){
                 $annid=$row['ann_id'];
                   $selectQueryC = "SELECT AN.ann_id,AN.ann_name,AN.ann_details,DATE_FORMAT(AN.dateposted,'%M %d, %Y : %W %h:%i %p') AS dateposted,U.firstName,U.lastName,AN.status,U.userType FROM tblannouncement AN LEFT JOIN tblusers U ON AN.uid=U.user_id WHERE AN.ann_id='$annid'";
                   $resultPostedbyA = mysqli_query($conn,$selectQueryC);
                   $rowPostedA=mysqli_fetch_array($resultPostedbyA);
                   echo '<div class="dialogbox">';
                      echo '<div class="body">';
                        echo '<span class="tip tip-left"></span>';
                        echo '<div class="message">';

                             echo '<font size="2" valign="left" style="background-color:white;">'.$rowPostedA['firstName']." ".$rowPostedA['lastName'].'</font><br>';


                        echo 'Posted on <font color="maroon" style="background-color:white;"> '.$row['dateposted'].'<br></font>';
                        echo '<font style="background-color:white;">'.$row['userType'].'</font><br>';
                        echo '<b><font style="background-color:white;">'.$row['ann_name'].'</b><br></font>';

                         $selectchecktype1 = "SELECT * FROM tblusers WHERE user_id=$user_id AND userType='Student'";
                        $resultchecktype1 = mysqli_query($conn,$selectchecktype1);
                        echo '<font color="black" style="background-color:white;">'.$row['ann_details'].'</font><br>';
                          if(mysqli_num_rows($resultchecktype1) == 0){
                            echo '
                              <button class="buttonsub" type="submit" name="submit" style="background-color:white;"><a href="DeleteAnnouncement.php?ann_id='. $row["ann_id"].'"><img src="trash.png" alt="icon"></button></a><br>';
                          }

                    
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
                 echo '</div>';



                // echo '<div class="box2"><br><tbody><tr>';
                // //echo '<td>'.$row['event_id'].'</td>';
                // echo '<p class="p2">Announcement: <font color="green">'.$row['ann_name'].'</font><br>';
                // echo 'Details: '.$row['ann_details'].'<br>';
                // echo 'Date Posted: <font color="maroon"> '.$row['dateposted'].'<br></font>';
                // echo 'Posted by: <font color="blue">'.$row['firstName']." ".$row['lastName'].'</font><br>';
                // echo '</p></tr></tbody>';
                // echo '<p class="p3"><br>================================</p><br></div>';
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
</div>
</body>

</html>