
<?php
include 'conn.php';
define('FPDF_FONTPATH', 'fpdf/font');
require ('fpdf/fpdf.php');
$pdf = new FPDF ('L', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 6);
 $pdf->Text(1,0.5,iconv('utf-8','iso-8859-1','Lista de Débito de Documentos - 2016'));
//$pdf->Cell (0, 0.3, 'Lista de Débito de Documentos - 2015', 0, 0.3, 'L');
//$pdf->Image('');
$result = mysql_query("SET NAMES utf8");
$sql="SELECT * FROM cadastroclientes WHERE fot !='' && cpi!='' && cpf1!='' && hesi!='' && hesf!='' && heem!='' && fiat!='' && cpf2!='' && hor!='NOT' && ano=2016 ORDER BY nome";
$conn = @mysql_connect("localhost", "root", "");

//if (!conn)die ("<h1>Falha na conexao</h1>");
$db = mysql_select_db("cadastroclientes");
$exe_sql=mysql_query($sql)or die (mysql_error());

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(0.8, 0.3, 'ANO', 1);
$pdf->Cell(1, 0.3, 'CODIGO', 1);
$pdf->Cell(0.5, 0.3, 'CH', 1);
$pdf->Cell(5.7, 0.3, 'NOME', 1);
$pdf->Cell(1, 0.3, 'TURNO', 1);
$pdf->Cell(1, 0.3, 'TURMA', 1);
$pdf->Cell(1, 0.3, 'FOTO', 1);
$pdf->Cell(1, 0.3, 'RG', 1);
$pdf->Cell(1, 0.3, 'CPF_1', 1);
$pdf->Cell(1, 0.3, 'HESI', 1);
$pdf->Cell(1, 0.3, 'HESF', 1);
$pdf->Cell(1, 0.3, 'HEEM', 1);
$pdf->Cell(1, 0.3, 'FIAT', 1);
$pdf->Cell(1, 0.3, 'CPF2', 1);
$pdf->Cell(1, 0.3, 'CAD', 1);
$pdf->Cell(1, 0.3, 'HIS', 1);
$pdf->Cell(1, 0.3, 'REM', 1);
$pdf->Cell(6, 0.3, 'OBS', 1);
$pdf->Ln();

while ($resultado=mysql_fetch_array($exe_sql)) {
	$pdf->Cell(0.8, 0.3, $resultado ['ano'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['codigo'], 1, 0, 'L');
	$pdf->Cell(0.5, 0.3, $resultado ['nch'], 1, 0, 'L');
	$pdf->Cell(5.7, 0.3, $resultado ['nome'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['hor'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['tur'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['fot'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['cpi'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['cpf1'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['hesi'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['hesf'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['heem'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['fiat'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['cpf2'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['cad'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['his'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['rem'], 1, 0, 'L');
	$pdf->Cell(6, 0.3, $resultado ['obs2'], 1, 1, 'L');
}
$pdf->Output();
?>

