<?php 
require('models/Model.php');
require('models/Arquivo.php');
require('twig_carregar.php');
require('func/santize_filename.php');
require('func/verifica_nome_arquivo.php');
require('pdo.inc.php');

$pesquisar = $_POST['pesquisar'];
$sql = $pdo->prepare('SELECT * FROM arquivos WHERE nome LIKE '%$pesquisar%'');

$sql->execute([$pesquisa]);
$arquivo = $sql->fetch(PDO::FETCH_ASSOC);


echo $resultado;


?>