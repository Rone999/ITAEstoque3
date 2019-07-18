<?php
session_start();

if(isset($_SESSION['id'])){
    require_once 'Conecxao.php';
    
    $aba = $_GET['aba'];
    
    $link = conecxao::conectar();
    
    if($aba == 'cliente'){
        $query = "SELECT COUNT(*) FROM `clientes`;";

        $retornoBanco = mysqli_query($link, $query);

        $arrayDadosBancoProduto = mysqli_fetch_array($retornoBanco);

        $numLinhasTabela = $arrayDadosBancoProduto['COUNT(*)'];

        if($numLinhasTabela > $_SESSION['indexLimitCliente'] + 10){
            $_SESSION['indexLimitCliente'] += 10;
            $_SESSION['indexPaginaCliente']++;
        }

        header("Location: mudar_aba.php?id_aba=cliente");
    }
    
    if($aba == 'produto'){
        $query = "SELECT COUNT(*) FROM `produtos`;";

        $retornoBanco = mysqli_query($link, $query);

        $arrayDadosBancoProduto = mysqli_fetch_array($retornoBanco);

        $numLinhasTabela = $arrayDadosBancoProduto['COUNT(*)'];

        if($numLinhasTabela > $_SESSION['indexLimitProduto'] + 10){
            $_SESSION['indexLimitProduto'] += 10;
            $_SESSION['indexPaginaProduto']++;
        }

        header("Location: mudar_aba.php?id_aba=produto");
    }
    
    
    
    
}
