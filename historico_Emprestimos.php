<?php
     require_once 'conecxao.php';
    session_start();

    function preencherTabela() {
        $link = conecxao::conectar();

        $query = "SELECT  id_cliente,clientes.nome_razao_social AS nome, clientes.valor AS saldo, emprestimo_ou_juros,historico_imprestimo.valor,acrecimo_porcentagem,acrecimo_valor,data,valor_anterior,valor_posterior FROM historico_imprestimo
        INNER JOIN clientes ON clientes.id = id_cliente
        ORDER BY `historico_imprestimo`.id DESC LIMIT 10 OFFSET " . $_SESSION['indexLimitCliente'] . ";";

        $retornoBanco = mysqli_query($link, $query);

        while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
            $id_cliente = $linha['id_cliente'];
            $nome =  $linha['nome']; 
            $tipo =  $linha['emprestimo_ou_juros']; 
            $valor = 'R$' . number_format($linha['valor'], 2);
            $acrecimo_porcentagem = $linha['acrecimo_porcentagem'];
            $acrecimo_valor = 'R$' . number_format($linha['acrecimo_valor'], 2);
            $data = date('d/m/Y',  strtotime($linha['data']));
            $valor_anterior = 'R$' . number_format($linha['valor_anterior'], 2);
            $valor_posterior = 'R$' . number_format($linha['valor_posterior'], 2);
            $saldo ='R$' . number_format($linha['saldo'], 2); 

            $tipo = ($tipo == 'E') ? "EMPRESTIMO" : "JUROS";
            
            echo "<tr>
                    <th scope=\"row\">$id_cliente</th>
                    <td>$nome</td>
                    <td>$tipo</td>
                    <td>$acrecimo_porcentagem</td>
                    <td>$acrecimo_valor</td>
                        <td>$valor</td>
                    <td>$valor_anterior</td>
                    <td>$valor_posterior</td>
                    <td>$data</td>
                    
                    
                    <td>
                    <a onclick=\"setarDadosClienteEmprestimo('$id_cliente','$nome','$saldo');\" class=\"btn btn-primary rounded-pill\" role =\"button\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\">
                        <img width=\"20\" height=\"20\" src=\"imgs/empre.png\">
                    </a>
                    |
                    <a onclick=\"setarDadosClienteEmprestimo('$id_cliente','$nome','$saldo');\" class=\"btn btn-primary rounded-pill\" role =\"button\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\">
                        <img width=\"20\" height=\"20\" src=\"imgs/juros.png\">
                    </a>
                    </td>
                  </tr>";
       }
    }
    
    function preencherComboID() {
    $link = conecxao::conectar();

    $query = "SELECT id FROM `clientes`;";

    $retornoBanco = mysqli_query($link, $query);

    while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
        $id = $linha['id'];

        echo "<option value=\"$id\">$id</option>";
    }
}

function preencherComboNome() {
    $link = conecxao::conectar();

    $query = "SELECT nome_razao_social FROM `clientes`;";

    $retornoBanco = mysqli_query($link, $query);

    while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
        $nome = $linha['nome_razao_social'];

        echo "<option value=\"$nome\">$nome</option>";
    }
}
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
            var tipo = 'E';
            var sobraCalculo = 0;
            
            $('input').keypress(function (e) {
                var code = null;
                code = (e.keyCode ? e.keyCode : e.which);
                return (code == 13) ? false : true;
            });
            
            function alternarCampo(idCampom, keyCode){
                if(parseInt(keyCode) != 13 && parseInt(keyCode) != 9){
                    if(idCampom == 'acrecimo'){
                       document.getElementById('porcento').value = '';
                    }else{
                        document.getElementById('acrecimo').value = '';
                    } 
                }
            }
            
            function calcularAcrescimo(){
                var campoValorAcrescimo = document.getElementById('acrecimo').value;
                var campoPorcentagem = document.getElementById('porcento').value; 
                var campoValor = (document.getElementById('valor').value == '') ? '0' : document.getElementById('valor').value;
                var resultado = 0;
                var saldo = document.getElementById('saldo').value;
                
                campoValorAcrescimo = (campoValorAcrescimo == '') ? '0' : campoValorAcrescimo;
                
                if(tipo == 'E'){
                    if(campoPorcentagem == ''){
                        resultado = parseFloat(campoValor) + parseFloat(campoValorAcrescimo);
                    }else{
                        resultado = parseFloat(campoValor) +  calcPorcent(parseFloat(campoValor), parseFloat(campoPorcentagem));
                    }
                }else{
                    var saldoSemSifrao = retirarSifao(saldo);
                    
                    if(campoPorcentagem == ''){
                        resultado = parseFloat(saldoSemSifrao) - parseFloat(campoValorAcrescimo); //parseFloat(campoValor) + parseFloat(campoValorAcrescimo);
                        sobraCalculo = campoValorAcrescimo;
                    }else{
                        resultado = parseFloat(saldoSemSifrao) - calcPorcent(parseFloat(saldoSemSifrao), parseFloat(campoPorcentagem));
                        sobraCalculo = calcPorcent(parseFloat(saldoSemSifrao), parseFloat(campoPorcentagem));
                    }
                }
                
                document.getElementById('vfinal').value = formataDinheiro(parseFloat(resultado));
                
            }
            
            function calcPorcent(valor, porcento){
                return valor * (parseFloat(porcento) / 100);
            }
            
            function caracteresNumPontos(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
                var regex = /^[0-9.]+$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault)
                        theEvent.preventDefault();
                }
            }
            
            function getCodigoKey(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                return key;
            }
            
            function setarDadosClienteEmprestimo(codigo,nome,saldo){
                limparCampos();
                
                document.getElementById("comboCodigoCliente").value = codigo;
                document.getElementById("comboNomeCliente").value = nome;
                document.getElementById("saldo").value = saldo;
            }
                
            function limparCampos(){
                document.getElementById("valor").value = '';
                document.getElementById("acrecimo").value = '';
                document.getElementById("porcento").value = '';
                document.getElementById("vfinal").value = '';
                
                document.getElementById("comboCodigoCliente").value = 'SELECIONE';
                document.getElementById("comboNomeCliente").value = 'SELECIONE';
                document.getElementById("saldo").value = '0';
            }
            
            function limparCamposQMudaCombo(){
                document.getElementById("valor").value = '';
                document.getElementById("acrecimo").value = '';
                document.getElementById("porcento").value = '';
                document.getElementById("vfinal").value = '';
                
            }
            
            function salvar(){
                if (document.getElementById("comboCodigoCliente").value != "SELECIONE") {
                    var idCliente = document.getElementById("comboCodigoCliente").value;
                    var valor = ((document.getElementById('valor').value === '') ? '0' : document.getElementById('valor').value);
                    var acrecimo = ((document.getElementById('acrecimo').value === '') ? '0' : document.getElementById('acrecimo').value); 
                    var porcento = ((document.getElementById('porcento').value === '') ? '0' : document.getElementById('porcento').value);
                    var vfinal = ((document.getElementById('vfinal').value === '') ? '0' : document.getElementById('vfinal').value);
                    var saldo = ((document.getElementById('saldo').value === '') ? '0' : document.getElementById('saldo').value);

                    
                        if(tipo == 'E'){
                            if(parseFloat(valor) > 0){
                                $.post("salvar_emprestimo_juros.php", "idCliente=" + idCliente + "&valor=" + valor+ "&acrecimo=" + acrecimo+ "&porcento=" + porcento+ "&vfinal=" + retirarSifao(vfinal) + "&saldo=" + retirarSifao(saldo) + "&tipo=" + tipo, function (data) {
                                    location.reload();
                                });
                            }else{
                                alert('ADICIONE VALORES');
                            }
                        }else{
                            console.log(parseFloat(acrecimo) + "  " + parseFloat(porcento))
                            if(parseFloat(acrecimo) > 0 || parseFloat(porcento) > 0){
                                $.post("salvar_emprestimo_juros.php", "idCliente=" + idCliente + "&valor=" + valor+ "&acrecimo=" + acrecimo+ "&porcento=" + porcento+ "&vfinal=" + sobraCalculo + "&saldo=" + retirarSifao(saldo) + "&tipo=" + tipo, function (data) {
                                    location.reload();
                                });
                            }else{
                                alert('ADICIONE JUROS');
                            }
                        }
                    

                }else{
                    alert('SELECIONE O CLIENTE');
                }
            }
            
            function formataDinheiro(n) {
                if (parseFloat(n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.")) > 0) {
                    return "R$" + n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
                } else {
                    return "-R$" + n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.").replace("-", "");
                }

            }
            
            function retirarSifao(valor) {
                return valor.replace("R$", "").replace(".", "").replace(",", ".");
            }
            
            function igualar(tipo) {
                if (tipo === 'nome') {
                    var indexCodigo = document.getElementById("comboCodigoCliente").selectedIndex;
                    document.getElementById("comboNomeCliente").selectedIndex = indexCodigo;
                }

                if (tipo === 'codigo') {
                    var indexCodigo = document.getElementById("comboNomeCliente").selectedIndex;
                    document.getElementById("comboCodigoCliente").selectedIndex = indexCodigo;
                }

                if (tipo === 'codigoProduto') {
                    var indexCodigo = document.getElementById("comboCodigoProduto").selectedIndex;
                    document.getElementById("comboNomeProduto").selectedIndex = indexCodigo;
                }

                if (tipo === 'nomeProduto') {
                    var indexCodigo = document.getElementById("comboNomeProduto").selectedIndex;
                    document.getElementById("comboCodigoProduto").selectedIndex = indexCodigo;
                }
            }
            
            function obterSaldoCliente() {
                var valor = document.getElementById('comboCodigoCliente').value;
                if (valor != 'SELECIONE') {
                    $.post("getSaldoCliente.php", "id=" + valor + "", function (data) {
                        var retornoJson = jQuery.parseJSON(data);
                        document.getElementById('saldo').value = formataDinheiro(parseFloat(retornoJson.valor));
                        limparCamposQMudaCombo();
                    });
                } else {
                    saldoCliente = 0;
                    limparCamposQMudaCombo();
                }
            }
            
            function mudarTipo(tipoI){
                if(tipoI == 'J'){
                    console.log('aqui');
                    document.getElementById('tituloModal').innerHTML = 'Acrescentar Juros';
                    document.getElementById('valorL').style.display = "none";
                    document.getElementById('valor').style.display = "none";
                    document.getElementById('vfinalL').innerHTML = 'Valor da divida';
                    tipo = 'J';
                }
                
                if(tipoI == 'E'){
                    document.getElementById('tituloModal').innerHTML = 'Emprestimo';
                    document.getElementById('valorL').style.display = "block";
                    document.getElementById('valor').style.display = "block";
                    document.getElementById('vfinalL').innerHTML = 'Valor final';
                    tipo =  'E';
                }
                
                limparCampos();
            }
        </script>

    </head>
    <body>
        <nav class="navbar navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="indexlogado.php">
                <img src="imgs/nome.png" width="200" height="40" alt="">
            </a>
        </nav>
        <br><br><br>
        <h2>Historico de emprestimos</h2>
        <div class="row col-12">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome/Razâo social</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Acrecimo porcentagem</th>
                            <th scope="col">Acrecimo valor</th>
                            <th scope="col">Valor total</th>
                            <th scope="col">Valor anterio</th>
                            <th scope="col">Valor posterior</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php preencherTabela() ?>
                    </tbody>
                </table>
            </div>
            <div class="col-2">
                <button onclick="mudarTipo('E')" type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">Emprestar</button>
                <button onclick="mudarTipo('J')" type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">Acrescentar juros</button>
                <button type="submit" class="btn btn-danger btn-sm btn-block">Emprimir</button>
            </div>
            <!-- Modal emprestimo -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloModal">Emprestar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off">
                                <div class="form-group form-row">
                                    <div class="form-group col-md-2">
                                       <label for="saldo" class="col-form-label">ID</label>
                                        <select onchange="igualar('nome'); obterSaldoCliente()" id="comboCodigoCliente"  class="form-control" name="codigoCliente">
                                            <option selected value="SELECIONE">SELECIONE</option>
                                            <?php preencherComboID(); ?>       
                                        </select> 
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="saldo" class="col-form-label">Nome/razão social</label>
                                        <select onchange="igualar('codigo'); obterSaldoCliente()" id="comboNomeCliente" class="form-control" name="nomeCliente">
                                            <option selected value="SELECIONE">SELECIONE</option>
                                            <?php preencherComboNome(); ?>       
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="saldo" class="col-form-label">Saldo</label>
                                        <input value="0" disabled="" type="text" class="form-control" id="saldo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  id="valorL" for="valor" class="col-form-label">Valor</label>
                                    <input onkeypress="return caracteresNumPontos()" onkeydown="calcularAcrescimo()" onkeyup="calcularAcrescimo()" type="text" class="form-control" id="valor">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="acrecimo" class="col-form-label">Acrescimo R$</label>
                                        <input  onkeypress="return caracteresNumPontos()" onkeydown="alternarCampo('acrecimo' , getCodigoKey()); calcularAcrescimo();" onkeyup="calcularAcrescimo();" type="text" class="form-control" id="acrecimo">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="porcento" class="col-form-label">%</label>
                                        <input name="porceEmpre" onkeypress="return caracteresNumPontos()" onkeydown="alternarCampo('porcento' , getCodigoKey()); calcularAcrescimo();" onkeyup="calcularAcrescimo();" type="text" class="form-control" id="porcento">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="vfinalL" for="vfinal" class="col-form-label">Valor final</label>
                                    <input  disabled="" type="text" class="form-control" id="vfinal">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button onclick="salvar()" type="button" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
