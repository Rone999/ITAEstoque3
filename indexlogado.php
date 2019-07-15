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

function preencherTabela() {
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
                        <a class=\"btn btn-primary rounded-pill\" role =\"button\" href=\"apagar_cliente.php?id=$id\" onclick=\" return confirm('TEM CERTEZA QUE DESEJA EXCLUIR?')\">
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <style type="text/css"> 
            .tira_linha.nounderline:link 
            { 
        </style>

        <script>
            function alertar() {
                if (confirm("Tem certeza?")) {

                }
            }

        </script>

    </head>
    <body>
        <nav class="navbar navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">
                <img src="imgs/nome.png" width="200" height="40" alt="">
            </a>
        </nav>
        <br><br><br><br>
        <!-- Abas de conteudo-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="clientes-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" aria-selected="true">CLIENTES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="fornecedores-tab" data-toggle="tab" href="#fornecedores" role="tab" aria-controls="fornecedores" aria-selected="false">FORNECEDORES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="produtos-tab" data-toggle="tab" href="#produtos" role="tab" aria-controls="produtos" aria-selected="false">PRODUTOS</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- conteudo de clientes-->
            <div class="tab-pane fade show active" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">

                
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
                                    <?php preencherTabela() ?>
                                </tbody>
                            </table>

                            </form>
                            <div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="retornar_pagina_cliente.php" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link"> <?php echo $_SESSION['indexPaginaCliente'] ?> </a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="avancar_pagina_cliente.php" aria-label="Next">
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
            <!-- conteudo de fornecedores  -->
            <div class="tab-pane fade" id="fornecedores" role="tabpanel" aria-labelledby="fornecedores-tab">..FORNECEDORES.

            </div>
            <!-- conteudo de produtos -->
            <div class="tab-pane fade" id="produtos" role="tabpanel" aria-labelledby="produtos-tab">.PRODUTOS..

            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
