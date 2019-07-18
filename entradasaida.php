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
    </head>
    <body>
        <nav class="navbar navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="indexlogado.php">
                <img src="imgs/nome.png" width="200" height="40" alt="">
            </a>
        </nav>
        <br><br><br><br>
              <div class="row col-12">
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
               <?php preencherTabela() ?>
            </tbody>
          </table>
        </div>
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
      <div class="row col-12">
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
              <?php preencherTabela() ?>
            </tbody>
          </table>
        </div>
      </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
