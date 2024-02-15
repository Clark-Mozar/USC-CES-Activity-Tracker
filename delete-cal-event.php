<?php
 require_once "DBConnection.php";

$id = $_POST['id'];
$sqlDelete = "DELETE from tblevent WHERE id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>