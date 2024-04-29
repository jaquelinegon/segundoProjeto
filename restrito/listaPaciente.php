<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
      SELECT nome, email, peso, altura, tiposanguineo
      FROM pessoa INNER JOIN paciente ON pessoa.codigo = paciente.codigo
      SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // porque não há possibilidade de inj. de S Q L, 
  // pois nenhum parâmetro é utilizado na query SQL
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de pacientes</title>
  <link rel="stylesheet" href="style.css">

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  
</head>

<body>
<header>
      <!-- Barra navegação -->
    
      <nav class="navbar navbar-expand-lg">
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
    <main>
      <div class="container">
        <h3>Pacientes e suas informações</h3>
        <div class="table-responsive">
          <table class=" table table-striped">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Peso</th>
                <th scope="col">Altura</th>
                <th scope="col">Tiposanguineo</th>
              </tr>
            </thead>
        

          <?php
          while ($row = $stmt->fetch()) {

            // Limpa os dados produzidos pelo usuário
            // com possibilidade de X S S
            $nome = htmlspecialchars($row['nome']);
            $email = htmlspecialchars($row['email']);
            $peso = htmlspecialchars($row['peso']);
            $altura = htmlspecialchars($row['altura']);
            $tiposanguineo = htmlspecialchars($row['tiposanguineo']);

            echo <<<HTML
              <tr>
                <td class='table-light'>$nome</td> 
                <td class='table-light'>$email</td>
                <td class='table-light'>$peso</td>
                <td class='table-light'>$altura</td>
                <td class='table-light'>$tiposanguineo</td>
              </tr>      
            HTML;
          }
          ?>

        </table>
      </div>
      </div>
    </main>
    <footer>
    <p>Direitos reservados.</p>
  </footer>
</body>

</html>