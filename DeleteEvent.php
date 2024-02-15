<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    // include_once 'GoogleCalendarApi.class.php'; 
?>
<?php
    // $googleCalendar = new GoogleCalendarApi();
    // $access_token;
    // $calendar_id = 'YOUR_CALENDAR_ID';

    // Get the access token 
    // $access_token_sess = $_SESSION['google_access_token']; 
    // if(!empty($access_token_sess)){ 
        // $access_token = $access_token_sess; 
    // }else{ 
        // $data = $GoogleCalendarApi->GetAccessToken(GOOGLE_CLIENT_ID, REDIRECT_URI, GOOGLE_CLIENT_SECRET, $_GET['code']); 
        // $access_token = $data['access_token']; 
        // $_SESSION['google_access_token'] = $access_token; 
    // } 

    include_once 'DBConnection.php';
    $userid = $_SESSION['user_id'];
    $event_id = $_GET['event_id'];
    $sqls = "UPDATE tblevent SET IsCancelled=True WHERE event_id='$event_id'";
    $result = mysqli_query($conn, $sqls); 
    $resultB =mysqli_affected_rows($conn);
    if(!$resultB){
        die(mysqli_error($conn));
    }
    if ($resultB>0) {
        // try {
            // $result = $googleCalendar->DeleteCalendarEvent($access_token, $calendar_id, $event_id);
            // if ($result === true) {
                // echo 'Event deleted successfully.';
            // } else {
                // echo 'Failed to delete event.';
            // }
        // } catch (Exception $e) {
            // echo 'Error: ' . $e->getMessage();
        // }
        include("MainPage.php");
        echo "<font color=blue>Event has been deleted!</font>";
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=MainPage.php?pageid=Home\">";
    } else {
        echo "<font color=red>Cannot Delete Event.</font>";
    }
?>  