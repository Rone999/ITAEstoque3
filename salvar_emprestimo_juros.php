<?php
    require_once 'conecxao.php';
    session_start();
    
    if (isset($_SESSION['id'])) {
        $idcliente = $_POST['idCliente'];
        $valorEmprestimo = $_POST['valor'];
        $acrescimoEmpre = $_POST['acrecimo'];
        $porceEmpre = $_POST['porcento'];
        $valorFinal = $_POST['vfinal'];
        $saldo = $_POST['saldo'];
        
        $tipo = $_POST['tipo'];
        $valorPost = 0;
        
        $link = conecxao::conectar();
        
        
        $valorPost = (floatval($saldo) - floatval($valorFinal));
        $query = "INSERT INTO historico_imprestimo (id_cliente,valor,acrecimo_porcentagem,acrecimo_valor,data,emprestimo_ou_juros,valor_anterior,valor_posterior) "
                . "VALUES ('$idcliente','$valorEmprestimo','$porceEmpre','$acrescimoEmpre',NOW(),'$tipo','$saldo','$valorPost');";

        $retornoBanco = mysqli_query($link, $query);

        if(!$retornoBanco){
            echo "Error: " . $query . "<br>" . mysqli_error($link);
        }else{
            $query = "UPDATE `clientes` SET `valor` = '$valorPost' WHERE `clientes`.`id` = '$idcliente';";
            mysqli_query($link, $query);
        }
        
        if (isset($_SESSION['id'])) {
            $_SESSION['ultimaAba'] = 'cliente';
        }
    }
