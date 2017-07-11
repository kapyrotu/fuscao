<?php

$id = intval($_REQUEST['id']);
$nch = $_REQUEST['nch'];
$codigo = $_REQUEST['codigo'];
$nome = $_REQUEST['nome'];
$dtn = $_REQUEST['dtn'];
$sre = $_REQUEST['sre'];
$tur = $_REQUEST['tur'];
$sex = $_REQUEST['sex'];
$ane = $_REQUEST['ane'];
$ent = $_REQUEST['ent'];
$sai = $_REQUEST['sai'];
$lmg = $_REQUEST['lmg'];
$bim = $_REQUEST['bim'];
$mot = $_REQUEST['mot'];
$obs = $_REQUEST['obs'];
$fot = $_REQUEST['fot'];
$cpi = $_REQUEST['cpi'];
$cpf1 = $_REQUEST['cpf1'];
$hesi = $_REQUEST['hesi'];
$hesf = $_REQUEST['hesf'];
$heem = $_REQUEST['heem'];
$fiat = $_REQUEST['fiat'];
$cpf2 = $_REQUEST['cpf2'];
$obs2 = $_REQUEST['obs2'];

include 'conn.php';

$sql = "update cadastroclientes set nch='$nch',codigo='$codigo',nome='$nome',dtn='$dtn',sre='$sre',tur='$tur',sex='$sex',ane='$ane',ent='$ent',sai='$sai',lmg='$lmg',bim='$bim',mot='$mot',obs='$obs',fot='$fot',cpi='$cpi',cpf1='$cpf1',hesi='$hesi',hesf='$hesf',heem='$heem',fiat='$fiat',cpf2='$cpf2',obs2='$obs2' where id=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'nch' => $nch,
	'codigo' => $codigo,
	'nome' => $nome,
	'dtn' => $dtn,
	'sre' => $sre,
	'tur' => $tur,
	'sex' => $sex,
	'ane' => $ane,
	'ent' => $ent,
	'sai' => $sai,
	'lmg' => $lmg,
	'bim' => $bim,
	'mot' => $mot,
	'obs' => $obs,
	'fot' => $fot,
	'cpi' => $cpi,
	'cpf1' => $cpf1,
	'hesi' => $hesi,
	'hesf' => $hesf,
	'heem' => $heem,
	'fiat' => $fiat,
	'cpf2' => $cpf2
));
?>