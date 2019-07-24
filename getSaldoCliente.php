<?php

    require_once 'conecxao.php';
    session_start();
    
    if (isset($_SESSION['id'])) {
        $link = conecxao::conectar();
        
        $id = $_POST['id'];
        
        $query = "SELECT valor FROM `clientes` WHERE id = '$id';";

        $retornoBanco = mysqli_query($link, $query);

        $arrayRetorno = mysqli_fetch_array($retornoBanco);
        
        if ($retornoBanco) {
            if (isset($arrayRetorno['valor'])) {
                $response = array("valor" => $arrayRetorno['valor']);
                echo json_encode($response);
            }
        }
        
    }

