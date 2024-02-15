<?php 
    session_start();

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email =  $_SESSION['email'];
    $user_name = $_SESSION['user_name'];
    $pass1 = $_SESSION['pass1'];
    $pass2 = $_SESSION['pass2'];
    $usertype = $_SESSION['usertype'];
    $idnum = $_SESSION['idnum'];
    $role = $_SESSION['role'];
    $active = $_SESSION['active'];
    $courseA= $_SESSION['course'];
    $yr= $_SESSION['yr'];
    require_once 'dbConfig.php'; 
?>

<?php
    include_once 'GoogleCalendarApi.class.php'; 
    $GoogleCalendarApi = new GoogleCalendarApi(); 

    $verified = $_SESSION['verified'];
    if (false) {
        unset($_SESSION['verified']);
        
    } else {
        ?>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->

            <!doctype html>
            <html lang="en">
                <head>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Fonts -->
                    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
                    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

                    <link rel="stylesheet" href="style.css">

                    <link rel="icon" href="Favicon.png">

                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

                    <title>Verification</title>
                </head>
                <body>

                    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
                        <div class="container">
                            <a class="navbar-brand" href="#">Verification Account</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </nav>

                    <main class="login-form">
                        <div class="cotainer">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">Verification Account</div>
                                        <div class="card-body">
                                            <form action="#" method="POST">
                                                <div class="form-group row">
                                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 offset-md-4">
                                                    <input type="submit" value="Verify" name="verify">
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                </body>
            </html>
        <?php
    }
?>

<?php 
    include('DBConnection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code) {
            ?>
                <script>
                    alert("Invalid OTP code");
                </script>
            <?php
        } else {
            mysqli_query($conn, "INSERT INTO tblusers (user_name,firstName,lastName,pass1,pass2,userType,emailAdd,idnum,isActive,inGroup,course,yr) VALUES ('$user_name','$fname','$lname',md5('$pass1'),md5('$pass2'),'$role','$email','$idnum','$active',0,'$courseA','$yr')");
            if (is_numeric(explode('@', $email)[0])) {
                $_SESSION['verified'] = true;
                header("Location: $googleOauthURL"); 
                exit(); 
                ?>
                    <script>
                        alert("Success account verification, you may sign in now.");
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert("Email verification is done. You have to wait for another confirmation of USC CES coordinator about your role.");
                    </script>
                <?php
            }
            ?>
                <script>
                    window.location.replace("index.php");
                </script>
            <?php
        }
    }
?>

