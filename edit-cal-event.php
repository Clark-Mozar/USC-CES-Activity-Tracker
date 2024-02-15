<?php

//edit.php

$connect = new PDO('mysql:host=sql308.epizy.com;dbname=epiz_33767114_uscces', 'epiz_33767114', 'KjuB95XBfGL');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE tblevent 
 SET event_name=:title, date_start=:start, date_end=:end 
 WHERE event_id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'      => $_POST['title'],
   ':start'      => $_POST['start'],
   ':end'        => $_POST['end'],
   ':id'         => $_POST['id']
  )
 );
}

?>
