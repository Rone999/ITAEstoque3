<?php
session_start();

if(isset($_SESSION['id'])){
    
    if($_SESSION['indexLimitCliente'] > 0){
        $_SESSION['indexLimitCliente'] -= 10;
        $_SESSION['indexPaginaCliente']--;
    }
    
    header("Location: indexlogado.php");
}