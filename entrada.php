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
        <br><br>
        <form>
          <div class="col-12">
          <div class="form-row">
          <div class="form-group col-2">
            <label for="Id">ID</label>
            <input type="text" class="form-control" id="Id" placeholder="ID">
          </div>
          <div class="form-group col-5">
            <label for="nomerazao">Nome/razão social</label>
            <input type="text" class="form-control" id="nomerazao" placeholder="Nome/razão social">
          </div>
          </div>
          <div class="form-row">
          <div class="form-group col-1">
            <label for="codigo">Cod.produto</label>
            <input type="text" class="form-control" id="codigo" placeholder="Codigo">
          </div>
          <div class="form-group col-3">
            <label for="nomeproduto">Nome/</label>
            <input type="text" class="form-control" id="nomeproduto" placeholder="Nome">
          </div>
          <div class="form-group col-1">
            <label for="peso">Peso</label>
            <input type="text" class="form-control" id="peso" placeholder="Peso">
          </div>
          <div class="form-group col-1">
            <label for="tara">Tara</label>
            <input type="text" class="form-control" id="tara" placeholder="Tara">
          </div>
          <div class="form-group col-2">
            <label for="pliquido">Peso liquido</label>
            <input type="text" class="form-control" id="pliquido" placeholder="Peso liquido">
          </div>
          <div class="form-group col-2">
            <label for="preçoquilo">Preço p. quilo</label>
            <input type="text" class="form-control" id="preçoquilo" placeholder="Preço quilo">
          </div>
          <div class="form-group col-1">
            <label for="valorfinal">Valor final</label>
            <input type="text" class="form-control" id="valorfinal" placeholder="Valor final">
          </div>
          </div>
          </div>
          <div class="row col-12">
            <div class="col-10">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Tara</th>
                    <th scope="col">Peso liquido</th>
                    <th scope="col">Preço p. quilo</th>
                    <th scope="col">Valor final</th>
                  </tr>
                </thead>
                <tbody>
                   <?php preencherTabela() ?>
                </tbody>
              </table>
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary btn-sm btn-block">Excluir</button>
              <button type="submit" class="btn btn-primary btn-sm btn-block">Cancela</button>
              <button type="submit" class="btn btn-danger btn-sm btn-block">finalizar</button>
            </div>
          </div>
      </form>
    </body>
</html>
