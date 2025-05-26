-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS basquete_db;
USE basquete_db;

-- Tabela jogadores
CREATE TABLE jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    altura DECIMAL(3,2) NOT NULL, -- exemplo: 2.05 m
    posicao ENUM('Armador', 'Ala', 'Ala-Armador', 'Pivô') NOT NULL,
    numero_camisa INT NOT NULL,
    time_atual VARCHAR(100) NOT NULL,
    foto VARCHAR(255),           -- caminho do arquivo da imagem
    ficha_tecnica VARCHAR(255)   -- caminho do arquivo PDF
);
