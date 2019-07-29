<?php
    require_once 'conecxao.php';
    session_start();
    
    if (isset($_SESSION['id'])) {
        $link = conecxao::conectar();
        
        $json = $_GET['json'];
        $idCliente = $_GET['idCliente'];
        $descricao = $_GET['descri'];
        $total = $_GET['total'];
        $saldo = $_GET['saldo'];
        $acreSaldo = $_GET['acreSaldo'];
        $emprestimo = $_GET['emprestimo'];
        
        $totalPeso = 0;
        $totalTara = 0;
        $totalPesoLiquido = 0;
        
        $idUltimoHistoricoEntradaSaida = 0;
        
        $jsonObj = json_decode($json);
        $produtos = $jsonObj->produtos;

        foreach ( $produtos as $pro ){
            $totalPeso += $pro->peso;
            $totalTara += $pro->tara;
            $totalPesoLiquido += $pro->pesoL;
        }
        
        $query = "INSERT INTO his_entrada_ou_saida (id_cliente,peso_total,tara_toral,peso_liquido_total,valor_total,acrescimo_desconto_saldo,emprestimo_pagamento,entrada_ou_saida,descricao, data_entr_sai) VALUES "
                . "('$idCliente','$totalPeso','$totalTara','$totalPesoLiquido','$total','$acreSaldo','$emprestimo','".(($_GET['tipo'] == 'ENTRADA') ? 'E' : 'S')."','$descricao',NOW());";
        
        if(mysqli_query($link, $query)){
            $query = "UPDATE `clientes` SET `valor` = '$saldo' WHERE `clientes`.`id` = '$idCliente';";
            mysqli_query($link, $query);

            $query = "SELECT id FROM his_entrada_ou_saida WHERE id_cliente = '$idCliente' ORDER BY id DESC limit 1";
            $arrayBanco = mysqli_fetch_array(mysqli_query($link, $query));

            if($arrayBanco['id']){
                $idUltimoHistoricoEntradaSaida = $arrayBanco['id'];
            }
            
            foreach ( $produtos as $pro ){
                $query = "INSERT INTO his_entr_ou_sai_prod (id_his_entrada_ou_saida,id_produto,peso,tara,peso_liquido,preco_por_quilo,valor_final) VALUES ('$idUltimoHistoricoEntradaSaida','$pro->codigo','$pro->peso','$pro->tara','$pro->pesoL','$pro->precoPQ','$pro->valor');" ;
                mysqli_query($link,$query);
                if((($_GET['tipo'] == 'ENTRADA') ? 'E' : 'S') == 'E'){
                    $query = "UPDATE `produtos` SET `quantidade` =  `quantidade` + '$pro->pesoL' WHERE `produtos`.`id` = '$pro->codigo';" ;
                    mysqli_query($link,$query);
                }else{
                    $query = "UPDATE `produtos` SET `quantidade` =  `quantidade` - '$pro->pesoL' WHERE `produtos`.`id` = '$pro->codigo';" ;
                    mysqli_query($link,$query);
                }
            }
            
            //header("Location: listas_entrada_saida.php?tipo=" . $_GET['tipo']. "&resetar=S");
        }
    }
    


