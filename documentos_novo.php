<?php
require('twig_carregar.php');
require('func/santize_filename.php');
require('func/verifica_nome_arquivo.php');

if( $_SERVER['REQUEST_METHOD']== 'POST' && !$_FILES['arquivos']['error']){
    $arquivos = santize_filename($_FILES ['arquivos']['name']);

    $arquivos = verifica_nome_arquivo('uploads/', $arquivos);

    move_uploaded_file($_FILES['arquivos']['tmp_name'],'uploads/'. $arquivos);
}



echo $twig->render('documentos_novo.html');