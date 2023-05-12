<?php
 
    require('verifica_login.php');
    require('twig_carregar.php');
    
    require('models/Model.php');
    require('models/Arquivo.php');

    $id = $_GET['id'] ?? false;

    $doc = new Arquivo();
    $info = $doc->getById($id);

    echo $twig->render('arquivo_ver.html', [
        'arquivo' => $info,
    ]);