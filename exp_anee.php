<?php
include 'conn.php';
define('FPDF_FONTPATH', 'fpdf/font');
require ('fpdf/fpdf.php');

//CABEÇALHO
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 0.5, 'GOVERNO DO DISTRITO FEDERAL', 0, 0.4, 'C');
//$pdf->MultiCell(92, 4, utf8_decode('Caracteristica'), 1, 1,'C');
$pdf->Cell(0, 0.5, utf8_decode('SECRETARIA DE ESTADO DE EDUCAÇÃO'), 0, 0.4, 'C');
$pdf->Cell(0, 0.5, utf8_decode('COORDENAÇÃO REGIONAL DE ENSINO DE CEILÂNDIA'), 0, 0.4, 'C');
$pdf->Cell(0, 0.5, utf8_decode('CENTRO EDUCACIONAL 06 DE CEILÂNDIA'), 0, 0.54, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 0.5,utf8_decode ('ESTUDANTES COM NECESSIDADES ESPECIAIS - 2016'), 0, 0.4, 'C');
$pdf->Image('Logo.jpg',1, 1,-260);
$pdf->Image('footer.jpg',1, 29,-160);
$pdf->Ln();
$sql="SELECT * FROM cadastroclientes WHERE ano=2016 && ano=2016/1 && ane LIKE '%s%'";
$conn =@mysql_connect("localhost", "root", "");
//if (!conn)die ("<h1>Falha na conexao</h1>");
$db = mysql_select_db("cadastroclientes");
$exe_sql=@mysql_query($sql)or die (mysql_error());

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(1, 0.3, 'CH', 1);
$pdf->Cell(5, 0.3, 'NOME', 1);
$pdf->Cell(2, 0.3, 'DT_NASCIMENTO', 1);
$pdf->Cell(1, 0.3, 'SERIE', 1);
$pdf->Cell(1, 0.3, 'TURNO', 1);
$pdf->Cell(1, 0.3, 'TURMA', 1);
$pdf->Cell(1, 0.3, 'ANEE', 1);
$pdf->Cell(7, 0.3, 'DESCRICAO', 1);
$pdf->Ln();

while ($resultado=mysql_fetch_array($exe_sql)) {
	$pdf->Cell(1, 0.3, $resultado ['nch'], 1, 0, 'L');
	$pdf->Cell(5, 0.3, $resultado ['nome'], 1, 0, 'L');
	$pdf->Cell(2, 0.3, $resultado ['dtn'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['sre'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['hor'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['tur'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['ane'], 1, 0, 'L');
	$pdf->Cell(7, 0.3, $resultado ['obs'], 1, 1, 'L');
}
$pdf->Output();
?>
