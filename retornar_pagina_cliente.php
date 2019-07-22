<?php
session_start();

if(isset($_SESSION['id'])){
    $aba = $_GET['aba'];
    
   
    if($aba == 'cliente'){
        if($_SESSION['indexLimitCliente'] > 0){
           $_SESSION['indexLimitCliente'] -= 10;
          $_SESSION['indexPaginaCliente']--;
         }
    
         header("Location: mudar_aba.php?id_aba=cliente");
    }
    
    if($aba == 'produto'){
        if($_SESSION['indexLimitProduto'] > 0){
           $_SESSION['indexLimitProduto'] -= 10;
          $_SESSION['indexPaginaProduto']--;
         }
    
         header("Location: mudar_aba.php?id_aba=produto");
    }
    
    if($aba == 'entrSaid'){
        $tipo = $_GET['tipo'];
        if($_SESSION['indexLimitEntSai'] > 0){
          $_SESSION['indexLimitEntSai'] -= 10;
          $_SESSION['indexPaginaEntSai']--;
        }
    
         //echo $tipo;
         header("Location: listas_entrada_saida.php?tipo=".$tipo);
    }
}