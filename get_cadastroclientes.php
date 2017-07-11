<?php

include 'conn.php';
$rs = mysql_query('select * from cadastroclientes');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);
?>