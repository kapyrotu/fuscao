 <?php
include 'conn.php';
define('FPDF_FONTPATH', 'fpdf/font');
require ('fpdf/fpdf.php');
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0, 0.3, 'FUSCAO - 2016', 0, 0.3, 'L');
//$pdf->Image('');
$busca = mysql_real_escape_string($_GET['$tur']);
$sql = "SELECT * FROM 'cadastroclientes' WHERE ('ano' = 2016) AND (('tur' LIKE '%".$busca."%'))";
// Executa a consulta
$query = mysql_query($sql);



$sql="SELECT * FROM cadastroclientes WHERE tur LIKE '$tur' ORDER BY nome";
$db = mysql_select_db("cadastroclientes");
$exe_sql=@mysql_query($sql)or die (mysql_error());

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1, 0.3, 'CH', 1);
$pdf->Cell(2, 0.3, 'COD', 1);
$pdf->Cell(8, 0.3, 'NOME', 1);
$pdf->Cell(2, 0.3, 'DT_NAS', 1);
$pdf->Cell(1, 0.3, 'TURMA', 1);
$pdf->Ln();

while ($resultado=mysql_fetch_array($exe_sql)) {
	$pdf->Cell(1, 0.3, $resultado ['nch'], 1, 0, 'L');
	$pdf->Cell(2, 0.3, $resultado ['codigo'], 1, 0, 'L');	
	$pdf->Cell(8, 0.3, $resultado ['nome'], 1, 0, 'L');
	$pdf->Cell(2, 0.3, $resultado ['dtn'], 1, 0, 'L');
	$pdf->Cell(1, 0.3, $resultado ['tur'], 1, 1, 'L');
	
}
$pdf->Output();
?>
