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
    background-color: #ea952f;
}
.cust{
     font-family: 'helvetica neue',helvetica,arial,'lucida grande',sans-serif;
     border-collapse: collapse;
  }
  .cust td{
     border: solid 1px #63b8ee;
     padding: 3px;
     font-size: 12px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #ffffff;
     color: #000000;
  }
  .cust tr:nth-child(odd){
     background-color: #ffffff;
     color: #000000;
  }
  .cust tr{
     background-color: #ffffff;
     color: #000000;
  }
  .cust tr:hover{
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust th{
     border: solid 1px #3866a3;
     padding: 10px;
     color: #000000;
     background-color: #ffffff;
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
     color: #000000;
  }
  .cust tr:nth-child(odd){
     background-color: #00e600;
     color: #000000;
  }
  .cust tr{
     background-color: ##ffffff;
     color: #000000;
  }
  .cust tr:hover{
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust th{
     border: solid 1px #3866a3;
     padding: 4px;
     color: #ffffff;
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
<?php
include("MainPage.php");
?>

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
                <th>Attachement </th>
                <!-- <th>Attachement 2</th>
                <th>Attachement 3</th>
                <th>Attachement 4</th> -->
                <th>Date Submitted</th>
                <th>Submitted By:</th>
                <th>Points:</th>
                <th>Status:</th>
                <th>Rated by:</th>
              
               
 </tr>

  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
       include("DBConnection.php");
      $user_id=$_GET['user_id'];
        if(mysqli_connect_errno()){
          echo mysqli_connect_error();
          exit();
          }else{
          $selectQuery = "SELECT S.file_id,S.file_desc,S.file_details,S.file_attached,S.file_attachedA,S.file_attachedB,S.file_attachedC,S.date_posted,U.firstName,U.lastName,S.Points,S.rateby_id,S.isApproved FROM tblsubmission S LEFT JOIN tblusers U ON S.uid=U.user_id WHERE S.uid=$user_id  ORDER BY S.date_posted DESC";
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
            $dir="uploads/";
                while($row = mysqli_fetch_assoc($result)){
                  echo '<tbody><tr>';
                  echo '<td><a href="UpdateSubmission.php?file_id='. $row["file_id"].'">'.$row['file_desc'].'</a></td>';
                  // echo '<td>'.$row['file_desc'].'</td>';
                  echo '<td><font color="black">'.$row['file_details'].'</font></td>';
                  echo '<td><a href='.$dir.$row['file_attached'].'>'.$row['file_attached'].'</a><br><a href="Download.php?path='.$dir.$row['file_attached'].'">Download</a></td>';
                  // echo '<td><a href='.$dir.$row['file_attachedA'].'>'.$row['file_attachedA'].'</a><br><a href="Download.php?path='.$dir.$row['file_attachedA'].'">';
                  // if($row['file_attachedA']===""){
                  //   echo "";
                  //  }else{
                  //    echo "Download";}
                  // echo '</a></td>';
                  // echo '<td><a href='.$dir.$row['file_attachedB'].'>'.$row['file_attachedB'].'</a><br><a href="Download.php?path='.$dir.$row['file_attachedB'].'">';
                  // if($row['file_attachedB']===""){
                  //   echo "";
                  //  }else{
                  //    echo "Download";}
                  // echo '</a></td>';
                  // echo '<td><a href='.$dir.$row['file_attachedC'].'>'.$row['file_attachedC'].'</a><br><a href="Download.php?path='.$dir.$row['file_attachedC'].'">'; 
                  // if($row['file_attachedC']===""){
                  //   echo "";
                  //  }else{
                  //    echo "Download";}
                  echo '</a></td>';
                  echo '<td><font color="black">'.$row['date_posted'].'</font></td>';
                  echo '<td><font color="black">'.$row['firstName']." ".$row['lastName'].'</font></td>';
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
