<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<label class="h5">Olá : <?php print($userRow['user_name']); ?></label>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <title>welcome - <?php print($userRow['user_email']); ?></title>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Seu Perfil</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="clearfix"></div>
 <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="favicon.png" type="image/png"> 
<title>FUSC&Atilde;O - 2016</title>
</head>
<body>


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
if(isset($_REQUEST['edit'])){	
	header("Location: edit/index.html");	
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>FUSC&Atilde;O</title><div align="center">
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery.edatagrid.js"></script>
	<script type="text/javascript" src="js/datagrid-filter.js"></script>
	<script type="text/javascript" src="js/datepicker-pt-BR.js"></script>
	<script type="text/javascript" src="js/easyui-lang-pt_BR.js"></script>
	<script type="text/javascript" src="js/animation.html"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
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
            },2000)
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
        <a href="home.php" class="easyui-splitbutton" data-options="menu:'#mm0',iconCls:'icon-slider'">Home</a>
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
		<div href="?eja" data-toggle="tooltip" title="Controle Estudantes - NOTURNO!"data-options="iconCls:'icon-pen'">EJA</div>
		<div href="?passivo" data-toggle="tooltip" title="Consulta Estudantes no Arquivo Passivo!!" data-options="iconCls:'icon-box'">Passivo</div>
		<div href="?transferencias" data-toggle="tooltip" title="Controle de Transferências / Históricos / Certificados!!" data-options="iconCls:'icon-trf'">Transferências</div>
	</div>
		
    <div id="mm4" style="width:150px;">
		<div href="exp_anee.php" data-toggle="tooltip" title="Imprimir registros de Estudantes com Necessidades Especiais." >Anee</div>
		<div class="menu-sep"></div>
		
		<div>
            	<span>Chamada: VESP</span>
       			<div>			
			    <div href="chamada/busca.html" data-toggle="tooltip" title="Chamada Provisória"data-options="iconCls:'icon-yell'">Buscar</div>
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
				<div href="list/1M.php" data-toggle="tooltip" title="Lista de estudantes - 1M."data-options="iconCls:'icon-yell'">1M</div>
				<div href="list/1N.php" data-toggle="tooltip" title="Lista de estudantes - 1N."data-options="iconCls:'icon-yell'">1N</div>
				<div href="list/1O.php" data-toggle="tooltip" title="Lista de estudantes - 1O."data-options="iconCls:'icon-yell'">1O</div>
				<div href="list/1P.php" data-toggle="tooltip" title="Lista de estudantes - 1P."data-options="iconCls:'icon-yell'">1P</div>
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
				<div href="list/ALL.php" data-toggle="tooltip" title="Fuscão - 2016.">GERAL</div>
				</div>
				</div>
				<div>	        
            <span>Assinatura: VESP</span>
        <div>			
			    <div href="sig/1A.php" data-toggle="tooltip" title="Lista de estudantes - 1A."data-options="iconCls:'icon-yell'">1A</div>
				<div href="sig/1B.php" data-toggle="tooltip" title="Lista de estudantes - 1B."data-options="iconCls:'icon-yell'">1B</div>
				<div href="sig/1C.php" data-toggle="tooltip" title="Lista de estudantes - 1C."data-options="iconCls:'icon-yell'">1C</div>
				<div href="sig/1D.php" data-toggle="tooltip" title="Lista de estudantes - 1D."data-options="iconCls:'icon-yell'">1D</div>
				<div href="sig/1E.php" data-toggle="tooltip" title="Lista de estudantes - 1E."data-options="iconCls:'icon-yell'">1E</div>
				<div href="sig/1F.php" data-toggle="tooltip" title="Lista de estudantes - 1F."data-options="iconCls:'icon-yell'">1F</div>
				<div href="sig/1G.php" data-toggle="tooltip" title="Lista de estudantes - 1G."data-options="iconCls:'icon-yell'">1G</div>
				<div href="sig/1H.php" data-toggle="tooltip" title="Lista de estudantes - 1H."data-options="iconCls:'icon-yell'">1H</div>
				<div href="sig/1I.php" data-toggle="tooltip" title="Lista de estudantes - 1I."data-options="iconCls:'icon-yell'">1I</div>
				<div href="sig/1J.php" data-toggle="tooltip" title="Lista de estudantes - 1J."data-options="iconCls:'icon-yell'">1J</div>
				<div href="sig/1K.php" data-toggle="tooltip" title="Lista de estudantes - 1K."data-options="iconCls:'icon-yell'">1K</div>
				<div href="sig/1L.php" data-toggle="tooltip" title="Lista de estudantes - 1L."data-options="iconCls:'icon-yell'">1L</div>
				<div href="sig/1M.php" data-toggle="tooltip" title="Lista de estudantes - 1M."data-options="iconCls:'icon-yell'">1M</div>
				<div href="sig/1N.php" data-toggle="tooltip" title="Lista de estudantes - 1N."data-options="iconCls:'icon-yell'">1N</div>
				<div href="sig/1O.php" data-toggle="tooltip" title="Lista de estudantes - 1O."data-options="iconCls:'icon-yell'">1O</div>
				<div href="sig/1P.php" data-toggle="tooltip" title="Lista de estudantes - 1P."data-options="iconCls:'icon-yell'">1P</div>
        </div>
        </div>
				
		<div>					
				<span>Assinatura: MAT</span>
				<div>
				<div href="sig/2A.php" data-toggle="tooltip" title="Lista de estudantes - 2A."data-options="iconCls:'icon-gren'">2A</div>
				<div href="sig/2B.php" data-toggle="tooltip" title="Lista de estudantes - 2B."data-options="iconCls:'icon-gren'">2B</div>
				<div href="sig/2C.php" data-toggle="tooltip" title="Lista de estudantes - 2C."data-options="iconCls:'icon-gren'">2C</div>
				<div href="sig/2D.php" data-toggle="tooltip" title="Lista de estudantes - 2D."data-options="iconCls:'icon-gren'">2D</div>
				<div href="sig/2E.php" data-toggle="tooltip" title="Lista de estudantes - 2E."data-options="iconCls:'icon-gren'">2E</div>
				<div href="sig/2F.php" data-toggle="tooltip" title="Lista de estudantes - 2F."data-options="iconCls:'icon-gren'">2F</div>
				<div href="sig/2G.php" data-toggle="tooltip" title="Lista de estudantes - 2G."data-options="iconCls:'icon-gren'">2G</div>
				<div href="sig/2H.php" data-toggle="tooltip" title="Lista de estudantes - 2H."data-options="iconCls:'icon-gren'">2H</div>
				<div href="sig/2I.php" data-toggle="tooltip" title="Lista de estudantes - 2I."data-options="iconCls:'icon-gren'">2I</div>
				<div href="sig/3A.php" data-toggle="tooltip" title="Lista de estudantes - 3A."data-options="iconCls:'icon-gren'">3A</div>
				<div href="sig/3B.php" data-toggle="tooltip" title="Lista de estudantes - 3B."data-options="iconCls:'icon-gren'">3B</div>
				<div href="sig/3C.php" data-toggle="tooltip" title="Lista de estudantes - 3C."data-options="iconCls:'icon-gren'">3C</div>
				<div href="sig/3D.php" data-toggle="tooltip" title="Lista de estudantes - 3D."data-options="iconCls:'icon-gren'">3D</div>
				<div href="sig/3E.php" data-toggle="tooltip" title="Lista de estudantes - 3E."data-options="iconCls:'icon-gren'">3E</div>
				<div href="sig/3F.php" data-toggle="tooltip" title="Lista de estudantes - 3F."data-options="iconCls:'icon-gren'">3F</div>
				<div href="sig/3G.php" data-toggle="tooltip" title="Lista de estudantes - 3G."data-options="iconCls:'icon-gren'">3G</div>
				</div>
				</div>
				
				
				<div class="menu-sep"></div>
		<div href="exp_nov.php" data-toggle="tooltip" title="Imprimir registros de Estudantes Novos." ">Novos</div>
		<div href="exp_trf.php" data-toggle="tooltip" title="Imprimir registros de Estudantes Cancelados e Transferidos." ">Movimentação</div>
		
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
				<div href="debito/1M.php" data-toggle="tooltip" title="Lista de débito - 1M."data-options="iconCls:'icon-yell'">1M</div>
				<div href="debito/1N.php" data-toggle="tooltip" title="Lista de débito - 1N."data-options="iconCls:'icon-yell'">1N</div>
				<div href="debito/1O.php" data-toggle="tooltip" title="Lista de débito - 1O."data-options="iconCls:'icon-yell'">1O</div>
				<div href="debito/1P.php" data-toggle="tooltip" title="Lista de débito - 1P."data-options="iconCls:'icon-yell'">1P</div>
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
				<span>Débito: LISTA</span>
				<div>
				<div href="debito/ALL.php" data-toggle="tooltip" title="Débito - 2016.">GERAL</div>
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
	<table id="dg" title="CED 06 - FUSCÃO: DIURNO - 2016" style="width:auto;height:auto; border:1px solid #ccc;" ', '
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
<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:640px;height:480px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Informações do Estudante</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>ANO:</label>
				<input name="ano" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>CH:</label>
				<input name="nch" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>CÓDIGO:</label>
				<input name="codigo" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>NOME:</label>
				<input name="nome" class="easyui-textbox">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>
	<script type="text/javascript">
	function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'update_cadastroclientes.php?id='+row.id;
			}
		}
				function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		</script>
</body>
</html>