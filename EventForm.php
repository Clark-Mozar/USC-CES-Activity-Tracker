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
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, dl, dt, dd, ol, nav ul, nav li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  /* font: inherit; */
  vertical-align: baseline;
}

a {
  text-decoration: none;
}
textarea{
  width: 100%;
}
.txt-rt {
  text-align: right;
}

.txt-lt {
  text-align: left;
}

.txt-center {
  text-align: center;
}

.float-rt {
  float: right;
}

.float-lt {
  float: left;
}

/* .clear {
  clear: both;
}

.pos-relative {
  position: relative;
}

.pos-absolute {
  position: absolute;
}

.vertical-base {
  vertical-align: baseline;
}

.vertical-top {
  vertical-align: center;
} */


/* nav.vertical ul li {
  display: block;
}

nav.horizontal ul li {
  display: inline-block;
}
 */

img {
  max-width: 100%;
}


body {

  background-attachment: fixed;
  font-family: 'Roboto', sans-serif;
}

h1 {
  font-size: 3em;
  text-align: center;
  color: #fff;
  font-weight: 100;
  text-transform: capitalize;
  letter-spacing: 4px;
  font-family: 'Roboto', sans-serif;
}

/*-- main --*/
/* .main-w3layouts {
  padding: 1em 0 1em;
} */

.main-agileinfo {
  width: 100%;
  height: 100%;
  margin: 1em auto;
  /* background: rgb(2,0,36); */
  /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,121,20,1) 0%, rgba(13,135,113,1) 97%, rgba(8,8,8,1) 100%); */
  /* background-size: cover; */
  /* box-shadow: 23px 5px 29px 1px #1CD03F; */
}

.agileits-top {
  padding: 2em;
}


input[type="text"], input[type="event"], input[type="password"],input[type="date"],input[type="time"] {
  font-size: 0.9em;
  color: #070202;
  font-weight: 100;
  width: 100%;
  display: block;
  border: solid 1px;
  padding: 0.8em;
  border: solid 0.01em #070202;
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: #FFFFFF;
  background-position: -800px 0;
  background-size: 100%;
  background-repeat: no-repeat;
  color: #070202;
  font-family: 'Roboto', sans-serif;
  border-radius: 8px;
}
textarea{
  border-radius: 8px;
}
input.event, input.text.w3lpass{
  margin: 1em 0;

.wrapper {
  position: relative;
  overflow: hidden;
}
}
.buttonsub {
  background-color: #47d147;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

/*-- responsive-design --*/


.buttonsub:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: 20%;
  padding: 10px 18px;
  background-color: #f44336;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 12px;
  /* overflow: auto; */
}

span.psw {
  float: right;
  padding-top: 16px;
}
[type="date"] {
  background:#fff url('https://www.vhv.rs/dpng/d/424-4243517_computer-icons-calendar-clip-art-small-calendar-icon.png')  97% 50% no-repeat ;
}
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 0;
}
.eventsRectangle {
  position: absolute;
  width: 95%;
  left: 32px;
  height: 800px;
  top: 171px;
  border-style: solid;
  border-color: rgb(255, 255, 255);
  border-width: 5px;
  border-radius: 10px;
}
@media screen and (max-width: 500px) {
  .buttonsub {
  background-color: #47d147;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}
.cancelbtn {
  width: 50%;
  padding: 10px 18px;
  background-color: #f44336;
}
}



</style>

<!DOCTYPE html>
<html>
<head>
<title>Post Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<?php
include("DBConnection.php");
?>
<?php
$resultA = mysqli_query($conn,"SELECT * FROM tblusers U  WHERE user_id=$user_id");
if(!$resultA){
  die(mysqli_error($conn));
}
while (false !=($rowA= mysqli_fetch_array($resultA)))
            {
                $userid = $rowA['user_id'];
                $Fname = $rowA['firstName'];
                $Lname = $rowA['lastName'];
              
            }
?>

<body>
	<!-- main -->
  <div class="eventsRectangle">
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
                <form action="Events.php" method="POST" enctype="multipart/form-data" class="frmevents">
                <a href='ViewEvents.php'><font color="#ff9900">View Events</a><br></font>
                <input type="text" class="id" name="user_id" value="<?php echo"$user_id";  ?>" readonly> 
                <input type="text" class="user" name="Empname" value="<?php echo $Fname." ".$Lname;  ?>" readonly><br>
				        <input type="text" class="title" id='event' name="event" placeholder="Enter Event Name" required><br>
                Start Date & Time:<input type="date" name="dateFrom" id="dateFrom" required><input type="time" name="timestart" id="timestart" required>
                End Date & Time:<input type="date" name="dateTo" id="dateTo" required><br>
                <input type="time" name="timeend" id="timeend" required>
                <select name="course">
                <option value="" disabled selected>Course</option>
                <option>BS Civil Engineering</option>
                <option>BS Chemical Engineering</option>
                <option>BS Computer Engineering</option>
                <option>BS Electrical and Electronics Engineering</option>
                <option>BS Mechanical Engineering</option>
                <option>BS Industrial Engineering</option>
                </select>
                <select name="beneficiaries">
                <option value="" disabled selected>Beneficiaries</option>
                <option>Other Sectors with USC</option>
                <option>Public Institutions</option>
                <option>Private Institutions</option>
                <option>Community</option>
                </select>
                <select name="approach">
                <option value="" disabled selected>Approach</option>
                <option>Welfare/Well-being</option>
                <option>Conference, Lecture, or Webinars</option>
                <option>Project Development</option>
                <option>Training or Workshops</option>
                </select>
                <select name="scope">
                <option value="" disabled selected>Scope</option>
                <option>Personal</option>
                <option>Departmental</option>
                <option>School/interdepartmental</option>
                <option>University-wide</option>
                </select>
                <select name="nature of activity">
                <option value="" disabled selected>Nature of Activity</option>
                <option>Co-curricular</option>
                <option>Extra-curricular</option>
                </select>
                <br>
                <select name="yr">
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                </select><br><br>
				<textarea placeholder="Type event venue" id="details" name="details" rows="4" cols="30"></textarea><br>
			    <button class="buttonsub" type="submit" name="submit">Post Event</button><br>
          <button  type="reset" name="reset" class="cancelbtn">Cancel Entries</button><br>
         
				</form>
				
			</div>
		</div>
	
	</div>
	<!-- //main -->
  </div>
</body>
</html>