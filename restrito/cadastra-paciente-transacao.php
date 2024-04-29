<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

// Resgata os dados da pessoa
$nome = $_POST["nome"] ?? "";
$sexo  = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$cep = $_POST["cep"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";

// Resgata os dados do paciente
$peso = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$tiposanguineo = $_POST["tiposanguineo"] ?? "";


$sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, 
                       cep, cidade, estado, logradouro)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

$sql2 = <<<SQL
  INSERT INTO paciente 
    (peso, altura, tiposanguineo, codigo)
  VALUES (?, ?, ?, ?)
  SQL;

try {
  $pdo->beginTransaction();

  // Inserção na tabela pessoa
  // Neste caso utilize prepared statements para prevenir
  // inj. de S Q L, pois estamos inserindo dados 
  // fornecidos pelo usuário
  $stmt1 = $pdo->prepare($sql1);
  $stmt1->execute([
    $nome, $sexo, $email, $telefone,
    $cep, $cidade, $estado, $logradouro
  ]);

  // Inserção na tabela paciente
  // Precisamos do codigo da pessoa cadastrado, que
  // foi gerado automaticamente pelo MySQL
  // na operação acima (campo auto_increment), para
  // prover valor para o campo do tipo chave estrangeira
  $codigoNovaPessoa = $pdo->lastInsertId();
  $stmt2 = $pdo->prepare($sql2);
  if (!$stmt2->execute([
    $peso, $altura, $tiposanguineo, $codigoNovaPessoa
  ])) throw new Exception('Falha na segunda inserção');

  // Efetiva as operações
  $pdo->commit();

  header("location: index.html");
  exit();
  
  } 
catch (Exception $e) {
  $pdo->rollBack();
  exit('Rollback executado:'. $e->getMessage());
}
