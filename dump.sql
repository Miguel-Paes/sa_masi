CREATE DATABASE IF NOT EXISTS manutencao;
USE manutencao;

CREATE TABLE IF NOT EXISTS clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  cpf VARCHAR(14) NOT NULL UNIQUE --Validação de CPF único
);

INSERT INTO clientes (nome, cpf) VALUES
('João Silva', '123.456.789-00'),
('Maria Oliveira', '987.654.321-00');
