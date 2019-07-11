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
          <label for="inputNome4">Nome</label>
          <input type="Nome" class="form-control" id="inputNome4" placeholder="Nome">
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md">
          <label for="inputCPF4">CPF</label>
          <input type="CPF" class="form-control" id="inputCPF4" placeholder="CPF">
        </div>
        <div class="form-group col-md">
          <label for="inputRG4">RG</label>
          <input type="RG" class="form-control" id="inputRG4" placeholder="RG">
        </div>
        <div class="form-group col-md">
          <label for="inputCEP4">CEP</label>
          <input type="CEP" class="form-control" id="inputCEP4" placeholder="CEP">
        </div>
      </div>
        <div class="form-row">
         <div class="form-group col-md-4">
          <label for="inputState">Estado</label>
          <select class="custom-select custom-select-sm">
            <option selected>SELECIONE</option>
            <option value="1">SE</option>
            <option value="2">SP</option>
            <option value="3">MG</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputCity">Cidade</label>
          <input type="text" class="form-control" id="inputCity" placeholder="Digite sua Cidade">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputRua4">Rua</label>
          <input type="text" class="form-control" id="inputRua4" placeholder="Digite sua rua">
        </div>
        <div class="form-group col-md-6">
          <label for="inputBairo4">Bairo</label>
          <input type="text" class="form-control" id="inputBairo4" placeholder="Digite seu bairo">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputTele4">Telefone 1</label>
          <input type="text" class="form-control" id="inputTele4" placeholder="Digite Telefone">
        </div>
        <div class="form-group col-md-6">
          <label for="inputtelefone4">Telefone 2</label>
          <input type="text" class="form-control" id="inputtelefone4" placeholder="Digite Telefone">
        </div>
      </div>
      <div>
        <h2>Conta Bancario</h2>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputBanco4">Banco</label>
          <input type="text" class="form-control" id="inputBanco4" placeholder="Digite o Banco">
        </div>
        <div class="form-group col-md-6">
          <label for="inputTitular4">Titular</label>
          <input type="text" class="form-control" id="inputTitular4" placeholder="Titular">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAgencia">Agencia</label>
          <input type="text" class="form-control" id="inputAgencia" placeholder="Digite sua Cidade">
        </div>
         <div class="form-group col-md-4">
          <label for="inputState">C/C</label>
          <select class="custom-select custom-select-sm">
            <option selected>SELECIONE</option>
            <option value="1">SE</option>
            <option value="2">SP</option>
            <option value="3">MG</option>
          </select>
        </div>
      </div>
          <div class="form-row">
         <div class="form-group col-md-4">
          <label for="inputState">Pessoa fisca ou juridica</label>
          <select class="custom-select custom-select-sm">
            <option selected>SELECIONE</option>
            <option value="1">Pessoa fisica</option>
            <option value="2">Pessoa juridica</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputcpf">CPF</label>
          <input type="text" class="form-control" id="inputcpf">
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
          <input type="text" class="form-control" id="inputRasao4" placeholder="Digite">
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md">
          <label for="inputCNPJ4">CNPJ</label>
          <input type="CNPJ" class="form-control" id="inputCNPJ4" placeholder="CNPJ">
        </div>
        <div class="form-group col-md">
          <label for="inputIS4">IS</label>
          <input type="IS" class="form-control" id="inputIS4" placeholder="IS">
        </div>
        <div class="form-group col-md">
          <label for="inputcep4">CEP</label>
          <input type="CEP" class="form-control" id="inputcep4" placeholder="CEP">
        </div>
      </div>
        <div class="form-row">
         <div class="form-group col-md-4">
          <label for="inputState">Estado</label>
          <select class="custom-select custom-select-sm">
            <option selected>SELECIONE</option>
            <option value="1">SE</option>
            <option value="2">SP</option>
            <option value="3">MG</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputCida">Cidade</label>
          <input type="text" class="form-control" id="inputCida" placeholder="Digite sua Cidade">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputrua4">Rua</label>
          <input type="text" class="form-control" id="inputrua4" placeholder="Digite sua rua">
        </div>
        <div class="form-group col-md-6">
          <label for="inputbairo4">Bairo</label>
          <input type="text" class="form-control" id="inputbairo4" placeholder="Digite seu bairo">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md">
          <label for="inputemail4">Email</label>
          <input type="email" class="form-control" id="inputemail4" placeholder="Email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputtele4">Telefone 1</label>
          <input type="text" class="form-control" id="inputtele4" placeholder="Digite Telefone">
        </div>
        <div class="form-group col-md-6">
          <label for="inputttelefone4">Telefone 2</label>
          <input type="text" class="form-control" id="inputttelefone4" placeholder="Digite Telefone">
        </div>
      </div>
      <div>
        <h2>Conta Bancario</h2>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputbanco4">Banco</label>
          <input type="text" class="form-control" id="inputbanco4" placeholder="Digite o Banco">
        </div>
        <div class="form-group col-md-6">
          <label for="inputtitular4">Titular</label>
          <input type="text" class="form-control" id="inputtitular4" placeholder="Titular">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputagencia">Agencia</label>
          <input type="text" class="form-control" id="inputagencia" placeholder="Digite sua Cidade">
        </div>
         <div class="form-group col-md-4">
          <label for="inputState">C/C</label>
          <select class="custom-select custom-select-sm">
            <option selected>SELECIONE</option>
            <option value="1">SE</option>
            <option value="2">SP</option>
            <option value="3">MG</option>
          </select>
        </div>
      </div>
          <div class="form-row">
         <div class="form-group col-md-4">
          <label for="inputState">Pessoa fisca ou juridica</label>
          <select class="custom-select custom-select-sm">
            <option selected>SELECIONE</option>
            <option value="1">Pessoa fisica</option>
            <option value="2">Pessoa juridica</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputCpf">CPF</label>
          <input type="text" class="form-control" id="inputCpf">
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
