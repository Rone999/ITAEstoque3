<?php

require_once 'Conecxao.php';
require_once 'Cliente.php';

session_start();

if (isset($_SESSION['id'])) {
    $tipo = $_POST['tipoCliente'];
    
    $nome = $_POST['nome'];
     $cpfCnpj = $_POST['cpfCnpj'];
     $rgIs = $_POST['rgIs'];
     $cep = $_POST['cep'];
     $estado = $_POST['estado'];
     $cidade = $_POST['cidade'];
     $rua = $_POST['rua'];
     $bairro = $_POST['bairro'];
     $email = $_POST['email'];
     $telefone1 = $_POST['telefone1'];
     $telefone2 = $_POST['telefone2'];
     $banco = $_POST['banco'];
     $agencia = $_POST['agencia'];
     $titular = $_POST['titular'];
     $tipoConta = $_POST['tipoConta'];
     $numConta = $_POST['numeroConta'];
     $cpfCnpjConta = $_POST['cpfCnpjConta'];
    
    $link = conecxao::conectar();
    
    $cliente = new Cliente(0, $tipo, $nome, $cpfCnpj, $rgIs, $cep, $estado, $cidade, $rua, $bairro, $email, $telefone1, $telefone2, $banco, $agencia, $titular, $tipoConta, $numConta, $cpfCnpjConta);
    
    $cliente->salvar($link);

}

