<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
          <img src="imgs/nome.png" width="120" height="40" alt="">
      </a>
    </nav>
    <br><br>
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
            <div class="row">
              <!-- tabela de clientes-->
              <div class="col-10">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <!-- buttons de clientes-->
              <div class="col-2">
                  <button type="button" class="btn btn-primary btn-sm btn-block">Cadastrar</button>
                  <button type="button" class="btn btn-primary btn-sm btn-block">Editar</button>
                  <button type="button" class="btn btn-danger btn-sm btn-block">excluir</button>
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
