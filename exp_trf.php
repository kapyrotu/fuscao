
<?php
include '/config/conn.php';
define('FPDF_FONTPATH', '/fpdf/font');
require ('/fpdf/fpdf.php');

//CABEÇALHO
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->Image('Logo.jpg',0.9, 0.9,-260);
$pdf->SetFont('Arial', '', 9.5);

$pdf->Cell(0, 0.4, 'GOVERNO DO DISTRITO FEDERAL', 0, 0.4, 'C');
//$pdf->MultiCell(92, 4, ('Caracteristica'), 1, 1,'C');
$pdf->Cell(0, 0.4, ('SECRETARIA DE ESTADO DE EDUCAÇÃO'), 0, 0.4, 'C');
$pdf->Cell(0, 0.4, ('COORDENAÇÃO REGIONAL DE ENSINO DE CEILÂNDIA'), 0, 0.4, 'C');
$pdf->Cell(0, 0.4, ('CENTRO EDUCACIONAL 06 DE CEILÂNDIA'), 0, 0.54, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 0.4, ('Lista de Movimentação - 2017'), 0, 0.4, 'C');
$pdf->Ln();
$result = mysql_query("");
$sql="SELECT * FROM cadastroclientes WHERE ano ='2017' AND sai!='-'";
$conn =@mysql_connect("localhost", "root", "");

//if (!conn)die ("<h1>Falha na conexao</h1>");
$db = mysql_select_db("cadastroclientes");
$exe_sql=mysql_query($sql)or die (mysql_error());

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(1, 0.3, 'CH', 1);
$pdf->Cell(5, 0.3, 'NOME', 1);
$pdf->Cell(1, 0.3, 'TURMA', 1);
$pdf->Cell(2, 0.3, 'ENTRADA', 1);
$pdf->Cell(2, 0.3, 'SAIDA',1);
$pdf->Cell(5, 0.3, 'OBSERVACOES',1);
$pdf->Ln();

while ($resultado=mysql_fetch_array($exe_sql)) {
	$pdf->Cell(1, 0.3, $resultado ['nch'], 1, 0, 'L');
	$pdf->Cell(5, 0.3, $resultado ['nome'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['tur'], 1, 0, 'L');
	$pdf->Cell(2, 0.3, $resultado ['ent'], 1, 0, 'L');
	$pdf->Cell(2, 0.3, $resultado ['sai'], 1, 0, 'L');
	$pdf->Cell(5, 0.3, $resultado ['obs'], 1, 1, 'L');

	

}

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(16,0.5,'Secretaria; ' .date('d/m/Y'),'B',0,'R'); 
$pdf->Output();


?>

