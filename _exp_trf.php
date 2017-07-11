
<?php
include 'conn.php';
define('FPDF_FONTPATH', 'fpdf/font');
require ('fpdf/fpdf.php');
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 6);
 $pdf->Text(1,0.5,iconv('utf-8','iso-8859-1','Lista de Movimentação - 2016 - Estudantes Novos e Transferidos'));
//$pdf->Cell (0, 0.3, 'Lista de Movimentação - 2015', 0, 0.3, 'L');
//$pdf->Image('');
$result = mysql_query("SET NAMES utf8");
$sql="SELECT * FROM cadastroclientes WHERE ano ='2016' AND sai!=''";
$conn =mysql_connect("localhost", "root", "");

//if (!conn)die ("<h1>Falha na conexao</h1>");
$db = mysql_select_db("cadastroclientes");
$exe_sql=mysql_query($sql)or die (mysql_error());

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(1, 0.3, 'CH', 1);
$pdf->Cell(1, 0.3, 'COD', 1);
$pdf->Cell(6.5, 0.3, 'NOME', 1);
$pdf->Cell(1.2, 0.3, 'DTN', 1);
$pdf->Cell(1, 0.3, 'TURMA', 1);
$pdf->Cell(1.2, 0.3, 'ENTRADA', 1);
$pdf->Cell(1.2, 0.3, 'SAIDA',1);
$pdf->Cell(5.3, 0.3, 'OBSERVACOES',1);
$pdf->Ln();

while ($resultado=mysql_fetch_array($exe_sql)) {
	$pdf->Cell(1, 0.3, $resultado ['nch'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['codigo'], 1, 0, 'L');	
	$pdf->Cell(6.5, 0.3, $resultado ['nome'], 1, 0, 'L');
	$pdf->Cell(1.2, 0.3, $resultado ['dtn'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['tur'], 1, 0, 'L');
	$pdf->Cell(1.2, 0.3, $resultado ['ent'], 1, 0, 'L');
	$pdf->Cell(1.2, 0.3, $resultado ['sai'], 1, 0, 'L');
	$pdf->Cell(5.3, 0.3, $resultado ['obs'], 1, 1, 'L');

}
$pdf->Output();
?>

