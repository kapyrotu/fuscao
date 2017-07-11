<?php


include 'conn.php';
// Obter acesso à classe PHPExcel
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
require_once 'Classes/PHPExcel.php';

/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "root"; // MySQL Username
$DB_Password = ""; // MySQL Password
$DB_DBName = "cadastroclientes"; // MySQL Database Name
//$DB_TBLName = "tablename"; // MySQL Table Name
$xls_filename = 'export_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
$sheet = new PHPExcel();
$activeSheet = $sheet->getActiveSheet();

// Create MySQL connection
//-------------------------------------------------------------------------------//
$result = mysql_query("SET NAMES utf8");
$sql="SELECT * FROM cadastroclientes WHERE ane LIKE '%s'";
$conn =mysql_connect("localhost", "root", "");
//if (!conn)die ("<h1>Falha na conexao</h1>");
$db = mysql_select_db("cadastroclientes");
$exe_sql=mysql_query($sql)or die (mysql_error());
//-------------------------------------------------------------------------------//

// Criamos uma tabela HTML com o formato da planilha para excel
$tabela = '<table border="1">';
$tabela .= '<tr>';
$tabela .= '<td colspan="2">Lista de Estudantes - ANEE</tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>CH</b></td>';
$tabela .= '<td><b>CÓDIGO</b></td>';
$tabela .= '<td><b>NOME</b></td>';
$tabela .= '<td><b>TURMA</b></td>';
$tabela .= '<td><b>ANEE</b></td>';
$tabela .= '<td><b>DESCRICAO</b></td>';
$tabela .= '</tr>';

// Puxando dados do Banco de dados

while ($dados=mysql_fetch_array($exe_sql)) 
{
$tabela .= '<tr>';
$tabela .= '<td>'.$dados['nch'].'</td>';
$tabela .= '<td>'.$dados['codigo'].'</td>';
$tabela .= '<td>'.$dados['nome'].'</td>';
$tabela .= '<td>'.$dados['tur'].'</td>';
$tabela .= '<td>'.$dados['ane'].'</td>';
$tabela .= '<td>'.$dados['obs'].'</td>';
$tabela .= '</tr>';
}

$tabela .= '</table>';

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
$arquivo = 'export.xls'.date('Y-m-d').'.xls';
// Força o Download do Arquivo Gerado
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel ');

header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");

echo $tabela;

?>