<?php
    require_once 'conecxao.php';

    $id = $_GET['id'];
    
    $query = "SELECT * FROM clientes WHERE id = '$id';";
    
    $link = conecxao::conectar();
    
    $retornoBanco = mysqli_query($link, $query);
    
    $arrayDadosBanco = mysqli_fetch_array($retornoBanco);
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
        <br><br><br><br>
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
                <!-- conteudo pessoa fisica -->
                <div class="tab-pane fade show active" id="pills-pessoafisica" role="tabpanel" aria-labelledby="pills-pessoafisica-tab">
                    <div class="container">
                        <form method="post" action="cadastrar_cleinte.php">
                            <input id="idCliente" name="id" type="text" <?php echo "value= ".$arrayDadosBanco['id']."" ?>>
                            <script>
                                $('#idCliente').hide();
                            </script>
                            
                            <div>
                                <h2>Cadastrar Cliente</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="tipoPessoa">TIPO</label>
                                    <select onchange="mudarTipoPessoa(1)" id="tipoPessoa" name="tipoCliente" class="custom-select custom-select-md">
                                        <option value="PF">PESSOA FÍSICA</option>
                                        <option <?php if($arrayDadosBanco['tipo'] == 'PJ'){echo 'selected';} ?> value="PJ">PESSOA JURÍDICA</option>
                                    </select>
                                  
                                </div>
                                
                                
                                <div class="form-group col-md-10">
                                    <label id="teste1" for="inputNome4">Nome</label>
                                    <input name="nome" type="text" class="form-control" id="inputNome4" placeholder="Nome" value="<?php echo $arrayDadosBanco['nome_razao_social']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label id="cpfClienteL" for="cpfClienteI">CPF</label>
                                    <input id="cpfClienteI" name="cpfCnpj" type="text" class="form-control" placeholder="CPF"  value="<?php echo $arrayDadosBanco['cpf_cnpj'];?>">
                                </div>
                                <div class="form-group col-md">
                                    <label id="rgClienteL" for="rgClienteI">RG</label>
                                    <input name="rgIs" onkeypress="return caracteresRgIs();" type="text" class="form-control" id="rgClienteI" placeholder="RG" value="<?php echo $arrayDadosBanco['rg_inscricao_social']; ?>">
                                </div>
                                <div class="form-group col-md">
                                    <label for="cepCliente">CEP</label>
                                    <input name="cep" type="text" class="form-control cep" id="cepCliente" placeholder="CEP" value="<?php echo $arrayDadosBanco['cep']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado</label>
                                    <select name="estado" class="custom-select custom-select-md">
                                        <option value="">Selecione</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'AC'){echo 'selected';} ?>  value="AC">AC</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'AL'){echo 'selected';} ?> value="AL">AL</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'AM'){echo 'selected';} ?> value="AM">AM</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'AP'){echo 'selected';} ?> value="AP">AP</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'BA'){echo 'selected';} ?> value="BA">BA</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'CE'){echo 'selected';} ?> value="CE">CE</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'DF'){echo 'selected';} ?> value="DF">DF</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'ES'){echo 'selected';} ?> value="ES">ES</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'GO'){echo 'selected';} ?> value="GO">GO</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'MA'){echo 'selected';} ?> value="MA">MA</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'MG'){echo 'selected';} ?> value="MG">MG</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'MS'){echo 'selected';} ?> value="MS">MS</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'MT'){echo 'selected';} ?> value="MT">MT</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'PA'){echo 'selected';} ?> value="PA">PA</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'PB'){echo 'selected';} ?> value="PB">PB</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'PE'){echo 'selected';} ?> value="PE">PE</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'PI'){echo 'selected';} ?> value="PI">PI</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'PR'){echo 'selected';} ?> value="PR">PR</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'RJ'){echo 'selected';} ?> value="RJ">RJ</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'RN'){echo 'selected';} ?> value="RN">RN</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'RS'){echo 'selected';} ?> value="RS">RS</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'RO'){echo 'selected';} ?> value="RO">RO</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'RR'){echo 'selected';} ?> value="RR">RR</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'SC'){echo 'selected';} ?> value="SC">SC</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'SE'){echo 'selected';} ?> value="SE">SE</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'SP'){echo 'selected';} ?> value="SP">SP</option>
                                        <option <?php if($arrayDadosBanco['estado'] == 'TO'){echo 'selected';} ?> value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input name="cidade" type="text" class="form-control" id="inputCity" placeholder="Digite sua Cidade" value="<?php echo $arrayDadosBanco['cidade'];?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputRua4">Rua</label>
                                    <input name="rua" type="text" class="form-control" id="inputRua4" placeholder="Digite sua rua" value="<?php echo $arrayDadosBanco['rua'];?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputBairo4">Bairro</label>
                                    <input name="bairro" type="text" class="form-control" id="inputBairo4" placeholder="Digite seu bairo" value="<?php echo $arrayDadosBanco['bairro']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $arrayDadosBanco['email'];?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone1Cliente">Telefone 1</label>
                                    <input onkeypress="caracteresTelefone()" name="telefone1" type="text" class="form-control" id="telefone1Cliente" placeholder="Digite Telefone" value="<?php echo $arrayDadosBanco['telefone1'];?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefone2Cliente">Telefone 2</label>
                                    <input name="telefone2" type="text" class="form-control" id="telefone2Cliente" placeholder="Digite Telefone" value="<?php echo $arrayDadosBanco['telefone2'];?>"> 
                                </div>
                            </div>
                            <div>
                                <h2>Conta Bancario</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputBanco4">Banco</label>
                                    <input name="banco" type="text" class="form-control" id="inputBanco4" placeholder="Digite o Banco" value="<?php echo $arrayDadosBanco['banco'];?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTitular4">Titular</label>
                                    <input name="titular" type="text" class="form-control" id="inputTitular4" placeholder="Titular" value="<?php echo $arrayDadosBanco['titular']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAgencia">Agencia</label>
                                    <input name="agencia" onkeypress="return caracteresNumeros()" type="text" class="form-control" id="inputAgencia" placeholder="Digite sua Cidade" value="<?php echo $arrayDadosBanco['agencia']; ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">Tipo</label>
                                    <select name="tipoConta" class="custom-select custom-select-md">
                                        <option value="CC">C/C</option>
                                        <option <?php if($arrayDadosBanco['tipo_conta'] == 'CP'){echo 'selected';} ?> value="CP">C/P</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="inputState">Conta</label>
                                    <input name="numeroConta" onkeypress="return caracteresNumeros()" type="text" class="form-control" id="inputagencia" placeholder="Conta" value="<?php echo $arrayDadosBanco['numero_conta']; ?>">
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Pessoa fisca ou juridica</label>
                                    <select onchange="mudarTipoContaFisica(1)" id="tipoContaPessoa" class="custom-select custom-select-md">
                                        <option value="1">Pessoa fisica</option>
                                        <option <?php if(strlen($arrayDadosBanco['cpf_cnpj_conta']) > 14){echo 'selected';} ?> value="2" >Pessoa juridica</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label id="cpfCnpjConta" for="cpfCnpjV">CPF</label>
                                    <input name="cpfCnpjConta" type="text" class="form-control" id="cpfCnpjV" value="<?php echo $arrayDadosBanco['cpf_cnpj_conta']; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
