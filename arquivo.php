<?php
    # /usuarios.php
    require('verifica_login.php');
    require('twig_carregar.php');


    require('models/Model.php');
    require('models/Arquivo.php');

    $doc = new Arquivo();
    $arquivos = $doc->getAll(['id_usuario' =>1 ]);

    
    echo $twig->render('arquivos.html', [
        'arquivos' => $arquivos,
    ]);