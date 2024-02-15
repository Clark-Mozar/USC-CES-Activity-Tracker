<style>
.scrollit {
    overflow:scroll;
    height:450px;
    /* overflow-x: hidden; */
}

th{
    background-color: #ebebe0;
}
.cust{
     font-family: 'helvetica neue',helvetica,arial,'lucida grande',sans-serif;
     border-collapse: collapse;
     width: 60%;
  }
  .cust td{
     border: solid 1px #000000;
     padding: 3px;
     font-size: 10px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust tr:nth-child(odd){
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust tr{
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust tr:hover{
     background-color: #ffffcc;
     color: #000000;
  }
  .cust th{
     border: solid 1px #000000;
     padding: 10px;
     color: #000000;
     background-color: #ebebe0;
     text-align: center;
     font-size: 10px;
  }
  @media screen and (max-width: 800px) {
    .cust td{
     border: solid 1px #000000;
     padding: 2px;
     font-size: 7px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #468ccf;
     color: #000000;
  }
  .cust tr:nth-child(odd){
     background-color: #000000;
     color: #0060C7;
  }
  .cust tr{
     background-color: #FFFFFF;
     color: #D9E9FF;
  }
  .cust tr:hover{
     background-color: #ffffcc;
     color: #000000;
  }
  .cust th{
     border: solid 1px #000000;
     padding: 4px;
     color: #000000;
     background-color: #ebebe0;
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
@media screen and (max-width: 900px) {
    .cust td{
     border: solid 1px #000000;
     padding: 2px;
     font-size: 12px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust tr:nth-child(odd){
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust tr{
     background-color: #FFFFFF;
     color: #000000;
  }
  .cust tr:hover{
     background-color: #ffffcc;
     color: #000000;
  }
  .cust th{
     border: solid 1px #000000;
     padding: 4px;
     color: #000000;
     background-color: #ebebe0;
     text-align: center;
     font-size: 12px;
  }
  .scrollit {
    overflow:scroll;
    height:450px;
    /* overflow-x: hidden; */
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
    <title>Manage Posts</title>
  </head>
<center>
<div class="scrollit">
<table id="customers" class="cust" border=1>
  <tr>  
                <th>User ID</th>
                <th class='evName'>User Name</th>
                <th class='evDetails'>Name</th>
                <th>User Type</th>
                <th>Email Address</th> 
                        
 </tr>

  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
       include("DBConnection.php");
      $userType=$_SESSION['userType'];
      $user_id=$_SESSION['user_id'];
      if($_SESSION['userType']=="CESCo" || $_SESSION['userType']=="CESRep"){
        if(mysqli_connect_errno()){
          echo mysqli_connect_error();
          exit();
          }else{
          $selectQuery = "SELECT user_id,user_name,firstName,lastName,userType,emailAdd FROM tblusers ORDER BY user_id ASC";
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
            
                while($row = mysqli_fetch_assoc($result)){
                echo '<tbody><tr>';
                echo '<td><a href="UpdateManageAcct.php?user_id='. $row["user_id"].'">'.$row["user_id"].'</a></td>';
                // echo '<td>'.$row['file_desc'].'</td>';
                echo '<td><font color="black">'.$row['user_name'].'</font></td>';
                echo '<td><font color="black">'.$row['firstName']." ".$row['lastName'].'</font></td>';
                // echo '<td><font color="blue">'.$row['uid'].'</font></td>';
                echo '<td><font color="red">'.$row['userType'].'</font></td>';
                echo '<td>'.$row['emailAdd'].'</td>';
                echo '</tr></tbody>'; 

            }?>
            
</html>
</div>
</center>
