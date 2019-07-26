<?php 
    require_once 'conecxao.php';
    session_start();
    
    ini_set( 'display_errors', 0 );
    
    $tipo = $_GET['tipo'];
    
 
    $isResetar = $_GET['resetar'];

    if($isResetar == 'S'){
        $_SESSION['indexLimitEntSai'] = 0;
        $_SESSION['indexPaginaEntSai'] = 1;
    }
        
    if (!isset($_SESSION['indexLimitEntSai'])) {
        $_SESSION['indexLimitEntSai'] = 0;
    }

    if (!isset($_SESSION['indexPaginaEntSai'])) {
        $_SESSION['indexPaginaEntSai'] = 1;
    }
    
    function preencherTabela() {
        $link = conecxao::conectar();

        $query = "SELECT his_entrada_ou_saida.id,id_cliente, clientes.nome_razao_social, peso_total, tara_toral, peso_liquido_total, valor_total, acrescimo_desconto_saldo, emprestimo_pagamento, descricao, data_entr_sai FROM `his_entrada_ou_saida` 
        INNER JOIN clientes ON clientes.id = id_cliente 
        WHERE entrada_ou_saida = '".(($_GET['tipo'] == 'ENTRADA') ? 'E' : 'S')."' ORDER BY `his_entrada_ou_saida`.id DESC LIMIT 10 OFFSET " . $_SESSION['indexLimitEntSai'] . ";";

        $retornoBanco = mysqli_query($link, $query);

            while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
                $id = $linha['id'];
                $idCliente = $linha['id_cliente'];
                $nomeRazaoSocial = $linha['nome_razao_social'];
                $pesoTotal = $linha['peso_total'];
                $taraTotal = $linha['tara_toral'];
                $pesoL = $linha['peso_liquido_total'];
                $valor_total = 'R$' . number_format($linha['valor_total'], 2);
                $acrescimoDesc = 'R$' . number_format($linha['acrescimo_desconto_saldo'], 2);
                $emprestimo = 'R$' . number_format($linha['emprestimo_pagamento'], 2);
                $descri = $linha['descricao'];
                $data = date('d/m/Y',  strtotime($linha['data_entr_sai']));

                echo "<tr>
                                <th scope=\"row\">$idCliente</th>
                                <td>$nomeRazaoSocial</td>
                                <td>$pesoTotal</td>
                                <td>$taraTotal</td>
                                <td>$pesoL</td>
                                <td>$valor_total</td>
                                <td>$acrescimoDesc</td>
                                <td>$emprestimo</td>
                                <td>$descri</td>
                                <td>$data</td>
                                <td>
                                <a id=\"botao$id\" class=\"btn btn-primary rounded-pill\" role =\"button\" onclick=\"listarVinculados($id)\">
                                    <img width=\"20\" height=\"20\" src=\"imgs/menu.png\">
                                </a>
                                </td>
                              </tr>";
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
            var ultimoBotaoClicado = '';
            
            function listarVinculados(idEntradaProduto){
                $.post("getProdutosEntradaSaida.php", "idEntradaSaida=" + idEntradaProduto, function (data) {
                    var retornoJson = jQuery.parseJSON(data);
                    
                    if(ultimoBotaoClicado !== ''){
                        var botao = document.getElementById(ultimoBotaoClicado);
                        botao.className  = "btn btn-primary rounded-pill";
                    }
                    
                    var botao = document.getElementById('botao'+idEntradaProduto);
                    botao.className  = "btn btn-success rounded-pill";
                    ultimoBotaoClicado ='botao'+idEntradaProduto;
                    
                    var tabela = document.getElementById('tabelaProdutos');
                    
                    var index = tabela.rows.length;
                    if(tabela.rows.length > 1){
                        for(var f = 1; f <= index; f++){
                            try {            
                                tabela.deleteRow(1);
                            }catch(err) {
                            }
                        }
                    }
                    
                    for(var i = 0; i < retornoJson.length; i++){
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);
                        var celula3 = linha.insertCell(2);
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(4);
                        var celula6 = linha.insertCell(5);
                        var celula7 = linha.insertCell(6);

                        celula1.innerHTML = retornoJson[i].id;
                        celula2.innerHTML = retornoJson[i].nome;
                        celula3.innerHTML = retornoJson[i].peso;
                        celula4.innerHTML = retornoJson[i].tara;
                        celula5.innerHTML = retornoJson[i].peso_liquido;
                        celula6.innerHTML = formataDinheiro(parseFloat(retornoJson[i].preco_por_quilo));
                        celula7.innerHTML = formataDinheiro(parseFloat(retornoJson[i].valor_final));
                        window.scrollTo(0,document.body.scrollHeight);
                    }  
              });
              
              
            }
            
            function formataDinheiro(n) {
                if (parseFloat(n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.")) > 0) {
                    return "R$" + n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
                } else {
                    return "-R$" + n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.").replace("-", "");
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
        
        <h3><?php echo $tipo ?></h3>
        
        <div class="row col-12">
        <div class="col-10">
            <table  class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME/RAZÃOSOCIAL</th>
                <th scope="col">PESO TOTAL</th>
                <th scope="col">TARA TOTAL</th>
                <th scope="col">PESO LIQUIDO</th>
                <th scope="col">VALOR FINAL</th>
                <th scope="col">ACRECIMO</th>
                <th scope="col">EMPRESTIMO</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">DATA</th>
              </tr>
            </thead>
            <tbody>
               <?php preencherTabela() ?>
            </tbody>
          </table>
            
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="retornar_pagina_cliente.php?aba=entrSaid&tipo=<?php echo $tipo ?>&resetar=N" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link"> <?php echo $_SESSION['indexPaginaEntSai'] ?> </a></li>
                        <li class="page-item">
                            <a class="page-link" href="avancar_pagina_cliente.php?aba=entrSaid&tipo=<?php echo $tipo ?>&resetar=N" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
            
        
                
        <div class="col-2">
            <a href="entrada_saida.php?tipo=<?php echo $tipo?>"><button type="button" class="btn btn-primary btn-sm btn-block">Registar <?php echo ($tipo == 'ENTRADA') ? "Entrada" : 'Saida' ?></button></a>
          <div class="dropdown-divider"></div>
          <button type="button" class="btn btn-primary btn-sm btn-block">Impremir sem vinculados</button>
          <button onclick="listarVinculados()" type="button" class="btn btn-danger btn-sm btn-block">Impremir com vinculados</button>
        </div>
      </div>
      <div class="row col-12">
         <div class="col-10">
          <h3>Produtos vinculados</h3>
          <table id="tabelaProdutos" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">CÓDIGO</th>
                <th scope="col">NOME</th>
                <th scope="col">PESO</th>
                <th scope="col">TARA</th>
                <th scope="col">PESO LIQUIDO</th>
                <th scope="col">PESO P. QUILO</th>
                <th scope="col">VALOR FINAL</th>
              </tr>
            </thead>
            <tbody>
              <?php //preencherTabela() ?>
            </tbody>
          </table>
        </div>
      </div>
      <br><br><br><br>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
