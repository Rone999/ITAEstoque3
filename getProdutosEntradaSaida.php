<?php
session_start();

if(isset($_SESSION['id'])){
    require_once 'conecxao.php';
    
    $idEntradaSaida = $_POST['idEntradaSaida'];
    
    $link = conecxao::conectar();
        
        
    $query = "SELECT produtos.id, produtos.nome, peso, tara, peso_liquido, preco_por_quilo,valor_final FROM `his_entr_ou_sai_prod`
    INNER JOIN produtos ON produtos.id = id_produto
    WHERE id_his_entrada_ou_saida = $idEntradaSaida;";

    $retornoBanco = mysqli_query($link, $query);

   if ($retornoBanco) {
       $cont = 0;
       $response = array();
       while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
            $response[$cont] =  array("id" => $linha['id'],"nome" => $linha['nome'],"peso" => $linha['peso'],"tara" => $linha['tara']
            ,"peso_liquido" => $linha['peso_liquido'],"valor_final" => $linha['valor_final'],"preco_por_quilo" => $linha['preco_por_quilo']);
            $cont++;
        }
        
        echo json_encode($response);
    }
}