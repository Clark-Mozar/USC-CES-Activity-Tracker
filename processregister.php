<?php
session_start();
$_SESSION['register'] = true;
?>

<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  form {
    border: 3px solid #f1f1f1;
  }

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

<?php
    include_once 'DBConnection.php';
    if($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    $fname =  $_REQUEST['firstName'];
    $lname = $_REQUEST['lastName'];
    $email =  $_REQUEST['emailAdd'];
    $user_name = $_REQUEST['user_name'];
    $pass1 = $_REQUEST['pass1'];
    $pass2= $_REQUEST['pass2'];
    $usertype = $_REQUEST['typeOfUser'];
    $idnum = $_REQUEST['idnum'];
    $courseA= $_REQUEST['course'];
    $yr= $_REQUEST['yr'];

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['pass1'] = $pass1;
    $_SESSION['pass2'] = $pass2;
    $_SESSION['usertype'] = $usertype;
    $_SESSION['idnum'] = $idnum;
    $_SESSION['course'] = $courseA;
    $_SESSION['yr'] = $yr;
    
    $sql = "SELECT * FROM tblusers WHERE emailAdd='$email'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM tblusers WHERE user_name='$user_name'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) >0) {
        echo "<center><font color=red><b>There is already existing account associated with this email address associated</b></font></center>";
        include("frmregister.php");       
    } elseif(mysqli_num_rows($result1) >0) {
        echo "<center><font color=red><b>Username is not available. Please select another username</b></font></center>";
        include("frmregister.php");
    
    } else if (strpos($email, 'usc.edu.ph') === false) {
        echo "<center><font color=red><b>Invalid email address. Please use an email address with @usc.edu.ph domain.</b></font></center>";
        include("frmregister.php");
    }
    else{
        if ($_POST['emailAdd']==" ") {
            echo "<center><font color=red><b>Please Complete all fields.</b></font></center>";
            include("frmregister.php");
        } else {
            if ($pass1!=$pass2) {
                    echo "<center><font color=red><b>Password mismatched!</b></font></center>";
                    include("frmregister.php");
            } 
            else {
                $otp = rand(100000,999999);
                $_SESSION['otp'] = $otp;
                session_cache_limiter('private_no_expire');
                ini_set('session.gc_maxlifetime', 3600);
                session_set_cookie_params(3600);
                session_cache_limiter('nocache');
                $_SESSION['mail'] = $email;

                $url = 'https://maker.ifttt.com/trigger/USCCES/with/key/cNcOze7SKcCBx1WmHRiYKi';
                $data = array('value1' => $email, 'value2' => $otp);

                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data),
                    ),
                );

                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);

                if (strpos($result, "Congratulations") !== false) {
                    ?>
                        <script>
                            alert("<?php echo "We need to verify if it was you, OTP sent to " . $email ?>");
                            window.location.replace('verification.php');
                        </script>
                    <?php

                    if (is_numeric(explode('@', $email)[0])) {
                        $role = "Student";
                        $active = 1;
                    } else {
                        $role = "CES";
                        $active = 0;
                    }
                    $_SESSION['role'] = $role;
                    $_SESSION['active'] = $active;
                
                    if (mysqli_query($conn, $sql)) {
                        include("index.php");
                        echo '<div class="displayReg">'; 
                        echo "User: " .$fname." Successfully registered<br>";
                        echo "Name: ".$fname." ".$lname."<br>";
                        echo "Email: ". $email."<br>";
                        echo "Username: ".$user_name."<br>";
                        echo "User Type: ".$usertype."<br>";
                        echo "Id Number: ".$idnum."<br>";
                        echo "Course & Year: ".$courseA." ".$yr."<br>";
                    } else {
                        echo "ERROR: Hush! Sorry $sql."
                        . mysqli_error($conn);
                        echo '</div>'; 
                    }
                } else {
                    ?>
                        <script>
                            alert("<?php echo "Register Failed, Invalid Email "?>");
                        </script>
                    <?php
                }
            // Close connection
            mysqli_close($conn);
            }
        }
    }
?>
