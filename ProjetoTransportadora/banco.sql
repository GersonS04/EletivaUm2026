CREATE DATABASE IF NOT EXISTS transportadora;
USE transportadora;

-- =========================
-- CLIENTE
-- =========================
CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(100)
);

-- =========================
-- MOTORISTA
-- =========================
CREATE TABLE motorista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cnh VARCHAR(20) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    placa_veiculo VARCHAR(10)
);

-- =========================
-- CARGA
-- =========================
CREATE TABLE carga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(200) NOT NULL,
    peso DECIMAL(10,2),
    valor_frete DECIMAL(10,2)
);

-- =========================
-- USUÁRIO (LOGIN)
-- =========================
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- =========================
-- ENTREGA (RELACIONAMENTOS)
-- =========================
CREATE TABLE entrega (
    id INT AUTO_INCREMENT PRIMARY KEY,

    cliente_id INT NOT NULL,
    motorista_id INT NOT NULL,
    carga_id INT NOT NULL,

    data_entrega DATE,
    status VARCHAR(30) DEFAULT 'pendente',

    FOREIGN KEY (cliente_id) REFERENCES cliente(id),
    FOREIGN KEY (motorista_id) REFERENCES motorista(id),
    FOREIGN KEY (carga_id) REFERENCES carga(id)
);