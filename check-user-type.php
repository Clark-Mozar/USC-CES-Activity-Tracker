<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    echo "No user ID provided";
    exit;
}

include("DBConnection.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT userType FROM tblusers WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die(mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$userType = $row['userType'];

echo $userType;

mysqli_close($conn);

?>
