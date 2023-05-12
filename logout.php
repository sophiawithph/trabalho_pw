<?php
    # logout.php
    session_start();
    session_destroy();

    header('location:login.php');
    die;

//<a href="logout.php">Sair</a>.
