<?php

    require('twig_carregar.php');
    require('pdo.inc.php'); 

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id = $_POST['id'] ?? false;
        if ($id) {
            $sql = $pdo->prepare('UPDATE usuarios SET ativo = 0 WHERE id = ?');
            $sql->execute([$id]);
        }
        header('location:arquivos.php');
        die;
    }


    $id = $_GET['id'] ?? false;
    $sql = $pdo->prepare('SELECT * FROM arquivos WHERE id = ?');
    $sql->execute([$id]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    echo $twig->render('arquivo_apagar.html',[
        'arquivo' => $arquivo,
    ]);