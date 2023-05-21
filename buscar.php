<?php 
require('models/Model.php');
require('models/Arquivo.php');
require('twig_carregar.php');
require('func/santize_filename.php');
require('func/verifica_nome_arquivo.php');
require('pdo.inc.php');

error_reporting(0);

$pesquisar ='%'.$_POST['pesquisar'].'%';
$sql = $pdo->prepare('SELECT arquivo FROM arquivos WHERE arquivo LIKE ?');

$sql->execute([$pesquisar]);

$busca = $sql->fetch(PDO::FETCH_ASSOC);

echo $twig->render('busca.html',[
    'busca' => $busca,
]);
header('location:busca.html');




?>