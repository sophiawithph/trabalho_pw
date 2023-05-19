<?php
    # /boasvindas.php
    require('verifica_login.php');
    require('twig_carregar.php');

    echo $twig->render('base.html', [
        'user' => $_SESSION['user']->nome,
    ]);