<?php

/**
 * Description of Cliente
 *
 * @author Rone20
 */
class Cliente {
    private $id;
    private $tipo;
    private $nome;
    private $cpfCnpj;
    private $rgIs;
    private $cep;
    private $estado;
    private $cidade;
    private $rua;
    private $bairro;
    private $email;
    private $telefone1;
    private $telefone2;
    private $banco;
    private $agencia;
    private $titular;
    private $tipoConta;
    private $numConta;
    private $cpfCnpjConta;
    
    public function __construct($id, $tipo, $nome, $cpfCnpj, $rgIs, $cep, $estado, $cidade, $rua, $bairro, $email, $telefone1, $telefone2, $banco, $agencia, $titular, $tipoConta, $numConta, $cpfCnpjConta) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->cpfCnpj = $cpfCnpj;
        $this->rgIs = $rgIs;
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->email = $email;
        $this->telefone1 = $telefone1;
        $this->telefone2 = $telefone2;
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->titular = $titular;
        $this->tipoConta = $tipoConta;
        $this->numConta = $numConta;
        $this->cpfCnpjConta = $cpfCnpjConta;
    }

    public function salvar($link){
        $query = "INSERT INTO `clientes` (`tipo`, `nome_razao_social`, `cpf_cnpj`, `rg_inscricao_social`, `estado`, `cidade`, `rua`, `bairro`, `cep`, `email`, `telefone1`, `telefone2`, `banco`, `titular`, `agencia`, `numero_conta`, `cpf_cnpj_conta`, `tipo_conta`) "
                . "VALUES ( '$this->tipo', '$this->nome', '$this->cpfCnpj', '$this->rgIs', '$this->estado', '$this->cidade', '$this->rua', '$this->bairro', '$this->cep','$this->email', '$this->telefone1', '$this->telefone2', '$this->banco', '$this->titular', '$this->agencia', '$this->numConta', '$this->cpfCnpjConta', '$this->tipoConta');";
    
        $retorno = mysqli_query($link, $query);
        
        if(!$retorno){
            echo 'Erro ao salvar o cleinte (Cliente.php):' . $query;
        }
    }
    
    public function editar($link){
        $query = "UPDATE `clientes` SET `tipo` = '$this->tipo' , `nome_razao_social` = '$this->nome'  , `cpf_cnpj` = '$this->cpfCnpj'  , `rg_inscricao_social` = '$this->rgIs'  , `estado` = '$this->estado'  , `rua` = '$this->rua'  , `bairro` = '$this->bairro'  , `cep` = '$this->cep'  , `email` = '$this->email'  , `telefone1` = '$this->telefone1' 
        , `telefone2` = '$this->telefone2'  , `banco` = '$this->banco'  , `titular` = '$this->titular'  , `agencia` = '$this->agencia'  , `numero_conta` = '$this->numConta'  , `cpf_cnpj_conta` = '$this->cpfCnpjConta'  , `cidade` = '$this->cidade',`tipo_conta` = '$this->tipoConta'  WHERE  `id` = '$this->id';";
    
        $retorno = mysqli_query($link, $query);
        
        if(!$retorno){
            echo 'Erro ao salvar o cleinte (Cliente.php):' . $query;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }
    
    public function getTipo() {
        return $this->tipo;
    }
    
    public function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    public function getRgIs() {
        return $this->rgIs;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone1() {
        return $this->telefone1;
    }

    public function getTelefone2() {
        return $this->telefone2;
    }

    public function getBanco() {
        return $this->banco;
    }

    public function getAgencia() {
        return $this->agencia;
    }

    public function getTitular() {
        return $this->titular;
    }
    
    public function getNumConta() {
        return $this->numConta;
    }
    
    public function getTipoConta() {
        return $this->tipoConta;
    }

    public function getCpfCnpjConta() {
        return $this->cpfCnpjConta;
    }
}
