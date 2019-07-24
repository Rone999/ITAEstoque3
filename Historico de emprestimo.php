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
         <h2>Historico de emprestimos</h2>
          <div class="row col-12">
            <div class="col-10">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nome/Razâo social</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Valor anterio</th>
                    <th scope="col">Acrecimo porcentagem</th>
                    <th scope="col">Acrecimo valor</th>
                    <th scope="col">Valor total</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                   <?php preencherTabela() ?>
                </tbody>
              </table>
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">Emprestar</button>
              <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#Modaljuros">Acrescentar juros</button>
              <button type="submit" class="btn btn-danger btn-sm btn-block">Emprimir</button>
            </div>
            <!-- Modal emprestimo -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Emprestar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nome</label>
                        <input type="text" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="valor" class="col-form-label">Valor</label>
                        <input type="text" class="form-control" id="valor">
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="acrecimo" class="col-form-label">Acrescimo R$</label>
                            <input type="text" class="form-control" id="acrecimo">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="porcento" class="col-form-label">%</label>
                            <input type="text" class="form-control" id="porcento">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="vfinal" class="col-form-label">Valor final</label>
                        <input type="text" class="form-control" id="vfinal">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                  </div>
                </div>
              </div>
            </div>
             <!-- Modal Acrecimo de juros -->
            <div class="modal fade" id="Modaljuros" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modal">Acrescentar juros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="Acrecimo" class="col-form-label">Acrescimo R$</label>
                            <input type="text" class="form-control" id="Acrecimo">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="porCento" class="col-form-label">%</label>
                            <input type="text" class="form-control" id="porCento">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="Vfinal" class="col-form-label">Valor da divida</label>
                        <input type="text" class="form-control" id="Vfinal">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
