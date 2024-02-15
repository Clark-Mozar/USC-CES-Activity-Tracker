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
    background-color: #e0ebeb;
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
     background-color: #ffffff;
     color: #D9E9FF;
  }
  .cust tr:nth-child(odd){
     background-color: #ffffff;
     color: #0060C7;
  }
  .cust tr{
     background-color:#ffffff;
     color: #D9E9FF;
  }
  .cust tr:hover{
     background-color: #ffffcc;
     color: #000000;
  }
  .cust th{
     border: solid 1px #000000;
     padding: 10px;
     color: #000000;
     background-color: #e0ebeb;
     text-align: center;
     font-size: 12px;
  }
  @media screen and (max-width: 800px) {
    .cust td{
     border: solid 1px #63b8ee;
     padding: 1px;
     font-size: 8px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #ffffff;
     color: #D9E9FF;
  }
  .cust tr:nth-child(odd){
     background-color: #ffffff;
     color: #0060C7;
  }
  .cust tr{
     background-color: #468ccf;
     color: #D9E9FF;
  }
  .cust tr:hover{
     background-color: #ffffcc;
     color: #000000;
  }
  .cust th{
     border: solid 1px #3866a3;
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
                <th>ID Number</th>
                <th>Name</th>
                <th>Overall Total Points</th>
                <!-- <th>View</th>        -->
 </tr>

  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
       include("DBConnection.php");
      $userType=$_SESSION['userType'];
      $user_id=$_SESSION['user_id'];
        if(mysqli_connect_errno()){
          echo mysqli_connect_error();
          exit();
          }else{
          $selectQuery = "SELECT S.uid,U.firstName,U.lastName,SUM(R.points) as pnts,S.date_posted FROM tblsubmission S LEFT JOIN tblusers U ON S.uid=U.user_id LEFT JOIN tblroles R ON S.Roles=R.role_id GROUP BY S.uid,U.firstName,U.lastName ORDER BY SUM(R.Points) DESC ";
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
                echo '<tbody><tr>';

                // echo '<td>'.$row['file_desc'].'</td>';
                echo '<td><a href="ViewSubDetails.php?user_id='. $row["uid"].'">'.$row["uid"].'</a></td>';
               //  echo '<td><font color="black">'.$row['uid'].'</font></td>';
                echo '<td><font color="black">'.$row['firstName']." ".$row['lastName'].'</font></td>';
                // echo '<td><font color="blue">'.$row['uid'].'</font></td>';
                echo '<td><font color="#e62e00">'.$row['pnts'].'</font></td>';
                echo '</tr></tbody>'; 

            }?>
            
</html>
</div>
</center>
