<?php 
require('models/Model.php');
require('models/Arquivo.php');
require('twig_carregar.php');
require('func/santize_filename.php');
require('func/verifica_nome_arquivo.php');
require('pdo.inc.php');

$pesquisar = $_POST['pesquisar'];
$resultado = $pdo->prepare('SELECT * FROM arquivos WHERE nome LIKE :find');

$sql->bindParam(':find', $pesquisar);

  
    $sql->execute();


$resultado->execute([$pesquisar]);
// $arquivo = $sql->fetch(PDO::FETCH_ASSOC);





?>