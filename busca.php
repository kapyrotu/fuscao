<?php
$hostdb = "localhost";// Geralmente Localhost
$userdb = "root";//usuário do seu banco de dados
$passdb = "";// senha do banco de dados
$tabledb = "cadastroclientes";// tabela do banco de dados

$conecta = @mysql_connect($hostdb, $userdb, $passdb) or die (mysql_error());
@mysql_select_db($tabledb, $conecta) or die ("Erro ao conectar com o banco de dados");

$busca = $_POST['palavra'];// palavra que o usuario digitou
$nome = $_POST['nome']; //categoria que o usuario deseja

$busca_query = mysql_query("SELECT * FROM cadastroclientes WHERE nome LIKE '%$busca%' AND nome = '$nome'")or die(mysql_error());//faz a busca com as palavras enviadas

if (empty($busca_query)) { //Se nao achar nada, lança essa mensagem
    echo "Nenhum registro encontrado.";
}

// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($busca_query)) {
    echo "Id do Produto: $dados[id]<br />"; 
    echo "Nome do Produto: $dados[nome]<br />";
    echo "Preço do Produto: $dados[codigo] Reais<br />";
    echo "Categoria do Produto: $dados[turma]<br />";
    echo "<hr>";
}
?>