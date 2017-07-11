<?php
include 'conn.php';

$dataNascimento = "dtn"; // A data de nascimento da pessoa OBS: se não for neste formato a idade final terá 1 ano a mais que o real
$quebra_nascimento = explode("/",$dataNascimento); //Quebra a string que contém a data de nascimento em um array, cada campo do array com um valor diferente da data de nascimento para podermos trabalhar com os valores separados agora:
$time_nascimento = mktime(0,0,0,$quebra_nascimento[1],$quebra_nascimento[2],$quebra_nascimento[0]); //Calcula o timestamp do nascimento da pessoa no horário de Meia Noite
$agora = time();
$timestamp_idade = $agora - $time_nascimento;
//Vale lembrar que no timestamp um valor de 86400 é igual a 24 horas, um dia completo

$idade = floor((($timestamp_idade / 86400) / 30) / 12); //Calcula a idade arredondando para baixo: divide o timestamp gerado por 86400 para achar a quantidade de dias, então divide por 30 para achar a quantidade de meses, depois divide por 12 para achar a quantidade de anos
echo $idade;
?>