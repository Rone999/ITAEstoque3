<?php
session_start();

require_once 'Conecxao.php';
//$_SESSION['indexLimitCliente'] = 0;
if (!isset($_SESSION['indexLimitCliente'])) {
    $_SESSION['indexLimitCliente'] = 0;
}

if (!isset($_SESSION['indexPaginaCliente'])) {
    $_SESSION['indexPaginaCliente'] = 1;
}

if (!isset($_SESSION['indexLimitProduto'])) {
    $_SESSION['indexLimitProduto'] = 0;
}

if (!isset($_SESSION['indexPaginaProduto'])) {
    $_SESSION['indexPaginaProduto'] = 1;
}

//$_SESSION['ultimaAba'] = 'cliente';
if (!isset($_SESSION['ultimaAba'])) {
    $_SESSION['ultimaAba'] = 'cliente';
}


function preencherTabelaClientes() {
    $link = conecxao::conectar();

    $query = "SELECT id,tipo,nome_razao_social, cpf_cnpj,rg_inscricao_social,cidade FROM `clientes` LIMIT 10 OFFSET " . $_SESSION['indexLimitCliente'] . ";";

    $retornoBanco = mysqli_query($link, $query);

    while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
        $id = $linha['id'];
        $nome = $linha['nome_razao_social'];
        $tipo = $linha['tipo'];
        $cpf = $linha['cpf_cnpj'];
        $rg = $linha['rg_inscricao_social'];
        $cidade = $linha['cidade'];

        echo "<tr>
                        <th scope=\"row\">$id</th>
                        <td>$tipo</td>
                        <td>$nome</td>
                        <td>$cpf</td>
                        <td>$rg</td>
                        <td>$cidade</td>
                        <td>
                        <a class=\"btn btn-primary rounded-pill\" role =\"button\" href=\"apagar_cliente.php?id=$id&aba=cliente\" onclick=\" return confirm('TEM CERTEZA QUE DESEJA EXCLUIR?')\">
                            <img width=\"20\" height=\"20\" src=\"imgs/delete.png\">
                        </a>
                        |
                        <a class=\"btn btn-warning rounded-pill\" role =\"button\" href=\"cadastrarcliente.php?id=$id\">
                            <img width=\"20\" height=\"20\" src=\"imgs/edit.png\">
                         </a>
                         </td>
                      </tr>";
    }
}
    
    
    function preencherTabelaProdutos() {
    $link = conecxao::conectar();

    $query = "SELECT id,nome,quantidade,valor_venda FROM `produtos` LIMIT 10 OFFSET " . $_SESSION['indexLimitProduto'] . ";";

    $retornoBanco = mysqli_query($link, $query);

    while ($linha = mysqli_fetch_array($retornoBanco, MYSQLI_ASSOC)) {
        $id = $linha['id'];
        $nome = $linha['nome'];
        $quantidade = $linha['quantidade'];
        $valor_venda = $linha['valor_venda'];

        echo "<tr>
                        <th scope=\"row\">$id</th>
                        <td>$nome</td>
                        <td>$quantidade</td>
                        <td>$valor_venda</td>
                        <td>
                        <a class=\"btn btn-primary rounded-pill\" role =\"button\" href=\"apagar_cliente.php?id=$id&aba=produto\" onclick=\" return confirm('TEM CERTEZA QUE DESEJA EXCLUIR?')\">
                            <img width=\"20\" height=\"20\" src=\"imgs/delete.png\">
                        </a>
                        |
                        <a onclick=\"setarDadosCliente('$id','$nome','$quantidade','$valor_venda');\" class=\"btn btn-warning rounded-pill\" role =\"button\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\" href=\"cadastrarcliente.php?id=$id\">
                            <img width=\"20\" height=\"20\" src=\"imgs/edit.png\">
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
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/jquery.min.js" ></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
 
            <script type="text/javascript">
                jQuery(function ($) {
                    $('#quantProduto').mask("#########0,00", {reverse: true});
                    $('#valorProduto').mask("#########0,00", {reverse: true});

                    /*$('#cpfClienteI').mask('000.000.000-00');

                    $('#cpfCnpjV').mask('000.000.000-00');*/

                });
                
                function setarDadosCliente(codigo,nome,quantidade,valor){
                    document.getElementById("idProduto").value = codigo;
                    document.getElementById("nomeProduto").value = nome;
                    document.getElementById("quantProduto").value = quantidade;
                    document.getElementById("valorProduto").value = valor;
                    mudarNomeBotaoProduto('Editar');
                    
                }
                
                function mudarNomeBotaoProduto(nome){
                    if(nome == 'Cadastrar'){
                        document.getElementById("idProduto").value = '';
                        document.getElementById("nomeProduto").value = '';
                        document.getElementById("quantProduto").value = '';
                        document.getElementById("valorProduto").value = '';
                    }
                    
                    document.getElementById("idButaoProduto").innerHTML = nome;
                }
               
            </script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light fixed-top">
            <a onclick="setarDadosCliente(50,'teste',50,50);" class="navbar-brand" href="#">
                <img src="imgs/nome.png" width="200" height="40" alt="">
            </a>
        </nav>
        <br><br><br><br>
        <!-- Abas de conteudo-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a <?php if($_SESSION['ultimaAba'] == 'cliente'){echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> class="nav-link active" id="clientes-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" <?php if($_SESSION['ultimaAba'] == 1){echo 'aria-selected="true"';}else{echo 'aria-selected="false"';} ?>>CLIENTES</a>
            </li>
            <li class="nav-item">
                <a <?php if($_SESSION['ultimaAba'] == 'produto'){echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?>  class="nav-link" id="produtos-tab" data-toggle="tab" href="#produtos" role="tab" aria-controls="produtos" <?php if($_SESSION['ultimaAba'] == 2){echo 'aria-selected="true"';}else{echo 'aria-selected="false"';} ?>>PRODUTOS</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- conteudo de clientes-->
            <div <?php if($_SESSION['ultimaAba'] == 'cliente'){echo 'class="tab-pane fade show active"';}else{echo 'class="tab-pane fade"';} ?> id="clientes" role="tabpanel" aria-labelledby="clientes-tab">

                
                    <div class="row col-12">
                        <!-- tabela de clientes-->
                        <div class="col-10">
                            <form method="get" action="apagar_cliente.php">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">TIPO</th>
                                        <th scope="col">NOME/RAZÃO SUCIAL</th>
                                        <th scope="col">NCPF/CNPJ</th>
                                        <th scope="col">RG/IS</th>
                                        <th scope="col">CIDADE</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php preencherTabelaClientes() ?>
                                </tbody>
                            </table>

                            </form>
                            <div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="retornar_pagina_cliente.php?aba=cliente" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link"> <?php echo $_SESSION['indexPaginaCliente'] ?> </a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="avancar_pagina_cliente.php?aba=cliente" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                        <!-- buttons de clientes-->
                        <div class="col-2">
                            <a href="cadastrarcliente.php"><button type="button" class="btn btn-primary btn-sm btn-block">Cadastrar</button></a>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="btn btn-primary btn-sm btn-block">Historico de Emprestimo</button>
                                <button type="button" class="btn btn-primary btn-sm btn-block">Emprestimo</button>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="btn btn-primary btn-sm btn-block">Historico pagamento</button>
                                <button type="button" class="btn btn-primary btn-sm btn-block">Pagamentos</button>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="btn btn-primary btn-sm btn-block">Historico meus pagamentos</button>
                                <button type="button" class="btn btn-success btn-sm btn-block">Pagar</button>
                        </div>
                    </div>

                
            </div>
            <!-- conteudo de produtos -->
            <div <?php if($_SESSION['ultimaAba'] == 'produto'){echo 'class="tab-pane fade show active"';}else{echo 'class="tab-pane fade"';} ?>  id="produtos" role="tabpanel" aria-labelledby="produtos-tab">
              <div class="row col-12">
               <div class="col-10">
                <form method="get" action="apagar_cliente.php">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">NOME</th>
                          <th scope="col">ESTOQUE</th>
                          <th scope="col">VALOR DE VENDA</th>
                        </tr>
                     </thead>
                        <tbody>
                           <?php preencherTabelaProdutos();?>
                        </tbody>
                  </table>
                    
                    <div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="retornar_pagina_cliente.php?aba=produto" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link"> <?php echo $_SESSION['indexPaginaCliente'] ?> </a></li>
                                <li class="page-item">
                                    <a class="page-link" href="avancar_pagina_cliente.php?aba=produto" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
               </form>
             </div>
               <div class="col-2">
                   <button onclick="mudarNomeBotaoProduto('Cadastrar');" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cadastar</button>
                   <div class="dropdown-divider"></div>
                   <button type="button" class="btn btn-primary btn-sm btn-block">Editar</button>
                   <button type="button" class="btn btn-primary btn-sm btn-block">Excluir</button>
                   <div class="dropdown-divider"></div>
                   <button type="button" class="btn btn-primary btn-sm btn-block">Entrada</button>
                   <button type="button" class="btn btn-primary btn-sm btn-block">Saida</button>
                   <div class="dropdown-divider"></div>
                   <button type="button" class="btn btn-primary btn-sm btn-block">Historico</button>
                   <button type="button" class="btn btn-success btn-sm btn-block">emprimir</button>
               </div>
            </div>
            <!-- modal inicil -->

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cadastro de produto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="cadastrar_produto.php">
                    
                    <input name="id" type="text" class="form-control" id="idProduto">
                    <script>
                        $('#idProduto').hide();
                    </script>    
                        
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nome</label>
                      <input name="nome" type="text" class="form-control" id="nomeProduto">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Quantidade no estoque</label>
                      <input name="quantidade" type="text" class="form-control" id="quantProduto">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Valor de venda R$</label>
                      <input name="valor_venda" type="text" class="form-control" id="valorProduto">
                    </div>
                      
                    <div class="modal-footer">
                        <button id="idButaoProduto" type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>

            <!-- modal fim -->
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
