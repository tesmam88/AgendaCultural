CREATE DATABASE agenda_cultural;
USE agenda_cultural;

-- ==========================================
-- CREATE TABLE
-- ==========================================

-- PERFIS

CREATE TABLE perfis (
    id_perfil INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
);


-- USUARIOS

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    documento VARCHAR(18),
    senha VARCHAR(255) NOT NULL,
    status VARCHAR(20) DEFAULT 'Ativo',
    perfil_id INT NOT NULL,

    FOREIGN KEY (perfil_id)
        REFERENCES perfis(id_perfil)
);


-- CATEGORIAS

CREATE TABLE categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(80) NOT NULL
);


-- EVENTOS

CREATE TABLE eventos (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    data_inicio DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    data_fim DATE NOT NULL,
    hora_fim TIME NOT NULL,
    local VARCHAR(150) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    ingresso VARCHAR(20) NOT NULL,
    valor DECIMAL(10,2),

    imagem_url VARCHAR(500),

    status VARCHAR(20) DEFAULT 'Pendente',
    motivo_reprovacao TEXT,

    organizador_id INT NOT NULL,
    categoria_id INT NOT NULL,
    curador_id INT,

    FOREIGN KEY (organizador_id)
        REFERENCES usuarios(id_usuario),

    FOREIGN KEY (categoria_id)
        REFERENCES categorias(id_categoria),

    FOREIGN KEY (curador_id)
        REFERENCES usuarios(id_usuario)
);


-- CURADORIA

CREATE TABLE curadoria (
    id_curadoria INT PRIMARY KEY AUTO_INCREMENT,
    evento_id INT NOT NULL,
    curador_id INT NOT NULL,
    status VARCHAR(20) NOT NULL,
    observacao TEXT,
    data_analise DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (evento_id)
        REFERENCES eventos(id_evento),

    FOREIGN KEY (curador_id)
        REFERENCES usuarios(id_usuario)
);
