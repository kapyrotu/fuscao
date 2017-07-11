<?php
include 'conn.php';

$sql = "SELECT * FROM cadastroclientes WHERE id='$id'";
$query = @mysql_query($sql);
while($sql = @mysql_fetch_array($query)){
$nome = $sql["nome"];
echo "Resultados para o ID $idNome:$nome";
}
?>