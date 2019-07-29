<?php

require_once 'conecxao.php';
require_once 'Produto.php';
require_once 'mudar_aba.php';

session_start();

if (isset($_SESSION['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = str_replace(",",".",$_POST['quantidade']);
    $valor_venda = str_replace(",",".",$_POST['valor_venda']);
    
    $link = conecxao::conectar();
    
    $produto = new Produto($id, $nome, $quantidade, $valor_venda);
    
    if(empty($id)){
        $produto->salvar($link);
    }else{
        $produto->editar($link);
    }
    
    header("Location: mudar_aba.php?id_aba=produto");
}



