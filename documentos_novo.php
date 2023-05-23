<?php
session_start();
require('models/Model.php');
require('models/Arquivo.php');
require('twig_carregar.php');
require('func/santize_filename.php');
require('func/verifica_nome_arquivo.php');

if( $_SERVER['REQUEST_METHOD']== 'POST' && !$_FILES['arquivo']['error']){
    $arquivo = santize_filename($_FILES ['arquivo']['name']);

    $arquivo = verifica_nome_arquivo('uploads/', $arquivo);

    move_uploaded_file($_FILES['arquivo']['tmp_name'],'uploads/'. $arquivo);

    $doc= new Arquivo();
  $doc->create([
      'arquivo' => $arquivo,
      'id_usuario' => $_SESSION ['user'] -> id
  ]);
}

echo $twig->render('documentos_novo.html');


