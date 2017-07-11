<?php session_start(); 
 
?>
 
<?php
if(!isset($_SESSION['usuario']) && (!isset($_SESSION['senha']))){	
header("Location: index.php");	
	}
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="favicon.png" type="image/png"> 
<title>FUSC&Atilde;O - 2016</title>
<style> 	<hr>
</style>
</head>
<body>
<?php
$secao_usuario = $_SESSION['usuario'];
$secao_senha   = $_SESSION['senha'];
?>
Ola! :<?php  echo $secao_usuario;   ?>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php
if(isset($_REQUEST['afin'])){	
	header("Location: afin/afin.php");	
	}
?>
<?php
if(isset($_REQUEST['carometro_2014'])){	
	header("Location: carometro_2014/carometro.php");	
	}
?>

<?php
if(isset($_REQUEST['carometro_2015'])){	
	header("Location: carometro_2015/carometro.php");	
	}
?>

<?php
if(isset($_REQUEST['carometro_2016'])){	
	header("Location: carometro_2016/carometro.php");	
	}
?>

<?php
if(isset($_REQUEST['debito'])){	
	header("Location: debito/debito.php");	
	}
?>

<?php
if(isset($_REQUEST['passivo'])){	
	header("Location: passivo/passivo.php");	
	}
?>

<?php
if(isset($_REQUEST['transferencias'])){	
	header("Location: transferencias/transferencias.php");	
	}
?>



<?php
if(isset($_REQUEST['sair'])){	
	session_destroy();
	header("Location: index.php");	
	}
?>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "www.w3.org/TR/html4/loose.dtd">
<html>
<head>
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
	<script type="text/javascript">
		$(function(){
			$("div.easyui-layout").layout();
			$('#dg').edatagrid({
				url: 'get_cadastroclientes.php',
				saveUrl: 'save_cadastroclientes.php',
				updateUrl: 'update_cadastroclientes.php',
				destroyUrl: 'destroy_cadastroclientes.php',
				fitColumns: true
			});
			var dg = $('#dg');
			dg.edatagrid();    // create datagrid
			dg.edatagrid('enableFilter');    // enable filter
			dg.edatagrid('reload');    // enable filter
		});
				    
        function progress(){
            var win = $.messager.progress({
                title:'SALVAR',
                msg:'Salvando o Registro, aguarde...'
            });
            setTimeout(function(){
                $.messager.progress('close');
            },1000)
        }
				
	</script>
	
</head>
<body>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->
    <h2></h2>
    <p></p>
    <div style="margin:20px 0;"></div>
    <div class="easyui-panel" style="padding:5px;">
        <a href="admin.php" class="easyui-splitbutton" data-options="menu:'#mm0',iconCls:'icon-slider'">Home</a>
	 <a href="#" class="easyui-splitbutton" data-options="menu:'#mm2',iconCls:'icon-crmt'">Car&ocirc;metro</a>
        <a href="#" class="easyui-splitbutton" data-options="menu:'#mm1',iconCls:'icon-edit'">Editar</a>
	 <a href="#" class="easyui-splitbutton" data-options="menu:'#mm3',iconCls:'icon-search'">Consultar</a>
        <a href="#" class="easyui-menubutton" data-options="menu:'#mm4',iconCls:'icon-printer'">Relat&oacute;rios</a>
	 <a href="#" class="easyui-menubutton" data-options="menu:'#mm5',iconCls:'icon-help'">Ajuda</a>
    </div>
	 <div id="mm0" style="width:120px;">
        <div class="menu-sep"></div>
        <div>Cut</div>
        <div>Copy</div>
        <div>Paste</div>
		<div>Delete</div>
		<div>Address</div>
        <div>Link</div>
        <div>Navigation</div>
        <div>Bookmark</div>
		<div href="?sair"data-toggle="tooltip" title="Sair do Fusc&atilde;o" iconCls="icon-exit">Sair</div>
     	</div>
		
    <div id="mm1" style="width:150px;">
        <div href="#" data-toggle="tooltip" title="Inclui novo Registro!!" iconCls=" icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Novo</div>
        <div href="#" data-toggle="tooltip" title="Remove o registro selecionado!!" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Remover</div>
		<div href="#" data-toggle="tooltip" title="Salvar alterações no registro!!"iconCls="icon-save" plain="true" onclick="progress();location.reload(true);javascript:$('#dg').edatagrid('saveRow')">Salvar</div>
        <div class="menu-sep"></div>
    </div>
	
    <div id="mm2" style="width:120px;">
		<div href="?carometro_2014" data-toggle="tooltip" title="Fotos dos estudantes - 2014"data-options="iconCls:'icon-crmt'">2014</div>
        <div href="?carometro_2015" data-toggle="tooltip" title="Fotos dos estudantes - 2015"data-options="iconCls:'icon-crmt'">2015</div>
        <div href="?carometro_2016" data-toggle="tooltip" title="Fotos dos estudantes - 2016"data-options="iconCls:'icon-crmt'">2016</div>
	</div>
	
	 <div id="mm3" style="width:120px;">
        <div href="?afin" data-toggle="tooltip" title="Consulta ATAS DE RESULTADOS FINAIS!!"data-options="iconCls:'icon-pdf'">Afin</div>
        <div href="?debito" data-toggle="tooltip" title="Controle de Documentos Não Apresentados!!"data-options="iconCls:'icon-pen'">D&eacute;bito</div>
		<div href="?passivo" data-toggle="tooltip" title="Consulta Estudantes no Arquivo Passivo!!" data-options="iconCls:'icon-box'">Passivo</div>
		<div href="?transferencias" data-toggle="tooltip" title="Controle de Transferências / Históricos / Certificados!!" data-options="iconCls:'icon-trf'">Transferências</div>
	</div>
		
    <div id="mm4" style="width:150px;">
		<div href="exp_anee.php" data-toggle="tooltip" title="Imprimir registros de Estudantes com Necessidades Especiais." iconCls="icon-printer">Anee</div>
		<div href="exp_deb.php" data-toggle="tooltip" title="Imprimir registros de documentos apresentados e em débito." iconCls="icon-printer">D&eacute;bito</div>
		<div href="exp_fus.php" data-toggle="tooltip" title="Imprimir registros de Estudantes matriculados por turma." iconCls="icon-printer">Fusc&atilde;o</div>
		<div href="exp_nov.php" data-toggle="tooltip" title="Imprimir registros de Estudantes Novos." iconCls="icon-printer">Novos</div>
		<div href="exp_trf.php" data-toggle="tooltip" title="Imprimir registros de Estudantes Cancelados e Transferidos." iconCls="icon-printer">Movimentação</div>
 	</div>
	<div id="mm5" style="width:150px;">
        <div class="menu-sep"></div>
        <div>
            <span>Sobre</span>
            <div>
                <div>Address</div>
                <div>Link</div>
                <div>Navigation Toolbar</div>
                <div>Bookmark Toolbar</div>
                <div class="menu-sep"></div>
                <div>New Toolbar...</div>
            </div>
         </div>
    </div>
<!--[-------------------------------------------------------------------------------------------------------------------------------------------------------]-->
	<table id="dg" title="CED 06 - FUSCÃO - 2016" style="width:auto;height:auto; border:1px solid #ccc;" ', '
			toolbar="#toolbar" pagination="true" idField="id"
			rownumbers="true" fitColumns="true" resizable="true"><div align="center">
		<thead>
			<tr>
				<th field="ano" width="15" editor="{type:'validatebox',options:{required:false}}">ANO</th>
				<th field="nch" width="12" editor="{type:'validatebox',options:{required:false}}">CH</th>
				<th field="codigo" width="24" editor="{type:'validatebox',options:{required:true}}">CÓDIGO</th>
				<th field="nome" width="120" editor="{type:'validatebox',options:{required:true}}">NOME</th>
				<th field="hor" width="14" editor="{type:'validatebox',options:{required:true}}">TURNO</th>
				<th field="res" width="10" editor="{type:'validatebox',options:{required:false}}">FIN</th>
				<th field="dtn" width="28" editor="{type:'validatebox',options:{required:false}}">DT. NASC.</th>
				<th field="sre" width="12" editor="{type:'validatebox',options:{required:false}}">SÉRIE</th>
				<th field="tur" width="14" editor="{type:'validatebox',options:{required:false}}">TURMA</th>
				<th field="sex" width="12" editor="{type:'validatebox',options:{required:false}}">SEXO</th>
				<th field="ane" width="12" editor="{type:'validatebox',options:{required:false}}">ANEE</th>
				<th field="ent" width="30" class="easyui-datebox"editor="{type:'datebox',options:{required:false}}">ENTRADA</th>
				<th field="sai" width="30" class="easyui-datebox"editor="{type:'datebox',options:{required:false}}">SAÍDA</th>
				<th field="obs" width="100" editor="{type:'validatebox',options:{required:false}}">OBSERVAÇÕES</th>
				<!--<th field="bim" width="100" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">BIMESTRE</th>-->
				<!--<th field="fot" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">FOTO</th>-->
				<!--<th field="cpi" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">RG</th>-->
				<!--<th field="cpf1" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">CPF1</th>V
				<!--<th field="hesi" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">HESI</th>V
				<!--<th field="hesf" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">HESF</th>-->
				<!--<th field="heem" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">HEEM</th>-->
				<!--<th field="fiat" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">FIAT</th>-->
				<!--<th field="cpf2" width="50" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">CPF2</th>
				<th field="cad" width="30" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">CAD</th>
				<th field="his" width="30" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">HIS</th>
				<th field="rem" width="30" align="center" editor="{type:'checkbox',options:{on:'SIM',off:'NAO'}}">REM</th>
				<th field="obs" width="100" editor="{type:'validatebox',options:{required:false}}">OBSERVAÇÕES</th>-->
			</tr>
		</thead>
	</table>
	
	<div id="toolbar">
<!--<div id="dd" class="easyui-dialog" style="padding:5px;width:400px;height:200px;"
        <!--title="My Dialog" iconCls="icon-ok"
        toolbar="#dlg-toolbar" buttons="#dlg-buttons">
    Dialog Content.
</div>
<div id="dlg-toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:alert('Add')">Add</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:alert('Save')">Save</a>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="javascript:alert('Ok')">Ok</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dd').dialog('close')">Cancel</a>
</div> --><!--
		<a href="#" class="easyui-linkbutton" data-toggle="tooltip" title="Inclui novo Registro!!" iconCls=" icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">NOVO</a>
		<a href="#" class="easyui-linkbutton" data-toggle="tooltip" title="Remove o registro selecionado!!" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">REMOVER</a>
		<a href="#" class="easyui-linkbutton" data-toggle="tooltip" title="Salvar alterações no registro!!"iconCls="icon-save" plain="true" onclick="progress();javascript:$('#dg').edatagrid('saveRow')">SALVAR</a>
		<!--<a href="#" class="easyui-linkbutton" data-toggle="tooltip" title="Cancelar!!"iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">CANCELAR</a>
		<a href="?atestado"class="easyui-linkbutton" data-toggle="tooltip" title="Lançamento de Atestados e Licenças Médicas!!"iconCls="icon-edit">: ATESTADO :</a>
		<a href="?debito"class="easyui-linkbutton" data-toggle="tooltip" title="Controle de Documentos Não Apresentados!!" iconCls="icon-edit">: DEBITO :</a>
		<a href="?carometro"class="easyui-linkbutton" data-toggle="tooltip" title="Fotos dos Estudantes por Turma!!"iconCls="icon-pen">: CAROMETRO :</a>
		<a href="?passivo"class="easyui-linkbutton" data-toggle="tooltip" title="Consulta Estudantes no Arquivo Passivo!!"iconCls="icon-box">: PASSIVO :</a>
		<a href="?afin"class="easyui-linkbutton" data-toggle="tooltip" title="Consulta ATAS DE RESULTADOS FINAIS!!"iconCls="icon-pdf">: AFIN :</a>
		<a href="?transferencias"class="easyui-linkbutton" data-toggle="tooltip" title="Controle de Transferências / Históricos / Certificados!!"iconCls="icon-trf">: TRANSFERÊNCIAS:</a>
		<a href="?eja"class="easyui-linkbutton" data-toggle="tooltip" title="FUSCÃO NOTURNO - EJA!!"iconCls="icon-trf">: NOTURNO - EJA:</a>-->
		
	<!--</div>
	<div style="margin:10px 40px;"></div>
	<div class="easyui-panel" style="padding:12px;">
	</div>
<br>
		<a href=exp_anee.php class="easyui-linkbutton" data-toggle="tooltip" title="Imprimir registros de Estudantes com Necessidades Especiais!!" iconCls="icon-printer" >ANEE</a>
		<!--<a href=exp_atm.php class="easyui-linkbutton" data-toggle="tooltip" title="Imprimir registros de Estudantes com Licenças e Atestados Médicos!!" iconCls="icon-printer" >ATESTADOS</a>
		<a href=exp_fus.php class="easyui-linkbutton" data-toggle="tooltip" title="Imprimir registros de Estudantes matriculados por turma!!"iconCls="icon-printer" >FUSCÃO</a>
		<a href=exp_nov.php class="easyui-linkbutton" data-toggle="tooltip" title="Imprimir registros de Estudantes Novos!!"iconCls="icon-printer" >NOVOS</a>
		<a href=exp_trf.php class="easyui-linkbutton" data-toggle="tooltip" title="Imprimir registros de Estudantes Cancelados e Transferidos!!"iconCls="icon-printer" >TRANSFERIDOS</a>
		<a href="?sair"class="easyui-linkbutton" iconCls="icon-ok">SAIR</a>-->
		
</body>
</html>