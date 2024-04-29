CREATE TABLE pessoa(
    codigo int auto_increment primary key,
    nome varchar(50),
    sexo varchar(10),
    email varchar(150) unique,
    telefone varchar(20),
    cep varchar(20),
    logradouro varchar(50),
    cidade varchar(50),
    estado varchar(50)
);

CREATE TABLE paciente(
    peso float,
    altura int,
    tiposanguineo varchar(10),
    codigo int primary key,
    foreign key(codigo) references pessoa(codigo)
);

CREATE TABLE agenda(
    codigo int primary key,
    data date,
    horario time,
    nome varchar(100),
    sexo varchar(10),
    email varchar(150),
    codigoMedico int,
    foreign key(codigoMedico) references medico(codigo)
);

INSERT INTO pessoa (nome, sexo, email, telefone, cep, logradouro, cidade, estado)
VALUES ('Usuário Exemplo', 'Masculino', 'exemplo@email.com', '123456789', '12345-678', 'Rua Exemplo', 'Cidade Exemplo', 'Estado Exemplo');

INSERT INTO funcionario (dataContrato, salario, senhaHash, codigo)
VALUES ('2024-01-01', 2500.00, '123', 1);
