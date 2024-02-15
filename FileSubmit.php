
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}else{
    include("index.php");
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
 include("MainPage.php"); 
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 7 values from the form data(input)
        $desc_name =  &$_REQUEST['desc_name'];
        $file_details =  &$_REQUEST['details'];
        $uid = &$_REQUEST['user_id'];
        date_default_timezone_set('Asia/Manila');
        $dateposted = date("Y-m-d H:i:s");
        $eventid=  &$_REQUEST['event_id'];
       
     // File upload path
     $targetDir = "uploads/";
     $fileName =basename($_FILES["file"]["name"]);
     $fileName = str_replace(' ','', $fileName);
     $targetFilePath = $targetDir . $fileName;
     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
   

    //  $fileNameA =basename($_FILES["fileA"]["name"]);
    //  $fileNameA = str_replace(' ','', $uid.$desc_name.$fileNameA);
    //  $targetFilePathA = $targetDir . $fileNameA;
    //  $fileTypeA = pathinfo($targetFilePathA,PATHINFO_EXTENSION);

    //  $fileNameB =basename($_FILES["fileB"]["name"]);
    //  $fileNameB = str_replace(' ','', $uid.$desc_name.$fileNameB);
    //  $targetFilePathB = $targetDir . $fileNameB;
    //  $fileTypeB = pathinfo($targetFilePathB,PATHINFO_EXTENSION);

    //  $fileNameC =basename($_FILES["fileC"]["name"]);
    //  $fileNameC = str_replace(' ','', $uid.$desc_name.$fileNameC);
    //  $targetFilePathC = $targetDir . $fileNameC;
    //  $fileTypeC = pathinfo($targetFilePathC,PATHINFO_EXTENSION);
      
    //  if(!empty($_FILES["file"]) && !empty($_FILES["fileA"]) && !empty($_FILES["fileB"]) && !empty($_FILES["fileC"] )){
        if(isset($_POST['submit'])) 
        {
         if(isset($_POST['submit'])) 
        {
            if($fileType != "pdf"){
                echo "Sorry, only PDF files are allowed.";
            }else
            {
         move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        //  move_uploaded_file($_FILES["fileA"]["tmp_name"], $targetFilePathA);
        //  move_uploaded_file($_FILES["fileB"]["tmp_name"], $targetFilePathB);
        //  move_uploaded_file($_FILES["fileC"]["tmp_name"], $targetFilePathC);

         $sql = "UPDATE tblsubmission SET file_desc='$desc_name',file_details='$file_details',
                    file_attached='$fileName',date_posted='$dateposted' WHERE uid='$uid' AND
                      event_id ='$eventid'";
                if(!$sql){
                  die(mysqli_error($conn));
                }
               if (mysqli_query($conn, $sql)) {
                echo "<font color=blue>File has been submitted !</font>";   
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=ViewSubStud\">";   
        } else {
        //  $sql = "INSERT INTO tblsubmission(file_desc,file_details,file_attached,file_attachedA,file_attachedB,file_attachedC,uid,date_posted)
        //        VALUES ('$desc_name','$file_details','$fileName','$fileNameA','$fileNameB','$fileNameC','$uid','$dateposted')";
        //         if(!$sql){
        //           die(mysqli_error($conn));
        //         }
        //        if (mysqli_query($conn, $sql)) {
        //         echo "<font color=blue>File has been submitted !</font>";   
        //         echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=ViewSubStud\">";   
        // } else {
      echo "Error: " . $sql . "
    " . mysqli_error($conn);
    }
        }
    }

 }
    

    //  }else{

    //     echo "<font color=red>No File Selected.Please select a file.</font>";
    //  }       
     
 ?>


