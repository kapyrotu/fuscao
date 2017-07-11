
<?php session_start(); include 'config/conn.php';  ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.png" type="image/png"> 
<title>::.FUSC&Atilde;O - 2016.::</title>
<style>
body{background-image:url(bg.png); padding-top:280px;}
#formulario{width:350px; height:auto; position:relative; margin:0 auto; overflow:hidden; background-color:#eee; border:solid 2px #ddd; border-radius:5px; padding:25px;}
label{width:80px; height:30px; position:relative; float:left; font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif; font-size:16px; color:#333; line-height:30px; margin:2px;}
input{width:260px; height:30px; position:relative; float:left; overflow:hidden; border:solid 1px #ddd; border-radius:5px; margin:2px; outline:none;}
input#logar{width:auto; height:auto; position:relative; float:right; margin:5px; padding:5px; background-color:#333; border:none; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:18px; color:#fff; cursor:pointer;}
</style>
</head>
 
<body>
<div id="formulario">
<form name="form" method="post" enctype="multipart/form-data" id="form">
  <label>Usuario</label>
  <input type="text" name="usuario" id="usuario" placeholder="Nome de usuario">
  <label>Senha</label>
  <input type="password" name="senha" id="senha" placeholder="Sua senha">
  <input type="submit" name="logar" id="logar" value="Login">  
</form>
<?php  include 'config/logar.php';  ?>
</div>
</body>
</html>