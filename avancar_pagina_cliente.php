<?php
session_start();

if(isset($_SESSION['id'])){
    require_once 'Conecxao.php';
    
    $link = conecxao::conectar();
    
    $query = "SELECT COUNT(*) FROM `clientes`;";
    
    $retornoBanco = mysqli_query($link, $query);
    
    $arrayDadosBanco = mysqli_fetch_array($retornoBanco);
    
    $numLinhasTabela = $arrayDadosBanco['COUNT(*)'];
    
    if($numLinhasTabela > $_SESSION['indexLimitCliente'] + 10){
        $_SESSION['indexLimitCliente'] += 10;
        $_SESSION['indexPaginaCliente']++;
    }
    
    header("Location: indexlogado.php");
}
