<?php

    require('twig_carregar.php');
    require('pdo.inc.php'); 

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id = $_POST['id'] ?? false;
        if ($id) {
            $sql = $pdo->prepare('UPDATE arquivos SET ativo = 0 WHERE id = ?');
            $sql->execute([$id]);
        }
        header('location:arquivos.php');
        die;
    }


    $id = $_GET['id'] ?? false;
    $sql = $pdo->prepare('DELETE FROM arquivos WHERE id = ?');
    // $sql = $pdo->prepare('SELECT * FROM arquivos WHERE ativo = 1');
    $sql->execute([$id]);
    $arquivo = $sql->fetch(PDO::FETCH_ASSOC);

    echo $twig->render('arquivo_apagar.html',[
        'arquivo' => $arquivo,
    ]);
    header('location:arquivos.php');