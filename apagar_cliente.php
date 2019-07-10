<?php
require_once 'Conecxao.php';
session_start();

if (isset($_SESSION['id'])) {
    echo '';
    
    $link = Conecxao::conectar();

    $id = $_GET['id'];
    
    $query = "DELETE FROM `teste` WHERE id = '$id';";

    mysqli_query($link, $query);
    
    header("Location: indexlogado.php");
}