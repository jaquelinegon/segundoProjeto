<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

try {
    $sql = <<<SQL
        SELECT cep, logradouro, cidade, estado
        FROM endereco
    SQL;

    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Endereços</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <h3>Lista de Endereços</h3>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>CEP</th>
                            <th>Logradouro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $cep = htmlspecialchars($row['cep']);
                    $logradouro = htmlspecialchars($row['logradouro']);
                    $cidade = htmlspecialchars($row['cidade']);
                    $estado = htmlspecialchars($row['estado']);

                    echo <<<HTML
                        <tr>
                            <td class='table-light'>$cep</td>
                            <td class='table-light'>$logradouro</td>
                            <td class='table-light'>$cidade</td>
                            <td class='table-light'>$estado</td>
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
