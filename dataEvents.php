<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=project_atk', 'root', '');

$data = array();

$query = "SELECT * FROM atk_open ORDER BY atopen_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["atopen_id"],
  'title'   => $row["faculty"]." จํานวน ".$row["amount"]." คน",
  'start'   => $row["date"],
  'end'   => $row["date"]
 );
}

echo json_encode($data);

?>
