<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Paciente</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bodyCadastro">
  <header>
    <!-- Barra navegação -->
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="paciente.php">Novo Paciente</a>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link" href="listaPaciente.php">Listar Pacientes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="listaEnderecos.php">Listar Endereços</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="inicio.php">Início</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <main class="container text-center mt-5 mainForm">
      <form class="row g-3" action="cadastra-paciente-transacao.php" method="post">
        <h4>Dados do Paciente</h4>
        <div class="col-md-6 m3">
            <label for="nome" class="form-label">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome">
        </div>
        <div class="col-md-6 m3">
          <label for="sexo" class="form-label">Sexo</label>
          <input type="text" name="sexo" class="form-control mb-3" id="sexo">
        </div>
        <div class="col-md-6 m3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" name="email" class="form-control mb-3" id="email">
        </div>
        <div class="col-md-6 m3">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" name="telefone" class="form-control mb-3" id="telefone">
        </div>
        <div class="col-md-4 m3">
          <label for="cep" class="form-label">CEP</label>
          <input type="text" name="cep" class="form-control mb-3" id="cep">
        </div>
        <div class="col-md-4 m3">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" name="cidade" class="form-control mb-3" id="cidade">
        </div>
        <div class="col-md-4 m3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control mb-3" id="estado">
        </div>
        <div class="col-md-6 m3">
          <label for="peso" class="form-label">Peso</label>
          <input type="number" name="peso" class="form-control mb-3" id="peso">
        </div>
        <div class="col-md-6 m3">
          <label for="altura" class="form-label">Altura</label>
          <input type="text" name="altura" class="form-control mb-3" id="altura" placeholder="170">
        </div>
        <div class="col-sm">
          <label for="tiposanguineo" class="form-label">Tipo Sanguíneo</label>
          <select name="tiposanguineo" class="form-select mb-3" id="tiposanguineo">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="logradouro" class="form-label">Logradouro</label>
          <input type="text" name="logradouro" class="form-control" id="logradouro">
        </div>
        <div class="col-12">
          <input type="submit" value="Enviar" class="btn btn-primary w-100">
        </div>
      </form>
    </main>
  </div>

  <footer>
    <p>Direitos reservados.</p>
  </footer>

</body>
</html>
