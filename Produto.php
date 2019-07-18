<?php


/**
 * Description of Produto
 *
 * @author Rone20
 */
class Produto {
    private $id;
    private $nome;
    private $quantidade;
    private $valor_venda;
    
    public function __construct($id, $nome, $quantidade, $valor_venda) {
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->valor_venda = $valor_venda;
    }
    
    public function salvar($link){
        $query = "INSERT INTO produtos (nome,quantidade,valor_venda) VALUES ('$this->nome','$this->quantidade','$this->valor_venda');";
        
        $retornoBanco = mysqli_query($link, $query);
        
        if(!$retornoBanco){
            echo 'Erro ao salvar o produto (Produto.php):' . $query;
        }
    }
    
    public function editar($link){
        $query = "UPDATE produtos  SET nome = '$this->nome', quantidade = '$this->quantidade', valor_venda = '$this->valor_venda' WHERE id = '$this->id'";
        
        $retornoBanco = mysqli_query($link, $query);
        
        if(!$retornoBanco){
            echo 'Erro ao editar o produto (Produto.php):' . $query;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getValor_venda() {
        return $this->valor_venda;
    }



}
