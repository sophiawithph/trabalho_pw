<?php
    # /usuarios.php
    require('verifica_login.php');
    require('twig_carregar.php');
    require('pdo.inc.php');
    require('models/Model.php');
    require('models/Arquivo.php');

   

    $doc = new Arquivo();
    $arquivos = $doc->getAll(['id_usuario' => $_SESSION ['user'] -> id ]);

    
    echo $twig->render('arquivos.html', [
        'arquivos' => $arquivos,
    ]);