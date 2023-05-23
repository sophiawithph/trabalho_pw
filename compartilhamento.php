<?php
 require('verifica_login.php');
 require('twig_carregar.php');
 require('pdo.inc.php');
 require('models/Model.php');
 require('models/Arquivo.php');
 require('models/Usuario.php');
 require('models/arquivos_has_usuario.php');

 session_start();
 //error_reporting(0);
 $arquivos_id = $_POST['id_arquivo'];
 $usuarios_id = $_POST['usuario'];

 $compartilhar = new arquivos_has_usuario();

 $compartilhar->create([
     'usuarios_id' => $usuarios_id,
     'arquivos_id' => $arquivos_id,
 ]);


 header('location:arquivo.php');


