CREATE DATABASE IF NOT EXISTS teste_tecnico_db;

USE teste_tecnico_db;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  codigo VARCHAR(20) NOT NULL UNIQUE,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  valor DECIMAL(10,2) DEFAULT 0.00,
  quantidade INT DEFAULT 0,
  status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo'
);