<?php
    # twig_carregar.php
    require('vendor/autoload.php');

    $loader = new \Twig\Loader\FilesystemLoader('./templates');

    $twig = new \Twig\Environment($loader);