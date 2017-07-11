<?php
header("Content-Type: text/html; charset=utf-8", true);
$id = intval($_REQUEST['id']);
$ano = $_REQUEST['ano'];
$nch = $_REQUEST['nch'];
$codigo = $_REQUEST['codigo'];
$nome = $_REQUEST['nome'];
$hor = $_REQUEST['hor'];
$res = $_REQUEST['res'];
$dtn = $_REQUEST['dtn'];
$sre = $_REQUEST['sre'];
$tur = $_REQUEST['tur'];
$sex = $_REQUEST['sex'];
$ane = $_REQUEST['ane'];
$ent = $_REQUEST['ent'];
$sai = $_REQUEST['sai'];
$obs = $_REQUEST['obs'];
$fot = $_REQUEST['fot'];
$cpi = $_REQUEST['cpi'];
$cpf1 = $_REQUEST['cpf1'];
$hesi = $_REQUEST['hesi'];
$hesf = $_REQUEST['hesf'];
$heem = $_REQUEST['heem'];
$fiat = $_REQUEST['fiat'];
$cpf2 = $_REQUEST['cpf2'];
$cad = $_REQUEST['cad'];
$his = $_REQUEST['his'];
$rem = $_REQUEST['rem'];
$obs2 = $_REQUEST['obs2'];

include 'conn.php';

$sql = "update cadastroclientes set ano='$ano',nch='$nch',codigo='$codigo',nome='$nome',hor='$hor',res='$res',dtn='$dtn',sre='$sre',tur='$tur',sex='$sex',ane='$ane',ent='$ent',sai='$sai',obs='$obs',fot='$fot',cpi='$cpi',cpf1='$cpf1',hesi='$hesi',hesf='$hesf',heem='$heem',fiat='$fiat',cpf2='$cpf2',cad='$cad',his='$his',rem='$rem',obs2='$obs2' where id=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'ano' => $ano,
	'nch' => $nch,
	'codigo' => $codigo,
	'nome' => $nome,
	'hor' => $hor,
	'res' => $res,
	'dtn' => $dtn,
	'sre' => $sre,
	'tur' => $tur,
	'sex' => $sex,
	'ane' => $ane,
	'ent' => $ent,
	'sai' => $sai,
	'obs' => $obs,
	'fot' => $fot,
	'cpi' => $cpi,
	'cpf1' => $cpf1,
	'hesi' => $hesi,
	'hesf' => $hesf,
	'heem' => $heem,
	'fiat' => $fiat,
	'cpf2' => $cpf2,
	'cad' => $cad,
	'his' => $his,
	'rem' => $rem,
	'obs2' => $obs2
));

			header("Location: admin.php?");
?>