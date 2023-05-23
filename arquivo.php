<?php
    require('verifica_login.php');
    require('twig_carregar.php');
    require('pdo.inc.php');
    require('models/Model.php');
    require('models/Arquivo.php');
    require('models/Usuario.php');
    require('models/arquivos_has_usuario.php');

     session_start();

    $doc = new Arquivo();
    $arquivos = $doc->getAll(['id_usuario' => $_SESSION['user'] -> id  ]);

    $usr = new Usuario();
    $usuarios = $usr->getAll(['ativo' => 1]);

    $compartilhar= new arquivos_has_usuario();
    $compartilhar = $compartilhar->getAll(['usuarios_id' => $_SESSION['user'] -> id  ]);
    // var_dump($arquivos);
    $sql = $pdo->prepare('SELECT arquivo FROM arquivos INNER JOIN arquivos_has_usuarios ON id_arquivo = arquivos_id where arquivos.id_usuario=?;');
    $sql->execute([$_SESSION['user'] -> id]);
    $compartilhados = $sql->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($compartilhados);
    $usuarioAdm = $_SESSION['user'] -> id;
   
    $idArquivo = $_GET['id'] ?? false;
   
    echo $twig->render('arquivos.html',[
       'id' => $idArquivo,
       'usuarios' => $usuarios,
       'usuarioAdm' => $usuarioAdm,
       'arquivos' => $arquivos,
       'compartilhar' => $compartilhar,
       'compartilhados' => $compartilhados, 
       ]);
    
   

