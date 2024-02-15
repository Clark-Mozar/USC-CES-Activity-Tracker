<?php 
// googleGroups.php
session_start();
// Include Google calendar api handler class 
include_once 'GoogleCalendarApi.class.php'; 
     
// Include database configuration file 
require_once 'dbConfig.php'; 
 
if(isset($_GET['code'])){ 
    // Initialize Google Calendar API class 
    $GoogleCalendarApi = new GoogleCalendarApi(); 
 
    // Get the access token 
    $access_token_sess = $_SESSION['google_access_token']; 
    if(!empty($access_token_sess)){ 
        $access_token = $access_token_sess; 
    }else{ 
        $data = $GoogleCalendarApi->GetAccessToken(GOOGLE_CLIENT_ID, REDIRECT_URI, GOOGLE_CLIENT_SECRET, $_GET['code']); 
        $access_token = $data['access_token']; 
        $_SESSION['google_access_token'] = $access_token; 
    } 
        
    $email = $_SESSION['email'];
    if(!empty($access_token)){ 
        try { 
            $addmember = $GoogleCalendarApi->addMemberToGroup($email, $access_token); 
            unset($_SESSION['google_access_token']); 
        } catch(Exception $e) { 
            //header('Bad Request', true, 400); 
            //echo json_encode(array( 'error' => 1, 'message' => $e->getMessage() )); 
            $statusMsg = $e->getMessage(); 
        } 
    }else{ 
        $statusMsg = 'Failed to fetch access token!'; 
    } 
     
    $_SESSION['status_response'] = array('status' => $status, 'status_msg' => $statusMsg); 
     
    header("Location: http://uscces.great-site.net"); 
    exit(); 
} 
?>