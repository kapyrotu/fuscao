<html>
<head>

	
	<script type="text/javascript">
				$(function(){
			$("div.easyui-layout").layout();
			$('#dg').edatagrid({
				pageList: [20,40,50],
				url: 'get_cadastroclientes.php',
				saveUrl: 'save_cadastroclientes.php',
				updateUrl: 'update_cadastroclientes.php',
				destroyUrl: 'destroy_cadastroclientes.php',
				fitColumns: true
			});	
	
		function saveItem(index){
        var row = $('#dg').datagrid('getRows')[index];
        var url = row.isNewRecord ? 'save_cadastroclientes.php' : 'update_cadastroclientes.php?id='+row.id;
        $('#dg').datagrid('getRowDetail',index).find('form').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(data){
                data = eval('('+data+')');
                data.isNewRecord = false;
                $('#dg').datagrid('collapseRow',index);
                $('#dg').datagrid('updateRow',{
                    index: index,
                    row: data
					$("#theTable").on("change", function() {
    alert("This person took the lead");
});
                });
            }
        });
    }
	</script>

	<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>FUSC&Atilde;O</title><div align="center">
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery.edatagrid.js"></script>
	<script type="text/javascript" src="js/datagrid-filter.js"></script>
	<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="js/easyui-lang-pt_BR.js"></script>
	<script type="text/javascript" src="js/animation.html"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
	
</head>

<body>
<style>
label {
  display: inline-block;
  width: 120px;
  text-align: right;
  #coluna-1 { width:30%; float:left; }
								#coluna-2 { width:30%; float:right; }
								#coluna-3 { width:30%; float:left; }
								.clearfix { clear:both; }
}​
</style>

        <form id="fm" method="post" action="update_cadastroclientes.php">
         <div style="margin-bottom:10px;font-size:12px;border-bottom:1px solid #ccc"><b><li>EDITAR CADASTRO:</li></b></div>
         <div style="margin-bottom:10px"style="width:700px;height:250px"></div>
		 
		 <td><input type="hidden" name="id"size="6" maxlength="6" >
		 <td><input type="hidden" name="ano"size="6" maxlength="6" >
		 <td><label>CHAMADA:</label></td>
         <td><input type="text" name="nch" size="5" maxlength="5">
         <td><label>CODIGO:</label></td>
         <td><input type="text" name="codigo" size="5" maxlength="5">
		 <td><label>NOME:</label></td>
		 <td><input type="hidden" name="hor"size="6" maxlength="6" >
		 <input type="text" name="nome" size="50" maxlength="50"></td>
		 <td><input type="hidden" name="res"size="6" maxlength="6" >
		 <td><label>DT NASCIMENTO:</label></td>
         <input type="text" name="dtn" size="10" maxlength="10"></td>
		 <td><label>NU IDENTIDADE:</label></td>
         <input type="text" name="nid" size="15" maxlength="15"></td>
		 <td><label>NU CPF:</label></td>
		 <input type="text" name="ncpf" size="15" maxlength="15"></td>
		 <td><label>DEP-1:</label></td>
         <input type="text" name="dep1" size="15" maxlength="15"></td>
		 <td><label>DEP-2:</label></td>
         <input type="text" name="dep2" size="15" maxlength="15"></td>
		 <p>
		 <div class="block">
    <label>Código</label>
    <input type="text" name="codigo"/>
</div>
<div class="block">
    <label>Turma</label>
    <input type="text" name="tur" />
</div>
<div class="block">
    <label>DT_NASC</label>
    <input type="text" name="dtn" />
</div>
		 <div style="margin-bottom:15px;font-size:12px;border-bottom:1px solid #ccc"></div>
		 <div style="margin-bottom:10px;font-size:12px;border-bottom:1px solid #ccc"><b><li>DOCUMENTOS APRESENTADOS:</li></b></div>
		 <td><input type="hidden" name="sre"size="6" maxlength="6" >
		 <td><input type="hidden" name="tur"size="6" maxlength="6" >
		 <td><input type="hidden" name="sex"size="6" maxlength="6" >
		 <td><input type="hidden" name="ane"size="6" maxlength="6" >
		 <td><input type="hidden" name="ent"size="6" maxlength="6" >
		 <td><input type="hidden" name="sai"size="6" maxlength="6" >
		 <td><input type="hidden" name="obs"size="6" maxlength="6" >
		
							<style>
								#coluna-1 { width:30%; float:left; }
								#coluna-2 { width:30%; float:right; }
								#coluna-3 { width:30%; float:left; }
								.clearfix { clear:both; }
							</style>

<div id="coluna-1">
</div>
<div id="coluna-2">
</div>
<div id="coluna-3">
</div>
<div class="clearfix"></div>
		
<div id="coluna-1">		

		<input type="checkbox" name="fot"value="SIM"size="6" maxlength="6" >Foto<br>
	    <input type="checkbox" name="cpi" value="SIM"size="6" maxlength="6">C&oacute;pia da Identidade<br>
        <input type="checkbox" name="cpf1" value="SIM"size="6" maxlength="6">C&oacute;pia do CPF do Estudante<br>
		<input type="checkbox" name="cpf2" value="SIM"size="6" maxlength="6">C&oacute;pia do CPF do Respon&aacute;vel<br></div>
		
<div id="coluna-2">		

		<input type="checkbox" name="cad" value="SIM"size="6" maxlength="6">Atualiza&ccedil;&atilde;o do Cadastro<br>
		<input type="hidden" name="his"value="SIM"size="6" maxlength="6">
	    <input type="checkbox" name="rem" value="SIM"size="6" maxlength="6">Renova&ccedil;&atilde;o de Matr&iacute;cula<br></div>
		
		
		<div id="coluna-3">	<input type="checkbox" name="hesi" value="SIM"size="6" maxlength="6">Hist&oacute;rico Escolar - S&eacute;ries Iniciais<br>
	    <input type="checkbox" name="hesf" value="SIM"size="6" maxlength="6">Hist&oacute;rico Escolar - S&eacute;ries Finais<br>
	    <input type="checkbox" name="heem" value="SIM"size="6" maxlength="6">Hist&oacute;rico Escolar do Ensino M&eacute;dio<br>
		<input type="checkbox" name="fiat" value="SIM"size="6" maxlength="6">Ficha Individual Cursando<br></div><br>
		
		<td><textarea name="obs2" cols="200" rows="2" > </textarea></td>
		
		<!--<input type="text" name="obs2" size="50" maxlength="50" name="obs2" value="obs2">Outras Observa&ccedil;&o&atilde;es<br>-->	
		<td><input type="hidden" name="frq"size="6" maxlength="6" >
		<td><input type="hidden" name="nul"size="6" maxlength="6" ><br>
		

		<input type="submit" name="submit" value="Salvar"/>
		<input type="button" value="Imprimir" onclick="javascript: location.href='./debito/busca.html';" />

</body>
</html>

<?php 

require_once 'conn.php';

$id = ''; 
if( isset( $_GET['id'])) {
    $id = $_GET['id']; 
} 
$sql = "update cadastroclientes set ano='$ano',nch='$nch',codigo='$codigo',nome='$nome',hor='$hor',res='$res',dtn='$dtn',sre='$sre',tur='$tur',sex='$sex',ane='$ane',ent='$ent',sai='$sai',obs='$obs',fot='$fot',cpi='$cpi',cpf1='$cpf1',hesi='$hesi',hesf='$hesf',heem='$heem',fiat='$fiat',cpf2='$cpf2',cad='$cad',his='$his',rem='$rem',obs2='$obs2' where id=$id";
$query = @$connect->query($sql);
$result = $query->fetch_assoc();
		     
			
$conn->close();

echo json_encode($result);

?>
