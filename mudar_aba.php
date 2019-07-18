<?php
    session_start();

    $idAba = $_GET['id_aba'];

    if (isset($_SESSION['id'])) {
        $_SESSION['ultimaAba'] = $idAba;
    }
    
    header("Location: indexlogado.php");
  




