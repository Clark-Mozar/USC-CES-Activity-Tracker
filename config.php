<?php 
 
// Database configuration    
define('DB_HOST', 'sql308.epizy.com'); 
define('DB_USERNAME', 'epiz_33767114'); 
define('DB_PASSWORD', 'KjuB95XBfGL'); 
define('DB_NAME', 'epiz_33767114_uscces'); 
 
// Google API configuration 
define('GOOGLE_CLIENT_ID', '61261326962-b5pv3ahivbl5h7n9unifn1gfq3cuvo17.apps.googleusercontent.com'); 
define('GOOGLE_CLIENT_SECRET', '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'); 


define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/calendar'); 
define('REDIRECT_URI', 'http://uscces.great-site.net/google_calendar_event_sync.php'); 
 
// Start session 
if(!session_id()) session_start(); 
 
// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode(GOOGLE_OAUTH_SCOPE) . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online'; 
 
?>