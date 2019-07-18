<?php
require_once 'Conecxao.php';
session_start();

if (isset($_SESSION['id'])) {
    $id = $_GET['id'];
    $aba = $_GET['aba'];
    
    
    if($aba == 'cliente'){
        $link = Conecxao::conectar();

        $query = "DELETE FROM `clientes` WHERE id = '$id';";

        mysqli_query($link, $query);

        header("Location: mudar_aba.php?id_aba=cliente");
    }
    
    if($aba == 'produto'){
        $link = Conecxao::conectar();

        $query = "DELETE FROM `produtos` WHERE id = '$id';";

        mysqli_query($link, $query);

        header("Location: mudar_aba.php?id_aba=produto");
    }
}