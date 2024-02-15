<?php

//load.php
$connect = new PDO('mysql:host=sql308.epizy.com;dbname=epiz_33767114_uscces', 'epiz_33767114', 'KjuB95XBfGL');

$data = array();

$query = "SELECT * FROM tblevent WHERE isCancelled=0 ORDER BY event_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["event_id"],
  'title'   => $row["event_name"],
  'start'   => $row["date_start"],
	'end'   => date('Y-m-d', strtotime($row["date_end"] . ' +1 day')),
  'user_id' =>$row["user_id"]
 );
}

echo json_encode($data);

?>