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
     width: 60%;
  }
  .cust td{
     border: solid 1px #000000;
     padding: 3px;
     font-size: 12px;
     text-align: center;
  }
  .cust tr:nth-child(even){
     background-color: #FFFFFF;
     color: #D9E9FF;
  }
  .cust tr:nth-child(odd){
     background-color: #FFFFFF;
     color: #0060C7;
  }
  .cust tr{
     background-color: #FFFFFF;
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
.imgicon{
  height: 15px;
  width: 15px;
  margin-left: 5px;
}


</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="ViewEvents.css" />  -->

  </head>
<center>
          <input type="hidden" name="action">
<?php
$action=&$_GET['action'];
?>
<div class="scrollit">
  <a href='ViewEvents.php'>View Events</a>
<table id="customers" class="cust" border=1>
  <form name="frmtable" method="post">
  <?php
      echo '<tr><td colspan="9"  style="text-align:left"><input type="number" name="Points" id="Points" min=0>';
      echo '<tr><td colspan="9" style="text-align:left"><input type="submit" name="btnUpdate" id="btnUpdate" value="Update Points">';
  ?>
  

  <tr><td colspan="10" style="text-align:left">Change Scoring Matrix</td></tr>
  <tr>  
                
                <th>Seq.</th>
                <th>Role</th>
                <th>Points</th>
               
 </tr>
 
  <body class="parent-cont">
    <div class="sidebar">
      <p>
      <?php
       include("DBConnection.php");
      $userType=$_SESSION['userType'];
      $user_id=$_SESSION['user_id'];
      if($_SESSION['userType']=="CESCo"){
          $selectQuery = "SELECT * FROM tblroles"; 
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
            $count=0;
                while($row = mysqli_fetch_assoc($result)){
                  $count+=1;
                  $role_id=$row['role_id'];
                  $role=$row['role'];
                  $points=$row['points'];
                echo '<tbody><tr>';
                echo '<td>'.$role_id.'</td>';
                echo '<td><font color="black"><font color="black"><a href="MainPage.php?pageid=ViewManageScore&action=select&role_id='.$role_id.'">'.$row['role'].'</a></font></td>';
                echo '<td>'.$points.'</td>';
                echo '</form></tr></tbody>'; 
            }?> 
        <?php
            //  $points = &$_GET['points'];
            if(($_GET['pageid'] == 'ViewManageScore') && ($_GET['action'] == 'select') && isset($_GET['role_id'])){
            echo '<td colspan="10"  style="text-align:left"><input type="hidden" name="roleid" value='.$_GET["role_id"].' readonly></td>';
          }
        ?>
        <?php
            $points= &$_POST['Points'];
            if(($_GET['pageid'] == 'ViewManageScore') && isset($_POST['btnUpdate']) && isset($_GET['role_id'])){
            $sqls = "UPDATE tblroles SET Points='$points' WHERE role_id =".$_GET['role_id']."";
            $result12 = $conn->query($sqls);
            $resultB12 =mysqli_affected_rows($conn); 
            date_default_timezone_set('Asia/Manila');
            $dateposted = date("Y-m-d H:i:s");
            $postedby= $_SESSION['user_id'];
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=ViewManageScore\">";
          
           
          }
        ?>
         
        
        <script type="text/javascript">
  function enable(){
    document.getElementById("btnupdate").disabled = true;   

    
}
  </script>
</form>
</html>
</div>
</center>
