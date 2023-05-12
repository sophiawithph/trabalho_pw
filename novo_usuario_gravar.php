<?php
    # novo_usuario_gravar.php
    require('models/Model.php');
    require('models/Usuario.php');
    $name = $_POST['name'] ?? false; 
    $email = $_POST ['email'] ?? false;
    $user = $_POST['user'] ?? false;
    $pass = $_POST['pass'] ?? false;
  

    if ( !$email || !$name||!$user || !$pass ) {
        header('location:novo_usuario.php');
        die;
    }

    $pass = password_hash($pass, PASSWORD_BCRYPT);

  $usr= new Usuario();
  $usr->create([
      'nome' => $name,
      'email' => $email,
      'username' => $user,
      'senha'=> $pass,
      'ativo'=> 1,
  ]);

    header('location:usuarios.php');
