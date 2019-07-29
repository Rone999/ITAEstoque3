<?php
    require_once 'conecxao.php';
    session_start();
    
    if (isset($_SESSION['id'])) {
        $idcliente = $_POST['idCliente'];
        $valorEmprestimo = $_POST['valor'];
        $valorFinal = $_POST['vfinal'];
        $saldo = $_POST['saldo'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo'];
        
        $link = conecxao::conectar();
        
        if($tipo == "P"){
            $query = "INSERT INTO his_pagamentos (id_cliente,valor,data,direto_ou_via_entrada,valor_anterior,valor_posterior) "
                    . "VALUES ('$idcliente','$valor',NOW(),'D','$saldo','$valorFinal');";
        }else{
            $query = "INSERT INTO his_meus_pagamentos (id_cliente,valor,data,valor_anterior,valor_posterior) "
                    . "VALUES ('$idcliente','$valor',NOW(),'$saldo','$valorFinal');";
        }

        $retornoBanco = mysqli_query($link, $query);

        if(!$retornoBanco){
            echo "Error: " . $query . "<br>" . mysqli_error($link);
        }else{
            $query = "UPDATE `clientes` SET `valor` = '$valorFinal' WHERE `clientes`.`id` = '$idcliente';";
            mysqli_query($link, $query);
        }
        
        if (isset($_SESSION['id'])) {
            $_SESSION['ultimaAba'] = 'cliente';
        }
    }
