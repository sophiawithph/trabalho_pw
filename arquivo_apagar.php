<?php

    require('twig_carregar.php');
    require('pdo.inc.php'); 

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id = $_POST['id'] ?? false;
        if ($id) {
            $sql = $pdo->prepare('UPDATE arquivos SET ativo = 0 WHERE id_arquivo = ?');
            $sql->execute([$id]);
        }
        header('location:arquivo.php');
        die;
    }


    $id = $_GET['id'] ?? false;
    $sql = $pdo->prepare('DELETE FROM arquivos WHERE id_arquivo = ?');
    
    $sql->execute([$id]);
    $arquivo = $sql->fetch(PDO::FETCH_ASSOC);
    echo $twig->render('arquivo_apagar.html',[
        'arquivo' => $arquivo,
    ]);
    header('location:arquivo.php');