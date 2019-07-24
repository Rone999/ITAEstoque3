<?php
require 'conecxao.php';

$tipo = $_GET['tipo'];

if ($tipo == 'ENTRADA') {
    echo '<script> var tipo = "ENTRADA" </script>';
} else {
    echo '<script> var tipo = "SAIDA" </script>';
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

function preencherComboIdProduto() {
    $link = conecxao::conectar();

    $query = "SELECT id FROM `produtos`;";

    $retornoBanco = mysqli_query($link, $query);

    while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
        $id = $linha['id'];

        echo "<option value=\"$id\">$id</option>";
    }
}

function preencherComboNomeProduto() {
    $link = conecxao::conectar();

    $query = "SELECT nome FROM `produtos`;";

    $retornoBanco = mysqli_query($link, $query);

    while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
        $nome = $linha['nome'];

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

        <script>
            var arrayProdutos = new Array();
            var arrayTotais = new Array();
            var saldoCliente = 0;
            var totalProdutos = 0;

            //var controleArray = 1;

            /*jQuery(function ($) {
                $('#peso').mask("000.000.000.000.000,00", {reverse: true});
                 $('#tara').mask("#########0.0", {reverse: true});
                 $('#pliquido').mask("#########0.00", {reverse: true});
                 $('#preçoquilo').mask("#########0.0", {reverse: true});
                 $('#valorfinal').mask("#########0.00", {reverse: true});
                 
                 
                 $('#cpfClienteI').mask('000.000.000-00');
                 
                 $('#cpfCnpjV').mask('000.000.000-00');
            });*/

            $(document).ready(function () {
                $('input').keypress(function (e) {
                    var code = null;
                    code = (e.keyCode ? e.keyCode : e.which);
                    return (code == 13) ? false : true;
                });
                
                if(tipo == 'SAIDA'){
                    $('#acreSaldo').hide();
                    $('#emprestimo').hide();
                    $('#acreSaldoL').hide();
                    $('#emprestimoL').hide();
                }
            });


            function caracteresNumPontos(evt) {
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

            //Funcao adiciona uma nova linha na tabela
            function adicionaLinha() {
                var codigo = document.getElementById('comboCodigoProduto');
                var nome = document.getElementById('comboNomeProduto');
                var peso = document.getElementById('peso');
                var tara = document.getElementById('tara');
                var pesoLiquido = document.getElementById('pliquido');
                var PrecoPQuilo = document.getElementById('preçoquilo');
                var valor = document.getElementById('valorfinal');

                if (codigo.value != 'SELECIONE') {

                    var tabela = document.getElementById('tabelaProdutos');
                    var numeroLinhas = tabela.rows.length;
                    var linha = tabela.insertRow(numeroLinhas);
                    var celula1 = linha.insertCell(0);
                    var celula2 = linha.insertCell(1);
                    var celula3 = linha.insertCell(2);
                    var celula4 = linha.insertCell(3);
                    var celula5 = linha.insertCell(4);
                    var celula6 = linha.insertCell(5);
                    var celula7 = linha.insertCell(6);
                    var celula8 = linha.insertCell(7);

                    celula1.innerHTML = codigo.value;
                    celula2.innerHTML = nome.value;
                    celula3.innerHTML = peso.value;
                    celula4.innerHTML = ((tara.value == '') ? '0' : tara.value);
                    celula5.innerHTML = pesoLiquido.value;
                    celula6.innerHTML = formataDinheiro(parseFloat(PrecoPQuilo.value));
                    celula7.innerHTML = valor.value;
                    celula8.innerHTML = "<button class=\"btn btn-primary\" onclick='removeLinha(this)'>Excluir</button>";

                    arrayProdutos[numeroLinhas] = '{"codigo":' + codigo.value + ',"nome":\"' + nome.value + '\","peso":' + peso.value + ',"tara":' + ((tara.value == '') ? '0' : tara.value) + ',"pesoL":' + pesoLiquido.value + ',"precoPQ":' + PrecoPQuilo.value + ',"valor":' + retirarSifao(valor.value) + '}';
                    arrayTotais[numeroLinhas] = retirarSifao(valor.value);
                    limparCampos();
                    somarTotal();
                    if(tipo == 'SAIDA'){
                        calcularSaldoSaida();
                    }
                } else {
                    alert('SELECIONE O PRODUTO');
                }
            }

            function somarTotal() {
                var total = 0;

                for (var i = 0; i < arrayTotais.length; i++) {
                    if (arrayTotais[i] != null) {
                        total += parseFloat(arrayTotais[i]);
                    }
                }
                
                document.getElementById('total').value = formataDinheiro(total);
                totalProdutos = total;
            }

            // funcao remove uma linha da tabela
            function removeLinha(linha) {
                excluirDoArray(linha.parentNode.parentNode.rowIndex);
                var i = linha.parentNode.parentNode.rowIndex;
                document.getElementById('tabelaProdutos').deleteRow(i);
            }

            function finalizarProduto(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                //key = String.fromCharCode(key);

                if (key === 13) {
                    adicionaLinha();
                }
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


            function somarPeso() {
                var peso = document.getElementById('peso');
                var tara = document.getElementById('tara');

                if (peso.value.length !== 0) {
                    var soma = 0;

                    if (tara.value.length !== 0) {
                        soma = (parseFloat(peso.value) - parseFloat(tara.value));
                    } else {
                        soma = peso.value;
                    }

                    var pesoL = document.getElementById('pliquido');
                    pesoL.value = "" + soma;
                }

                somarValor();
            }

            function somarValor() {
                var pesoL = document.getElementById('pliquido');
                var precoQuilo = document.getElementById('preçoquilo');

                if (pesoL.value.length !== 0) {
                    var soma = 0;

                    soma = (parseFloat(pesoL.value) * parseFloat(precoQuilo.value));

                    var valorFinal = document.getElementById('valorfinal');
                    if (!isNaN(soma)) {
                        valorFinal.value = formataDinheiro(parseFloat(soma.toFixed(2)));
                    } else {
                        valorFinal.value = "";
                    }
                }
            }

            function excluirDoArray(indexExcluir) {
                var arrayProdutoExcluido = new Array();
                var arrayTotaisExcluido = new Array();

                var l = 0;
                for (var i = 1; i < arrayProdutos.length; i++) {
                    if (i == indexExcluir) {
                        l++;
                    }

                    arrayProdutoExcluido[i] = arrayProdutos[i + l];
                }

                var p = 0;
                for (var i = 1; i < arrayTotais.length; i++) {
                    if (i == indexExcluir) {
                        p++;
                    }

                    arrayTotaisExcluido[i] = arrayTotais[i + p];
                }

                arrayTotais = arrayTotaisExcluido;

                somarTotal();
            }

            function enviarInformacoes() {
                if(arrayProdutos.length != 0){
                    if (document.getElementById('comboCodigoCliente').value != 'SELECIONE') {
                        var json = "";

                        json += '{"produtos":[';
                        for (var i = 0; i < arrayProdutos.length; i++) {
                            if (arrayProdutos[i] != null) {
                                json += arrayProdutos[i] + ',';
                            }
                        }

                        json = json.substring(0, (json.length - 1));

                        json += ']}';

                        var acreSaldo = ((document.getElementById('acreSaldo').value === '') ? '0' : document.getElementById('acreSaldo').value);
                        var emprest = ((document.getElementById('emprestimo').value === '') ? '0' : document.getElementById('emprestimo').value);
                        var idcliente = ((document.getElementById('comboCodigoCliente').value === '') ? '0' : document.getElementById('comboCodigoCliente').value);
                        var saldo = parseFloat(retirarSifao(document.getElementById('saldo').value));

                        if (parseFloat(acreSaldo) <= totalProdutos || acreSaldo == '') {
                            window.location.href = "salvar_entrada_saida.php?json=" + json + "&idCliente=" + idcliente + "&descri=" + document.getElementById('descricao').value + "&total=" + totalProdutos + "&saldo=" + saldo + "&acreSaldo=" + acreSaldo + "&emprestimo=" + emprest + "&tipo=" + tipo;
                        } else {
                            alert('O ACESCIMO/DESCONTO DEVE SER MENOR OU IGUAL AO TOTAL');
                        }
                    } else {
                        alert('SELECIONE O CLIENTE');
                    }
                }else{
                    alert('ADICIONE PRODUTOS');
                }
            }

            function limparCampos() {

                document.getElementById("comboCodigoProduto").selectedIndex = 0;
                document.getElementById("comboNomeProduto").selectedIndex = 0;
                document.getElementById('peso').value = "";
                document.getElementById('tara').value = "";
                document.getElementById('pliquido').value = "";
                document.getElementById('preçoquilo').value = "";
                document.getElementById('valorfinal').value = "";

                document.getElementById("comboNomeProduto").focus();
            }

            function obterSaldoCliente() {
                var valor = document.getElementById('comboCodigoCliente').value;
                if (valor != 'SELECIONE') {
                    $.post("getSaldoCliente.php", "id=" + valor + "", function (data) {
                        var retornoJson = jQuery.parseJSON(data);
                        document.getElementById('saldo').value = formataDinheiro(parseFloat(retornoJson.valor));
                        saldoCliente = retornoJson.valor;
                        document.getElementById('acreSaldo').value = "";
                        document.getElementById('emprestimo').value = "";
                    });
                } else {
                    saldoCliente = 0;
                    document.getElementById('saldo').value = "";
                    document.getElementById('acreSaldo').value = "";
                    document.getElementById('emprestimo').value = "";
                }
            }

            function calcularSaldo() {
                var acresSaldo = document.getElementById('acreSaldo');
                var emprestimo = document.getElementById('emprestimo');

                if (saldoCliente.length !== 0) {
                    var soma = 0;

                    if (acresSaldo.value.length !== 0) {
                        soma = (parseFloat(saldoCliente) + parseFloat(acresSaldo.value));
                    } else {
                        soma = saldoCliente;
                    }

                    if (emprestimo.value.length !== 0) {
                        soma = (parseFloat(soma) - parseFloat(emprestimo.value))
                    }

                    var pesoL = document.getElementById('saldo');
                    pesoL.value = formataDinheiro(soma);
                }
            }
            
            function calcularSaldoSaida() {
                var total = document.getElementById('total');
               
                if (saldoCliente.length !== 0) {
                    var subtracao = 0;

                    if (total.value.length !== 0) {
                        subtracao = (parseFloat(saldoCliente) - parseFloat(retirarSifao(total.value)));
                    } else {
                        subtracao = saldoCliente;
                    }

                    var pesoL = document.getElementById('saldo');
                    pesoL.value = formataDinheiro(subtracao);
                }
            }

            function formataDinheiro(n) {
                if (parseFloat(n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.")) > 0) {
                    return "R$" + n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
                } else {
                    return "-R$" + n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.").replace("-", "");
                }

            }
            //-15000.00
            function retirarSifao(valor) {
                return valor.replace("R$", "").replace(".", "").replace(",", ".");
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
        <form autocomplete="off">
            <div class="col-12">
                <h3><?php echo $tipo ?></h3>
                <div class="form-row">
                    <div class="form-group col-2">
                        <label for="comboCodigoCliente">ID</label>
                        <select onchange="igualar('nome'); obterSaldoCliente()" id="comboCodigoCliente"  class="form-control" name="codigoCliente">
                            <option value="SELECIONE">SELECIONE</option>
<?php preencherComboID(); ?>       
                        </select>  
                    </div>


                    <div class="form-group col-5">
                        <label for="comboNomeCliente">Nome/razão social</label>
                        <select onchange="igualar('codigo');
                                obterSaldoCliente()" id="comboNomeCliente" class="form-control" name="nomeCliente">
                            <option value="SELECIONE">SELECIONE</option>
                                <?php preencherComboNome(); ?>       
                        </select>  
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-1">
                        <label for="comboCodigoProduto">Cod.produto</label>
                        <select onchange="igualar('codigoProduto')" id="comboCodigoProduto"  class="form-control" name="codigoProtuto">
                            <option value="SELECIONE">SELECIONE</option>
                                <?php preencherComboIdProduto(); ?>       
                        </select>  
                    </div>
                    <div class="form-group col-3">
                        <label for="comboNomeProduto">Nome Produto</label>
                        <select autofocus="" onchange="igualar('nomeProduto')" id="comboNomeProduto"  class="form-control" name="nomeProduto">
                            <option value="SELECIONE">SELECIONE</option>
                                <?php preencherComboNomeProduto(); ?>       
                        </select>  
                    </div>
                    <div class="form-group col-1">
                        <label for="peso">Peso</label>
                        <input onkeypress="return caracteresNumPontos()" onkeydown="somarPeso()" onkeyup="somarPeso()"  type="text" class="form-control" id="peso" placeholder="Peso">
                    </div>
                    <div class="form-group col-1">
                        <label for="tara">Tara</label>
                        <input id="tara" onkeypress="return caracteresNumPontos()" onkeydown="somarPeso()" onkeyup="somarPeso()" type="text" class="form-control"  placeholder="Tara">
                    </div>
                    <div class="form-group col-2">
                        <label for="pliquido">Peso liquido</label>
                        <input type="text" class="form-control" id="pliquido" placeholder="Peso liquido" disabled="">
                    </div>
                    <div class="form-group col-2">
                        <label for="preçoquilo">Preço p. quilo</label>
                        <input onkeypress="finalizarProduto(); return caracteresNumPontos();" onkeydown="somarValor()" onkeyup="somarValor()" type="text" class="form-control" id="preçoquilo" placeholder="Preço quilo">
                    </div>
                    <div class="form-group col-1">
                        <label for="valorfinal">Valor final</label>
                        <input type="text" class="form-control" id="valorfinal" placeholder="Valor final" disabled="">
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <div class="col-10">
                    <table id="tabelaProdutos" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Tara</th>
                                <th scope="col">Peso liquido</th>
                                <th scope="col">Preço p. quilo</th>
                                <th scope="col">Valor final</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="col-2">
                    <label  for="total">TOTAL:</label>
                    <input  type="text" class="form-control" id="total" placeholder="" disabled="">
                    <div class="dropdown-divider"></div>
                    <label for="saldo">SALDO:</label>
                    <input type="text" class="form-control" id="saldo" placeholder="" disabled="">
                    <label id="acreSaldoL" for="acreSaldo">ACRESC. AO SALDO</label>
                    <input onkeypress="return caracteresNumPontos()" onkeydown="calcularSaldo()" onkeyup="calcularSaldo()" type="text" class="form-control" id="acreSaldo" placeholder="Valor">
                    <label id="emprestimoL" for="emprestimo">EMPRESTIMO</label>
                    <input onkeypress="return caracteresNumPontos()" onkeydown="calcularSaldo()" onkeyup="calcularSaldo()" type="text" class="form-control" id="emprestimo" placeholder="Valor emprestimo">
                    <div class="dropdown-divider"></div>
                    <label for="descricao">DESCRIÇÃO</label>
                    <input type="text" class="form-control" id="descricao" placeholder="Descrição">
                    <div class="dropdown-divider"></div>
                    <a href="listas_entrada_saida.php?tipo=<?php echo $_GET['tipo']; ?>&resetar=S"><button  type="button" class="btn btn-primary btn-sm btn-block">Cancelar</button></a>
                    <div class="dropdown-divider"></div>
                    <button onclick="enviarInformacoes()" type="button" class="btn btn-danger btn-sm btn-block">Finalizar</button>
                </div>
            </div>
        </form>
    </body>
</html>
