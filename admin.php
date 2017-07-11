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

<link rel="shortcut icon" href="favicon.png" type="image/png"> 
<title>FUSC&Atilde;O - 2017</title>
<style> 	<hr>
</style>
</head>
<body>
<?php
$secao_usuario = $_SESSION['usuario'];
$secao_senha   = $_SESSION['senha'];
?>
Ola! :<?php  echo $secao_usuario;   ?>

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
if(isset($_REQUEST['carometro_2017'])){	
	header("Location: carometro_2017/carometro.php");	
	}
?>


<?php
if(isset($_REQUEST['dependencia'])){	
	header("Location: dependencia/dependencia.php");	
	}
?>

<?php
if(isset($_REQUEST['eja'])){	
	header("Location: eja/eja.php");	
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
	
	<title>FUSCÃO</title><div align="center">
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery.edatagrid.js"></script>
	<script type="text/javascript" src="js/datagrid-filter.js"></script>
	<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="js/easyui-lang-pt_BR.js"></script>
	<script type="text/javascript" src="js/datagrid-detailview.js"></script>
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
			
			$(function(){
            $('#dg').datagrid({
                view: detailview,
                detailFormatter:function(index,row){
					return '<div class="ddv"></div>';
                },
                onExpandRow: function(index,row){
                    var ddv = $(this).datagrid('getRowDetail',index).find('div.ddv');
                    ddv.panel({
                        border:true,
                        cache:true,
                        href:'getSelected.php?index='+index,
                        onLoad:function(){
                            $('#dg').datagrid('fixDetailRowHeight',index);
                            $('#dg').datagrid('selectRow',index);
                            $('#dg').datagrid('getRowDetail',index).find('form').form('load',row);
							$('#dg').datagrid('resize');
							$('#toolbar').panel('resize');
                        }
                    });
                    $('#dg').datagrid('fixDetailRowHeight',index);
                }
            });
        });
   
			
			function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = 'update_cadastroclientes.php?id='+row.id;
				
            }
        }
			
			$(function(){
            var dg = $('#dg').datagrid();
            dg.datagrid('enableFilter', [{
                
            },{
                field:'unitcost',
                type:'numberbox',
                options:{precision:1},
                op:['equal','notequal','less','greater']
            }
            ]);
        });
		});
				    
        function progress(){
            var win = $.messager.progress({
                title:'SALVAR',
                msg:'Salvando o Registro, aguarde...'
            });
            setTimeout(function(){
                $.messager.progress('close');
            },100)
        }
			$.fn.datebox.defaults.formatter = function(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
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
        <div href="?carometro_2017" data-toggle="tooltip" title="Fotos dos estudantes - 2017"data-options="iconCls:'icon-crmt'">2017</div>
	</div>
	
	 <div id="mm3" style="width:120px;">
        <div href="?afin" data-toggle="tooltip" title="Consulta ATAS DE RESULTADOS FINAIS!!"data-options="iconCls:'icon-pdf'">Afin</div>
		<!--<div href="?debito" data-toggle="tooltip" title="Controle de Documentos Não Apresentados!!"data-options="iconCls:'icon-pen'">D&eacute;bito</div>-->
		<div href="?dependencia" data-toggle="tooltip" title="Controle de Dependências!!"data-options="iconCls:'icon-pen'">Dependências</div>
		<div href="?eja" data-toggle="tooltip" title="Controle Estudantes - NOTURNO!"data-options="iconCls:'icon-red'">EJA</div>
		<div href="?passivo" data-toggle="tooltip" title="Consulta Estudantes no Arquivo Passivo!!" data-options="iconCls:'icon-box'">Passivo</div>
		<div href="?transferencias" data-toggle="tooltip" title="Controle de Transferências / Históricos / Certificados!!" data-options="iconCls:'icon-trf'">Transferências</div>
	</div>
		
    <div id="mm4" style="width:150px;">
		<div href="exp_anee.php" data-toggle="tooltip" title="Imprimir registros de Estudantes com Necessidades Especiais." >Anee</div>
		<div class="menu-sep"></div>
		
		<div>
            	<span>Chamada: VESP</span>
       			<div>			
			    <div href="chamada/c.php" data-toggle="tooltip" title="Chamada Provisória - 1A."data-options="iconCls:'icon-yell'">1A</div>
				<div href="chamada/1B.php" data-toggle="tooltip" title="Chamada Provisória - 1B."data-options="iconCls:'icon-yell'">1B</div>
				<div href="chamada/1C.php" data-toggle="tooltip" title="Chamada Provisória - 1C."data-options="iconCls:'icon-yell'">1C</div>
				<div href="chamada/1D.php" data-toggle="tooltip" title="Chamada Provisória - 1D."data-options="iconCls:'icon-yell'">1D</div>
				<div href="chamada/1E.php" data-toggle="tooltip" title="Chamada Provisória - 1E."data-options="iconCls:'icon-yell'">1E</div>
				<div href="chamada/1F.php" data-toggle="tooltip" title="Chamada Provisória - 1F."data-options="iconCls:'icon-yell'">1F</div>
				<div href="chamada/1G.php" data-toggle="tooltip" title="Chamada Provisória - 1G."data-options="iconCls:'icon-yell'">1G</div>
				<div href="chamada/1H.php" data-toggle="tooltip" title="Chamada Provisória - 1H."data-options="iconCls:'icon-yell'">1H</div>
				<div href="chamada/1I.php" data-toggle="tooltip" title="Chamada Provisória - 1I."data-options="iconCls:'icon-yell'">1I</div>
				<div href="chamada/1J.php" data-toggle="tooltip" title="Chamada Provisória - 1J."data-options="iconCls:'icon-yell'">1J</div>
				<div href="chamada/1K.php" data-toggle="tooltip" title="Chamada Provisória - 1K."data-options="iconCls:'icon-yell'">1K</div>
				<div href="chamada/1L.php" data-toggle="tooltip" title="Chamada Provisória - 1L."data-options="iconCls:'icon-yell'">1L</div>
				<div href="chamada/2J.php" data-toggle="tooltip" title="Chamada Provisória - 2J."data-options="iconCls:'icon-yell'">2J</div>
				<div href="chamada/2K.php" data-toggle="tooltip" title="Chamada Provisória - 2K."data-options="iconCls:'icon-yell'">2K</div>
				<div href="chamada/2L.php" data-toggle="tooltip" title="Chamada Provisória - 2L."data-options="iconCls:'icon-yell'">2L</div>
				<div href="chamada/2M.php" data-toggle="tooltip" title="Chamada Provisória - 2M."data-options="iconCls:'icon-yell'">2M</div>
       			</div>
        		</div>
		 
				<div>
				<span>Chamada: MAT</span>
				<div>
				<div href="chamada/2A.php" data-toggle="tooltip" title="Chamada Provisória - 2A."data-options="iconCls:'icon-gren'">2A</div>
				<div href="chamada/2B.php" data-toggle="tooltip" title="Chamada Provisória - 2B."data-options="iconCls:'icon-gren'">2B</div>
				<div href="chamada/2C.php" data-toggle="tooltip" title="Chamada Provisória - 2C."data-options="iconCls:'icon-gren'">2C</div>
				<div href="chamada/2D.php" data-toggle="tooltip" title="Chamada Provisória - 2D."data-options="iconCls:'icon-gren'">2D</div>
				<div href="chamada/2E.php" data-toggle="tooltip" title="Chamada Provisória - 2E."data-options="iconCls:'icon-gren'">2E</div>
				<div href="chamada/2F.php" data-toggle="tooltip" title="Chamada Provisória - 2F."data-options="iconCls:'icon-gren'">2F</div>
				<div href="chamada/2G.php" data-toggle="tooltip" title="Chamada Provisória - 2G."data-options="iconCls:'icon-gren'">2G</div>
				<div href="chamada/2H.php" data-toggle="tooltip" title="Chamada Provisória - 2H."data-options="iconCls:'icon-gren'">2H</div>
				<div href="chamada/2I.php" data-toggle="tooltip" title="Chamada Provisória - 2I."data-options="iconCls:'icon-gren'">2I</div>
				<div href="chamada/3A.php" data-toggle="tooltip" title="Chamada Provisória - 3A."data-options="iconCls:'icon-gren'">3A</div>
				<div href="chamada/3B.php" data-toggle="tooltip" title="Chamada Provisória - 3B."data-options="iconCls:'icon-gren'">3B</div>
				<div href="chamada/3C.php" data-toggle="tooltip" title="Chamada Provisória - 3C."data-options="iconCls:'icon-gren'">3C</div>
				<div href="chamada/3D.php" data-toggle="tooltip" title="Chamada Provisória - 3D."data-options="iconCls:'icon-gren'">3D</div>
				<div href="chamada/3E.php" data-toggle="tooltip" title="Chamada Provisória - 3E."data-options="iconCls:'icon-gren'">3E</div>
				<div href="chamada/3F.php" data-toggle="tooltip" title="Chamada Provisória - 3F."data-options="iconCls:'icon-gren'">3F</div>
				<div href="chamada/3G.php" data-toggle="tooltip" title="Chamada Provisória - 3G."data-options="iconCls:'icon-gren'">3G</div>
				</div>
				</div>

		<div class="menu-sep"></div>
		
        <div>
            <span>Fuscão: VESP</span>
        <div>			
			    <div href="list/1A.php" data-toggle="tooltip" title="Lista de estudantes - 1A."data-options="iconCls:'icon-yell'">1A</div>
				<div href="list/1B.php" data-toggle="tooltip" title="Lista de estudantes - 1B."data-options="iconCls:'icon-yell'">1B</div>
				<div href="list/1C.php" data-toggle="tooltip" title="Lista de estudantes - 1C."data-options="iconCls:'icon-yell'">1C</div>
				<div href="list/1D.php" data-toggle="tooltip" title="Lista de estudantes - 1D."data-options="iconCls:'icon-yell'">1D</div>
				<div href="list/1E.php" data-toggle="tooltip" title="Lista de estudantes - 1E."data-options="iconCls:'icon-yell'">1E</div>
				<div href="list/1F.php" data-toggle="tooltip" title="Lista de estudantes - 1F."data-options="iconCls:'icon-yell'">1F</div>
				<div href="list/1G.php" data-toggle="tooltip" title="Lista de estudantes - 1G."data-options="iconCls:'icon-yell'">1G</div>
				<div href="list/1H.php" data-toggle="tooltip" title="Lista de estudantes - 1H."data-options="iconCls:'icon-yell'">1H</div>
				<div href="list/1I.php" data-toggle="tooltip" title="Lista de estudantes - 1I."data-options="iconCls:'icon-yell'">1I</div>
				<div href="list/1J.php" data-toggle="tooltip" title="Lista de estudantes - 1J."data-options="iconCls:'icon-yell'">1J</div>
				<div href="list/1K.php" data-toggle="tooltip" title="Lista de estudantes - 1K."data-options="iconCls:'icon-yell'">1K</div>
				<div href="list/1L.php" data-toggle="tooltip" title="Lista de estudantes - 1L."data-options="iconCls:'icon-yell'">1L</div>
				<div href="list/2J.php" data-toggle="tooltip" title="Lista de estudantes - 2J."data-options="iconCls:'icon-yell'">2J</div>
				<div href="list/2K.php" data-toggle="tooltip" title="Lista de estudantes - 2K."data-options="iconCls:'icon-yell'">2K</div>
				<div href="list/2L.php" data-toggle="tooltip" title="Lista de estudantes - 2L."data-options="iconCls:'icon-yell'">2L</div>
				<div href="list/2M.php" data-toggle="tooltip" title="Lista de estudantes - 2M."data-options="iconCls:'icon-yell'">2M</div>
         </div>
         </div>
		 
				<div>
				<span>Fuscão: MAT</span>
				<div>
				<div href="list/2A.php" data-toggle="tooltip" title="Lista de estudantes - 2A."data-options="iconCls:'icon-gren'">2A</div>
				<div href="list/2B.php" data-toggle="tooltip" title="Lista de estudantes - 2B."data-options="iconCls:'icon-gren'">2B</div>
				<div href="list/2C.php" data-toggle="tooltip" title="Lista de estudantes - 2C."data-options="iconCls:'icon-gren'">2C</div>
				<div href="list/2D.php" data-toggle="tooltip" title="Lista de estudantes - 2D."data-options="iconCls:'icon-gren'">2D</div>
				<div href="list/2E.php" data-toggle="tooltip" title="Lista de estudantes - 2E."data-options="iconCls:'icon-gren'">2E</div>
				<div href="list/2F.php" data-toggle="tooltip" title="Lista de estudantes - 2F."data-options="iconCls:'icon-gren'">2F</div>
				<div href="list/2G.php" data-toggle="tooltip" title="Lista de estudantes - 2G."data-options="iconCls:'icon-gren'">2G</div>
				<div href="list/2H.php" data-toggle="tooltip" title="Lista de estudantes - 2H."data-options="iconCls:'icon-gren'">2H</div>
				<div href="list/2I.php" data-toggle="tooltip" title="Lista de estudantes - 2I."data-options="iconCls:'icon-gren'">2I</div>
				<div href="list/3A.php" data-toggle="tooltip" title="Lista de estudantes - 3A."data-options="iconCls:'icon-gren'">3A</div>
				<div href="list/3B.php" data-toggle="tooltip" title="Lista de estudantes - 3B."data-options="iconCls:'icon-gren'">3B</div>
				<div href="list/3C.php" data-toggle="tooltip" title="Lista de estudantes - 3C."data-options="iconCls:'icon-gren'">3C</div>
				<div href="list/3D.php" data-toggle="tooltip" title="Lista de estudantes - 3D."data-options="iconCls:'icon-gren'">3D</div>
				<div href="list/3E.php" data-toggle="tooltip" title="Lista de estudantes - 3E."data-options="iconCls:'icon-gren'">3E</div>
				<div href="list/3F.php" data-toggle="tooltip" title="Lista de estudantes - 3F."data-options="iconCls:'icon-gren'">3F</div>
				<div href="list/3G.php" data-toggle="tooltip" title="Lista de estudantes - 3G."data-options="iconCls:'icon-gren'">3G</div>
				</div>
				</div>
				
				<div>
				<span>Fuscão: LISTA</span>
				<div>
				<div href="list/ALL.php" data-toggle="tooltip" title="Fuscão - 2017.">GERAL</div>
				</div>
				</div>
				<div class="menu-sep"></div>
		<div href="trf/exp_nov.php" data-toggle="tooltip" title="Imprimir registros de Estudantes Novos." >Novos</div>
		<div href="trf/exp_trf.php" data-toggle="tooltip" title="Imprimir registros de Estudantes Cancelados e Transferidos." >Movimentação</div>

		 <div class="menu-sep"></div>
        
		<div>
            <span>Débito: VESP</span>
            <div>			
			    <div href="debito/1A.php" data-toggle="tooltip" title="Lista de débito - 1A."data-options="iconCls:'icon-yell'">1A</div>
				<div href="debito/1B.php" data-toggle="tooltip" title="Lista de débito - 1B."data-options="iconCls:'icon-yell'">1B</div>
				<div href="debito/1C.php" data-toggle="tooltip" title="Lista de débito - 1C."data-options="iconCls:'icon-yell'">1C</div>
				<div href="debito/1D.php" data-toggle="tooltip" title="Lista de débito - 1D."data-options="iconCls:'icon-yell'">1D</div>
				<div href="debito/1E.php" data-toggle="tooltip" title="Lista de débito - 1E."data-options="iconCls:'icon-yell'">1E</div>
				<div href="debito/1F.php" data-toggle="tooltip" title="Lista de débito - 1F."data-options="iconCls:'icon-yell'">1F</div>
				<div href="debito/1G.php" data-toggle="tooltip" title="Lista de débito - 1G."data-options="iconCls:'icon-yell'">1G</div>
				<div href="debito/1H.php" data-toggle="tooltip" title="Lista de débito - 1H."data-options="iconCls:'icon-yell'">1H</div>
				<div href="debito/1I.php" data-toggle="tooltip" title="Lista de débito - 1I."data-options="iconCls:'icon-yell'">1I</div>
				<div href="debito/1J.php" data-toggle="tooltip" title="Lista de débito - 1J."data-options="iconCls:'icon-yell'">1J</div>
				<div href="debito/1K.php" data-toggle="tooltip" title="Lista de débito - 1K."data-options="iconCls:'icon-yell'">1K</div>
				<div href="debito/1L.php" data-toggle="tooltip" title="Lista de débito - 1L."data-options="iconCls:'icon-yell'">1L</div>
				<div href="debito/2J.php" data-toggle="tooltip" title="Lista de débito - 2J."data-options="iconCls:'icon-yell'">2J</div>
				<div href="debito/2K.php" data-toggle="tooltip" title="Lista de débito - 2K."data-options="iconCls:'icon-yell'">2K</div>
				<div href="debito/2L.php" data-toggle="tooltip" title="Lista de débito - 2L."data-options="iconCls:'icon-yell'">2L</div>
				<div href="debito/2M.php" data-toggle="tooltip" title="Lista de débito - 2M."data-options="iconCls:'icon-yell'">2M</div>
            </div>
		</div>
			
		<div>
            <span>Débito: MAT</span>
            <div>
				<div href="debito/2A.php" data-toggle="tooltip" title="Lista de débito - 2A."data-options="iconCls:'icon-gren'">2A</div>
				<div href="debito/2B.php" data-toggle="tooltip" title="Lista de débito - 2B."data-options="iconCls:'icon-gren'">2B</div>
				<div href="debito/2C.php" data-toggle="tooltip" title="Lista de débito - 2C."data-options="iconCls:'icon-gren'">2C</div>
				<div href="debito/2D.php" data-toggle="tooltip" title="Lista de débito - 2D."data-options="iconCls:'icon-gren'">2D</div>
				<div href="debito/2E.php" data-toggle="tooltip" title="Lista de débito - 2E."data-options="iconCls:'icon-gren'">2E</div>
				<div href="debito/2F.php" data-toggle="tooltip" title="Lista de débito - 2F."data-options="iconCls:'icon-gren'">2F</div>
				<div href="debito/2G.php" data-toggle="tooltip" title="Lista de débito - 2G."data-options="iconCls:'icon-gren'">2G</div>
				<div href="debito/2H.php" data-toggle="tooltip" title="Lista de débito - 2H."data-options="iconCls:'icon-gren'">2H</div>
				<div href="debito/2I.php" data-toggle="tooltip" title="Lista de débito - 2I."data-options="iconCls:'icon-gren'">2I</div>
				<div href="debito/3A.php" data-toggle="tooltip" title="Lista de débito - 3A."data-options="iconCls:'icon-gren'">3A</div>
				<div href="debito/3B.php" data-toggle="tooltip" title="Lista de débito - 3B."data-options="iconCls:'icon-gren'">3B</div>
				<div href="debito/3C.php" data-toggle="tooltip" title="Lista de débito - 3C."data-options="iconCls:'icon-gren'">3C</div>
				<div href="debito/3D.php" data-toggle="tooltip" title="Lista de débito - 3D."data-options="iconCls:'icon-gren'">3D</div>
				<div href="debito/3E.php" data-toggle="tooltip" title="Lista de débito - 3E."data-options="iconCls:'icon-gren'">3E</div>
				<div href="debito/3F.php" data-toggle="tooltip" title="Lista de débito - 3F."data-options="iconCls:'icon-gren'">3F</div>
				<div href="debito/3G.php" data-toggle="tooltip" title="Lista de débito - 3G."data-options="iconCls:'icon-gren'">3G</div>
             </div>
		</div>
		<div>
				<span>Débito: ESTUDANTE</span>
				<div>
				<div href="debito/busca.html" data-toggle="tooltip" title="Débito - 2017.">Aluno</div>
				</div>
		</div>
				<div class="menu-sep"></div>
		<div>	        
        <span>Assinatura: VESP</span>
				<div>			
			    <div href="sig/1A.php" data-toggle="tooltip" title="Lista de Assinaturas - 1A."data-options="iconCls:'icon-yell'">1A</div>
				<div href="sig/1B.php" data-toggle="tooltip" title="Lista de Assinaturas - 1B."data-options="iconCls:'icon-yell'">1B</div>
				<div href="sig/1C.php" data-toggle="tooltip" title="Lista de Assinaturas - 1C."data-options="iconCls:'icon-yell'">1C</div>
				<div href="sig/1D.php" data-toggle="tooltip" title="Lista de Assinaturas - 1D."data-options="iconCls:'icon-yell'">1D</div>
				<div href="sig/1E.php" data-toggle="tooltip" title="Lista de Assinaturas - 1E."data-options="iconCls:'icon-yell'">1E</div>
				<div href="sig/1F.php" data-toggle="tooltip" title="Lista de Assinaturas - 1F."data-options="iconCls:'icon-yell'">1F</div>
				<div href="sig/1G.php" data-toggle="tooltip" title="Lista de Assinaturas - 1G."data-options="iconCls:'icon-yell'">1G</div>
				<div href="sig/1H.php" data-toggle="tooltip" title="Lista de Assinaturas - 1H."data-options="iconCls:'icon-yell'">1H</div>
				<div href="sig/1I.php" data-toggle="tooltip" title="Lista de Assinaturas - 1I."data-options="iconCls:'icon-yell'">1I</div>
				<div href="sig/1J.php" data-toggle="tooltip" title="Lista de Assinaturas - 1J."data-options="iconCls:'icon-yell'">1J</div>
				<div href="sig/1K.php" data-toggle="tooltip" title="Lista de Assinaturas - 1K."data-options="iconCls:'icon-yell'">1K</div>
				<div href="sig/1L.php" data-toggle="tooltip" title="Lista de Assinaturas - 1L."data-options="iconCls:'icon-yell'">1L</div>
				<div href="sig/1M.php" data-toggle="tooltip" title="Lista de Assinaturas - 1M."data-options="iconCls:'icon-yell'">1M</div>
				<div href="sig/1N.php" data-toggle="tooltip" title="Lista de Assinaturas - 1N."data-options="iconCls:'icon-yell'">1N</div>
				<div href="sig/1O.php" data-toggle="tooltip" title="Lista de Assinaturas - 1O."data-options="iconCls:'icon-yell'">1O</div>
				<div href="sig/1P.php" data-toggle="tooltip" title="Lista de Assinaturas - 1P."data-options="iconCls:'icon-yell'">1P</div>
				</div>
        </div>
				
		<div>					
				<span>Assinatura: MAT</span>
				<div>
				<div href="sig/2A.php" data-toggle="tooltip" title="Lista de Assinaturas - 2A."data-options="iconCls:'icon-gren'">2A</div>
				<div href="sig/2B.php" data-toggle="tooltip" title="Lista de Assinaturas - 2B."data-options="iconCls:'icon-gren'">2B</div>
				<div href="sig/2C.php" data-toggle="tooltip" title="Lista de Assinaturas - 2C."data-options="iconCls:'icon-gren'">2C</div>
				<div href="sig/2D.php" data-toggle="tooltip" title="Lista de Assinaturas - 2D."data-options="iconCls:'icon-gren'">2D</div>
				<div href="sig/2E.php" data-toggle="tooltip" title="Lista de Assinaturas - 2E."data-options="iconCls:'icon-gren'">2E</div>
				<div href="sig/2F.php" data-toggle="tooltip" title="Lista de Assinaturas - 2F."data-options="iconCls:'icon-gren'">2F</div>
				<div href="sig/2G.php" data-toggle="tooltip" title="Lista de Assinaturas - 2G."data-options="iconCls:'icon-gren'">2G</div>
				<div href="sig/2H.php" data-toggle="tooltip" title="Lista de Assinaturas - 2H."data-options="iconCls:'icon-gren'">2H</div>
				<div href="sig/2I.php" data-toggle="tooltip" title="Lista de Assinaturas - 2I."data-options="iconCls:'icon-gren'">2I</div>
				<div href="sig/3A.php" data-toggle="tooltip" title="Lista de Assinaturas - 3A."data-options="iconCls:'icon-gren'">3A</div>
				<div href="sig/3B.php" data-toggle="tooltip" title="Lista de Assinaturas - 3B."data-options="iconCls:'icon-gren'">3B</div>
				<div href="sig/3C.php" data-toggle="tooltip" title="Lista de Assinaturas - 3C."data-options="iconCls:'icon-gren'">3C</div>
				<div href="sig/3D.php" data-toggle="tooltip" title="Lista de Assinaturas - 3D."data-options="iconCls:'icon-gren'">3D</div>
				<div href="sig/3E.php" data-toggle="tooltip" title="Lista de Assinaturas - 3E."data-options="iconCls:'icon-gren'">3E</div>
				<div href="sig/3F.php" data-toggle="tooltip" title="Lista de Assinaturas - 3F."data-options="iconCls:'icon-gren'">3F</div>
				<div href="sig/3G.php" data-toggle="tooltip" title="Lista de Assinaturas - 3G."data-options="iconCls:'icon-gren'">3G</div>
				</div>
		</div>
		
		<div class="menu-sep"></div>

		 <div>
				<span>Avaliação: VESP</span>
				<div>			
			    <div href="avl/1A.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1A."data-options="iconCls:'icon-yell'">1A</div>
				<div href="avl/1B.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1B."data-options="iconCls:'icon-yell'">1B</div>
				<div href="avl/1C.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1C."data-options="iconCls:'icon-yell'">1C</div>
				<div href="avl/1D.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1D."data-options="iconCls:'icon-yell'">1D</div>
				<div href="avl/1E.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1E."data-options="iconCls:'icon-yell'">1E</div>
				<div href="avl/1F.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1F."data-options="iconCls:'icon-yell'">1F</div>
				<div href="avl/1G.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1G."data-options="iconCls:'icon-yell'">1G</div>
				<div href="avl/1H.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1H."data-options="iconCls:'icon-yell'">1H</div>
				<div href="avl/1I.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1I."data-options="iconCls:'icon-yell'">1I</div>
				<div href="avl/1J.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1J."data-options="iconCls:'icon-yell'">1J</div>
				<div href="avl/1K.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1K."data-options="iconCls:'icon-yell'">1K</div>
				<div href="avl/1L.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1L."data-options="iconCls:'icon-yell'">1L</div>
				<div href="avl/1M.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1M."data-options="iconCls:'icon-yell'">1M</div>
				<div href="avl/1N.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1N."data-options="iconCls:'icon-yell'">1N</div>
				<div href="avl/1O.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1O."data-options="iconCls:'icon-yell'">1O</div>
				<div href="avl/1P.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 1P."data-options="iconCls:'icon-yell'">1P</div>
				</div>
        </div>
				
		<div>					
		<span>Avaliaçao: MAT</span>
				<div>
				<div href="avl/2A.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2A."data-options="iconCls:'icon-gren'">2A</div>
				<div href="avl/2B.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2B."data-options="iconCls:'icon-gren'">2B</div>
				<div href="avl/2C.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2C."data-options="iconCls:'icon-gren'">2C</div>
				<div href="avl/2D.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2D."data-options="iconCls:'icon-gren'">2D</div>
				<div href="avl/2E.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2E."data-options="iconCls:'icon-gren'">2E</div>
				<div href="avl/2F.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2F."data-options="iconCls:'icon-gren'">2F</div>
				<div href="avl/2G.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2G."data-options="iconCls:'icon-gren'">2G</div>
				<div href="avl/2H.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2H."data-options="iconCls:'icon-gren'">2H</div>
				<div href="avl/2I.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 2I."data-options="iconCls:'icon-gren'">2I</div>
				<div href="avl/3A.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3A."data-options="iconCls:'icon-gren'">3A</div>
				<div href="avl/3B.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3B."data-options="iconCls:'icon-gren'">3B</div>
				<div href="avl/3C.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3C."data-options="iconCls:'icon-gren'">3C</div>
				<div href="avl/3D.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3D."data-options="iconCls:'icon-gren'">3D</div>
				<div href="avl/3E.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3E."data-options="iconCls:'icon-gren'">3E</div>
				<div href="avl/3F.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3F."data-options="iconCls:'icon-gren'">3F</div>
				<div href="avl/3G.php" data-toggle="tooltip" title="Controle de Atividades / Avaliações - 3G."data-options="iconCls:'icon-gren'">3G</div>
				</div>
				</div>
		
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
	<table id="dg" title="CED 06 - FUSCÃO: DIURNO - 2017" style="width:auto;height:auto; border:1px solid #ccc;" ', '
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