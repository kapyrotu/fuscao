<?php
header('Content-Type: text/html; charset=utf-8');
?>
<?php
include 'conn.php';
define('FPDF_FONTPATH', 'fpdf/font');
require ('fpdf/fpdf.php');
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 6);
$pdf->Text(1,0.5,iconv('utf-8','iso-8859-1',''));
//$pdf->Cell (0, 0.3, 'Lista de Movimentação - 2015', 0, 0.3, 'L');
$pdf->Image('logo_atestados.png');
$result = mysql_query("SET NAMES UTF-8");
$sql="SELECT * FROM cadastroclientes WHERE lmg !='' ORDER BY tur";
$conn =mysql_connect("localhost", "root", "");

//if (!conn)die ("<h1>Falha na conexao</h1>");
$db = mysql_select_db("cadastroclientes");
$exe_sql=mysql_query($sql)or die (mysql_error());

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(1, 0.3, 'CH', 1);
$pdf->Cell(6, 0.3, 'NOME', 1);
$pdf->Cell(1, 0.3, 'TURMA', 1);
//$pdf->Cell(1, 0.3, 'LICENCA', 1);
//$pdf->Cell(2, 0.3, 'INICIO', 1);
//$pdf->Cell(2, 0.3, 'FIM',1);
$pdf->Cell(12, 0.3, 'DATAS - MOTIVO',1);
$pdf->Ln();

while ($resultado=mysql_fetch_array($exe_sql)) {
	//$pdf->Cell(1, 0.3, $resultado ['nch'], 1, 0, 'L');
	$pdf->Cell(6, 0.3, $resultado ['nome'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['tur'], 1, 0, 'L');
	//$pdf->Cell(1, 0.3, $resultado ['lmg'], 1, 0, 'L');
	$pdf->Cell(12, 0.3, $resultado ['mot'], 1, 1, 'L');
}
$pdf->Output();
?>

