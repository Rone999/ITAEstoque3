<?php
require_once 'conecxao.php';
session_start();

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$link = conecxao::conectar();

$query = "SELECT id, nome, usuario, tipo FROM `usuarios` WHERE usuario = '$usuario' AND senha = '$senha';";

$retornoBanco = mysqli_query($link, $query);

$arrayRetorno = mysqli_fetch_array($retornoBanco);

if ($retornoBanco) {
    if (isset($arrayRetorno['id'])) {
        $_SESSION['id'] = $arrayRetorno['id'];
        $_SESSION['nome'] = $arrayRetorno['nome'];
        $_SESSION['usuario'] = $arrayRetorno['usuario'];
        $_SESSION['tipo'] = $arrayRetorno['tipo'];

        header("Location: indexlogado.php");
    }else{
        header("Location: index.php");
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}


