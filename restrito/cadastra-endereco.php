<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";


$sql1 = <<<SQL
  INSERT INTO endereco (cep, logradouro, cidade, estado)
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
    $cep, $logradouro, $cidade, $estado
  ]);

  // Efetiva as operações
  $pdo->commit();

  header("location: index.html");
  exit();
  
} 
catch (Exception $e) {
  $pdo->rollBack();
  exit('Rollback executado:'. $e->getMessage());
}
