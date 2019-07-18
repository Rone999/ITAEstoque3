<?php
    require_once 'conecxao.php';

    $id = $_GET['id'];

    $arrayDadosBancoProduto;


    $query = "SELECT * FROM produtos WHERE id = '$id';";
    
    $link = conecxao::conectar();
    
    $retornoBanco = mysqli_query($link, $query);
    
    $arrayDadosBancoProduto = mysqli_fetch_array($retornoBanco);
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js" ></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
        
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
            jQuery(function ($) {
                $('#cepCliente').mask('00000-000');
                
                /*$('#cpfClienteI').mask('000.000.000-00');
                
                $('#cpfCnpjV').mask('000.000.000-00');*/
                mudarTipoPessoa(2);
                mudarTipoContaFisica(2);
            });
            
            function caracteresNumeros(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
                var regex = /^[0-9]+$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault)
                        theEvent.preventDefault();
                }
            }
            
            function caracteresTelefone(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
                var regex = /^[0-9.(.).-.]+$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault)
                        theEvent.preventDefault();
                }
            }

            function caracteresRgIs(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
                var regex = /^[0-9-.\-.]+$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault)
                        theEvent.preventDefault();
                }
            }
            
            function caracteresIS(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
                var regex = /^[0-9-.\-.-\\]+$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault)
                        theEvent.preventDefault();
                }
            }
            
            function mudarTipoContaFisica(tipo){
                var combox = document.getElementById('tipoContaPessoa');
                
                if(combox.value == 1){
                        $('#cpfCnpjV').mask('000.000.000-00');
                        $('#cpfCnpjConta').html('CPF');
                        if(tipo == 1){
                            document.getElementById('cpfCnpjV').value = '';
                        }
                }
                
                if(combox.value == 2){
                        $('#cpfCnpjV').mask('00.000.000/0000-00');
                        $('#cpfCnpjConta').html('CNPJ');
                        if(tipo == 1){
                            document.getElementById('cpfCnpjV').value = '';
                        }
                }
            }
            
            function mudarTipoContaJuridica(){
                var combox = document.getElementById('tipoContaPessoaJ');
                
                if(combox.value == 1){
                        $('#cpfCnpjVJ').mask('000.000.000-00');
                        $('#cpfCnpjContaJ').html('CPF');
                        document.getElementById('cpfCnpjVJ').value = '';
                }
                
                if(combox.value == 2){
                        $('#cpfCnpjVJ').mask('00.000.000/0000-00');
                        $('#cpfCnpjContaJ').html('CNPJ');
                        document.getElementById('cpfCnpjVJ').value = '';
                }
            }
            
            function mudarTipoPessoa(tipo){
                var comboxTipo = document.getElementById('tipoPessoa');
                
                if(comboxTipo.value == 'PF'){
                    $('#cpfClienteI').mask('000.000.000-00');
                    $('#cpfClienteL').html('CPF');
                    if(tipo == 1){
                        document.getElementById('cpfClienteI').value = '';
                    }   
                    document.getElementById('cpfClienteI').placeholder = 'CPF';
                    
                    $('#rgClienteL').html('RG');
                    document.getElementById('rgClienteI').placeholder = 'RG';
                    if(tipo == 1){
                        document.getElementById('rgClienteI').value = '';
                    }
                }
                
                if(comboxTipo.value == 'PJ'){
                    $('#cpfClienteI').mask('00.000.000/0000-00');
                    $('#cpfClienteL').html('CNPJ');
                    if(tipo == 1){
                        document.getElementById('cpfClienteI').value = '';
                    }
                    document.getElementById('cpfClienteI').placeholder = 'CNPJ';
                    
                    $('#rgClienteL').html('IS');
                    document.getElementById('rgClienteI').placeholder = 'IS';
                    if(tipo == 1){
                        document.getElementById('rgClienteI').value = '';
                    }
                }
                
                
                
            }
        </script>

    </head>
    <body>
        <nav class="navbar navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="indexlogado.php">
                <img src="imgs/nome.png" width="200" height="40" alt="">
            </a>
        </nav>
        <br><br>
        <div class="container">
            <!--<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-pessoafisica-tab" data-toggle="pill" href="#pills-pessoafisica" role="tab" aria-controls="pills-pessoafisica" aria-selected="true">PESSOA FISICA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-pessoajuridica-tab" data-toggle="pill" href="#pills-pessoajuridica" role="tab" aria-controls="pills-pessoajuridica" aria-selected="false">PESSOA JURIDICA</a>
                </li>
            </ul>-->
            <div>
                <form method="post" action="cadastrar_produto.php">
                    
                    <!--<div class="form-group">
                      <label for="recipient-name" class="col-form-label">Codigo</label>
                      <input name="id" type="text" class="form-control" id="recipient-name">
                    </div>-->
                    <div class= "row">
                        <div class="form-group col-6">
                          <label for="recipient-name" class="col-form-label">Nome</label>
                          <input name="nome" type="text" class="form-control" id="recipient-name" value="<?php echo $arrayDadosBancoProduto['nome']; ?>">
                        </div>
                    </div>
                        
                    <div class= "row">
                        <div class="form-group col-3">
                          <label for="recipient-name" class="col-form-label">Quantidade no estoque</label>
                          <input name="quantidade" type="text" class="form-control" id="recipient-name" value="<?php echo $arrayDadosBancoProduto['quantidade']; ?>">
                        </div>
                        <div class="form-group col-3">
                          <label for="recipient-name" class="col-form-label">Valor de venda R$</label>
                          <input name="valor_venda" type="text" class="form-control" id="recipient-name" value="<?php echo $arrayDadosBancoProduto['valor_venda']; ?>">
                        </div>
                    </div> 
                        
                    
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    
                  </form>
            </div>
        </div>   
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
