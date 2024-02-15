<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
?>
<style>
.welcome{
  margin-top: 8px;
  margin-bottom: 2px;
  font-size: 12px;
}
.scrollit {
    overflow:scroll;
    height:450px;
    /* overflow-x: hidden; */
}

th{
    background-color: #d9d9d9;
}
.cust{
     font-family: 'helvetica neue',helvetica,arial,'lucida grande',sans-serif;
     border-collapse: collapse;
  }
  .cust td{
     border: solid 1px #000000;
     padding: 3px;
     font-size: 12px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #468ccf;
     color: #D9E9FF;
  }
  .cust tr:nth-child(odd){
     background-color: #FFFFFF;
     color: #0060C7;
  }
  .cust tr{
     background-color: #468ccf;
     color: #D9E9FF;
  }
  .cust tr:hover{
     background-color: #b3ffb3;
     color: #000000;
  }
  .cust th{
     border: solid 1px #000000;
     padding: 10px;
     color: #000000;
     background-color: #d9d9d9;
     text-align: center;
     font-size: 12px;
  }
  a:link, a:visited {
  /* background-color: #f44336; */
  color: black;
  }
  @media screen and (max-width: 800px) {
    .cust td{
     border: solid 1px #000000;
     padding: 1px;
     font-size: 8px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #468ccf;
     color: #D9E9FF;
  }
  .cust tr:nth-child(odd){
     background-color: #00e600;
     color: #0060C7;
  }
  .cust tr{
     background-color: #468ccf;
     color: #D9E9FF;
  }
  .cust tr:hover{
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust th{
     border: solid 1px #000000;
     padding: 4px;
     color: #0039e6;
     background-color: #ffa31a;
     text-align: center;
     font-size: 8px;
  }
  .scrollit {
    overflow:scroll;
    height:450px;
    /* overflow-x: hidden; */
}
.welcome{
  margin-top: 8px;
  margin-bottom: 2px;
  font-size: 12px;
}
}



</style>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="ViewEvents.css" />  -->
    <title>Files Submitted</title>
  </head>
<center>
<div class="scrollit">
<table id="customers" class="cust" border=1>
  <tr>  
                <th class='evName'>File Description</th>
                <th class='evDetails'>File Details</th>
                <th>Attachement1</th>
                <th>Date Submitted</th>
                <th>Submitted By:</th>
                <th>Points</th>
                <th>Status</th>
                <th>Rated by:</th>
                <!-- <th>Downloads:</th> -->
               
 </tr>

  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
       include("DBConnection.php");
      $userType=$_SESSION['userType'];
      $user_id=$_SESSION['user_id'];
      if($_SESSION['userType']=="Student"){
        if(mysqli_connect_errno()){
          echo mysqli_connect_error();
          exit();
          }else{
          $selectQuery = "SELECT S.file_id,S.file_desc,S.file_details,S.file_attached,S.date_posted,U.firstName,U.lastName,S.Points,S.rateby_id,S.isApproved FROM tblsubmission S LEFT JOIN tblusers U ON S.uid=U.user_id WHERE U.user_id=$user_id  ORDER BY S.date_posted DESC";
          $result = mysqli_query($conn,$selectQuery);
          if(mysqli_num_rows($result) > 0){
          }else{
          $msg = "No Record found";
        }
      }
    }
      else{
        if(mysqli_connect_errno()){
          echo mysqli_connect_error();
          exit();
          }else{
          $selectQuery = "SELECT S.file_id,S.file_desc,S.file_details,S.file_attached,S.date_posted,U.firstName,U.lastName,S.Points,S.rateby_id,S.isApproved  FROM tblsubmission S LEFT JOIN tblusers U ON S.uid=U.user_id ORDER BY S.date_posted DESC";
          $result = mysqli_query($conn,$selectQuery);
          if(!$result){
            die(mysqli_error($conn));
          }
          if(mysqli_num_rows($result) > 0){
          }else{
          $msg = "No Record found";
        }
      }
      }       
     ?>
    
            <?php
            $dir="uploads/";
                while($row = mysqli_fetch_assoc($result)){
                echo '<tbody><tr>';
                echo '<td>'.$row['file_desc'].'</a></td>';
                // echo '<td>'.$row['file_desc'].'</td>';
                echo '<td><font color="black">'.$row['file_details'].'</font></td>';
                echo '<td><font color="black"><a href='.$dir.$row['file_attached'].'>'.$row['file_attached'].'</font></a><br><a href="Download.php?path='.$dir.$row['file_attached'].'">';
                if($row['file_attached']===""){
                  echo "";
                 }else{
                   echo "Download";}
                echo '</a></td>';
                echo '<td><font color="black"><font color="black">'.$row['date_posted'].'</font></td>';
                echo '<td><font color="black"><font color="black">'.$row['firstName']." ".$row['lastName'].'</font></td>';
                // echo '<td><font color="blue">'.$row['uid'].'</font></td>';

                if($_SESSION['userType']=="Student"){
                  echo '<td><font color="#e62e00">"--"</font></td>';
                  
                }
                  else{
                    echo '<td><font color="#e62e00">'.$row['Points'].'</font></td>';
                  }


                echo '<td>'.$row['isApproved'].'</td>';    
                
                echo '<td>'.$row['rateby_id'].'</td>';
                // echo '<td><a href="Download.php?path='.$dir.$row['file_attached'].'">Download File</a></td>';
                echo '</tr></tbody>'; 

            }?>
            
</html>
</div>
</center>
