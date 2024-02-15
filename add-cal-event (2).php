<?php

//insert.php

include 'DBConnection.php';

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO tblevent 
 (event_name, date_start, date_end) 
 VALUES (:event_name, :date_start, :date_end)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':event_name'  => $_POST['event_name'],
   ':date_start' => $_POST['date_start'],
   ':date_end' => $_POST['date_end']
  )
 );
}


?><?php

//insert.php

include 'DBConnection.php';

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO tblevent 
 (event_name, date_start, date_end) 
 VALUES (:event_name, :date_start, :date_end)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':event_name'  => $_POST['event_name'],
   ':date_start' => $_POST['date_start'],
   ':date_end' => $_POST['date_end']
  )
 );
}


?><?php

//insert.php

include 'DBConnection.php';

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO tblevent 
 (event_name, date_start, date_end) 
 VALUES (:event_name, :date_start, :date_end)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':event_name'  => $_POST['event_name'],
   ':date_start' => $_POST['date_start'],
   ':date_end' => $_POST['date_end']
  )
 );
}


?><?php

//insert.php

include 'DBConnection.php';

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO tblevent 
 (event_name, date_start, date_end) 
 VALUES (:event_name, :date_start, :date_end)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':event_name'  => $_POST['event_name'],
   ':date_start' => $_POST['date_start'],
   ':date_end' => $_POST['date_end']
  )
 );
}


?>