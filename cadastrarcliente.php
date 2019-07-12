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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <script type="text/javascript">

            jQuery(function ($) {
                $('#cepCliente').mask('00000-000');
                $('#cepClienteJ').mask('00000-000');
                
                $('#cpfCliente').mask('000.000.000-00');
                $('#cnpjCliente').mask('00.000.000/0000-00');
                
                $('#telefone1Cliente').mask('(00) 000000000000000000000000000000');
                $('#telefone2Cliente').mask('(00) 000000000000000000000000000000');
                
                $('#telefone1ClienteJ').mask('(00) 000000000000000000000000000000');
                $('#telefone2ClienteJ').mask('(00) 000000000000000000000000000000');
                
                $('#cpfCnpjV').mask('000.000.000-00');
                $('#cpfCnpjVJ').mask('000.000.000-00');

            });
            
            function caracteresAgencia(evt) {
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
            
        </script>
        
        <script type="text/javascript">
            function mudarTipoContaFisica(){
                var combox = document.getElementById('tipoContaPessoa');
                
                if(combox.value == 1){
                        $('#cpfCnpjV').mask('000.000.000-00');
                        $('#cpfCnpjConta').html('CPF');
                        document.getElementById('cpfCnpjV').value = '';
                }
                
                if(combox.value == 2){
                        $('#cpfCnpjV').mask('00.000.000/0000-00');
                        $('#cpfCnpjConta').html('CNPJ');
                        document.getElementById('cpfCnpjV').value = '';
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
        </script>

    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="imgs/nome.png" width="120" height="40" alt="">
            </a>
        </nav>
        <br><br>
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-pessoafisica-tab" data-toggle="pill" href="#pills-pessoafisica" role="tab" aria-controls="pills-pessoafisica" aria-selected="true">PESSOA FISICA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-pessoajuridica-tab" data-toggle="pill" href="#pills-pessoajuridica" role="tab" aria-controls="pills-pessoajuridica" aria-selected="false">PESSOA JURIDICA</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- conteudo pessoa fisica -->
                <div class="tab-pane fade show active" id="pills-pessoafisica" role="tabpanel" aria-labelledby="pills-pessoafisica-tab">
                    <div class="container">
                        <form>
                            <div>
                                <h2>Cadastrar Cliente</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label id="teste1" for="inputNome4">Nome</label>
                                    <input name="nome" type="text" class="form-control" id="inputNome4" placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="cpfCliente">CPF</label>
                                    <input name="cpfCnpj" type="text" class="form-control" id="cpfCliente" placeholder="CPF">
                                </div>
                                <div class="form-group col-md">
                                    <label for="rgCliente">RG</label>
                                    <input name="rgIs" onkeypress="return caracteresRgIs();" type="text" class="form-control" id="rgCliente" placeholder="RG">
                                </div>
                                <div class="form-group col-md">
                                    <label for="cepCliente">CEP</label>
                                    <input name="cep" type="text" class="form-control cep" id="cepCliente" placeholder="CEP">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado</label>
                                    <select name="estado" class="custom-select custom-select-sm">
                                        <option value="">Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option selected value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input name="cidade" type="text" class="form-control" id="inputCity" placeholder="Digite sua Cidade">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputRua4">Rua</label>
                                    <input name="rua" type="text" class="form-control" id="inputRua4" placeholder="Digite sua rua">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputBairo4">Bairro</label>
                                    <input name="bairro" type="text" class="form-control" id="inputBairo4" placeholder="Digite seu bairo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone1Cliente">Telefone 1</label>
                                    <input name="telefone1" type="text" class="form-control" id="telefone1Cliente" placeholder="Digite Telefone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefone2Cliente">Telefone 2</label>
                                    <input name="telefone2" type="text" class="form-control" id="telefone2Cliente" placeholder="Digite Telefone">
                                </div>
                            </div>
                            <div>
                                <h2>Conta Bancario</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputBanco4">Banco</label>
                                    <input name="banco" type="text" class="form-control" id="inputBanco4" placeholder="Digite o Banco">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTitular4">Titular</label>
                                    <input name="titular" type="text" class="form-control" id="inputTitular4" placeholder="Titular">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAgencia">Agencia</label>
                                    <input name="agencia" onkeypress="return caracteresAgencia()" type="text" class="form-control" id="inputAgencia" placeholder="Digite sua Cidade">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">C/C</label>
                                    <select name="tipoConta" onchange="mudarTipoContaFisica()" class="custom-select custom-select-sm">
                                        <option selected>SELECIONE</option>
                                        <option value="CC">C/C</option>
                                        <option value="CP">C/P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Pessoa fisca ou juridica</label>
                                    <select onchange="mudarTipoContaFisica()" id="tipoContaPessoa" class="custom-select custom-select-sm">
                                        <option value="1">Pessoa fisica</option>
                                        <option value="2">Pessoa juridica</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label id="cpfCnpjConta" for="cpfCnpjV">CPF</label>
                                    <input name="cpfCnpjConta" type="text" class="form-control" id="cpfCnpjV">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <br><br>
                        </form>
                    </div>
                </div>
                <!-- conteudo pessoa juridica -->
                <div class="tab-pane fade" id="pills-pessoajuridica" role="tabpanel" aria-labelledby="pills-pessoajuridica-tab">
                    <div class="container">
                        <form>
                            <div>
                                <h2>Cadastrar Cliente</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputRasao4">Rasão social</label>
                                    <input name="nome" type="text" class="form-control" id="inputRasao4" placeholder="Digite">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="cnpjCliente">CNPJ</label>
                                    <input name="cpfCnpj" type="text" class="form-control" id="cnpjCliente" placeholder="CNPJ">
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputIS4">IS</label>
                                    <input name="rgIs" onkeypress="return caracteresRgIs();" type="text" class="form-control" id="inputIS4" placeholder="IS">
                                </div>
                                <div class="form-group col-md">
                                    <label for="cepClienteJ">CEP</label>
                                    <input name="cep" type="text" class="form-control" id="cepClienteJ" placeholder="CEP">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado</label>
                                    <select name="estado" class="custom-select custom-select-sm">
                                        <option value="">Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCida">Cidade</label>
                                    <input name="cidade" type="text" class="form-control" id="inputCida" placeholder="Digite sua Cidade">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputrua4">Rua</label>
                                    <input name="rua" type="text" class="form-control" id="inputrua4" placeholder="Digite sua rua">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputbairo4">Bairo</label>
                                    <input name="bairro" type="text" class="form-control" id="inputbairo4" placeholder="Digite seu bairo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputemail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputemail4" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone1ClienteJ">Telefone 1</label>
                                    <input name="telefone1" type="text" class="form-control" id="telefone1ClienteJ" placeholder="Digite Telefone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefone2ClienteJ">Telefone 2</label>
                                    <input name="telefone2" type="text" class="form-control" id="telefone2ClienteJ" placeholder="Digite Telefone">
                                </div>
                            </div>
                            <div>
                                <h2>Conta Bancario</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputbanco4">Banco</label>
                                    <input name="banco" type="text" class="form-control" id="inputbanco4" placeholder="Digite o Banco">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputtitular4">Titular</label>
                                    <input name="titular" type="text" class="form-control" id="inputtitular4" placeholder="Titular">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputagencia">Agencia</label>
                                    <input name="agencia" onkeypress="return caracteresAgencia()" type="text" class="form-control" id="inputagencia" placeholder="Digite sua Cidade">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">C/C</label>
                                    <select name="tipoConta" class="custom-select custom-select-sm">
                                        <option selected>SELECIONE</option>
                                        <option value="CC">C/C</option>
                                        <option value="CP">C/P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Pessoa fisca ou juridica</label>
                                    <select id="tipoContaPessoaJ" onchange="mudarTipoContaJuridica()" class="custom-select custom-select-sm">
                                        <option value="1">Pessoa fisica</option>
                                        <option value="2">Pessoa juridica</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label id="cpfCnpjContaJ" for="cpfCnpjVJ">CPF</label>
                                    <input name="cpfCnpjConta" type="text" class="form-control" id="cpfCnpjVJ">
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
