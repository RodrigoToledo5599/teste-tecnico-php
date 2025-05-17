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
  status BOOLEAN NOT NULL DEFAULT TRUE
);


INSERT INTO produtos (codigo, nome, descricao, valor, quantidade, status) VALUES 
('P001', 'Mouse Gamer RGB', 'Mouse com iluminação RGB e sensor óptico de alta precisão.', 129.90, 25, TRUE),
('P002', 'Teclado Mecânico ABNT2', 'Teclado mecânico com switches azuis e layout brasileiro.', 249.99, 15, TRUE),
('P003', 'Suporte para Notebook', 'Suporte ergonômico para notebooks de até 17 polegadas.', 89.50, 40, FALSE),
('P004', 'Monitor 24" Full HD', 'Monitor LED de 24 polegadas com resolução Full HD.', 899.00, 12, TRUE),
('P005', 'Webcam Full HD', 'Webcam com microfone embutido e qualidade 1080p.', 199.90, 30, TRUE),
('P006', 'Headset Gamer 7.1', 'Fone de ouvido com som surround e microfone ajustável.', 349.99, 20, TRUE),
('P007', 'Cadeira Gamer Reclinável', 'Cadeira ergonômica com ajuste de altura e reclinação.', 1199.90, 8, TRUE),
('P008', 'HD Externo 1TB', 'Disco rígido portátil com conexão USB 3.0.', 329.50, 18, TRUE),
('P009', 'SSD 512GB M.2', 'SSD NVMe de alta velocidade para notebooks e desktops.', 399.00, 25, TRUE),
('P010', 'Placa de Vídeo RTX 3060', 'Placa de vídeo com 12GB de memória GDDR6.', 2499.90, 5, TRUE),
('P011', 'Fonte 600W 80 Plus', 'Fonte de alimentação com certificação 80 Plus Bronze.', 289.99, 14, TRUE),
('P012', 'Gabinete Mid Tower', 'Gabinete com lateral em vidro temperado e suporte RGB.', 459.00, 10, TRUE),
('P013', 'Memória RAM 16GB DDR4', 'Módulo de memória com frequência de 3200MHz.', 319.90, 22, TRUE),
('P014', 'Cabo HDMI 2.0 2m', 'Cabo de alta qualidade compatível com 4K.', 39.90, 50, TRUE),
('P015', 'Switch HDMI 3x1', 'Permite conectar 3 dispositivos HDMI em 1 entrada.', 59.90, 35, TRUE),
('P016', 'Carregador Universal USB-C', 'Carregador rápido compatível com diversos dispositivos.', 79.90, 40, TRUE),
('P017', 'Hub USB 4 portas 3.0', 'Expansor USB com 4 entradas de alta velocidade.', 69.90, 38, TRUE),
('P018', 'Estabilizador 500VA', 'Estabilizador bivolt com proteção contra surtos.', 149.90, 12, TRUE);