USE agenda_cultural;

-- ==========================================
-- INSERT
-- ==========================================

-- PERFIS

INSERT INTO perfis (nome) VALUES
('Administrador'),
('Curador'),
('Organizador');


-- USUARIOS

INSERT INTO usuarios
(nome, email, documento, senha, status, perfil_id)
VALUES
('Administrador', 'admin@agenda.com', NULL, '123', 'Ativo', 1),
('Mariana Oliveira', 'mariana@exemplo.com', NULL, '123', 'Ativo', 2),
('Rafael Souza', 'rafael@exemplo.com', NULL, '123', 'Ativo', 2),
('Produções Sul', 'contato@producoessul.com.br', NULL, '123', 'Ativo', 3),
('Sabores MS', 'contato@saboresms.com.br', NULL, '123', 'Ativo', 3);


-- CATEGORIAS

INSERT INTO categorias (nome) VALUES
('Shows'),
('Festivais'),
('Feiras'),
('Gastronomia'),
('Exposições'),
('Culturais');


-- EVENTOS

INSERT INTO eventos
(nome, descricao, data_inicio, hora_inicio,
data_fim, hora_fim, local, endereco,
ingresso, valor, imagem_url, status,
organizador_id, categoria_id, curador_id)
VALUES

('Show Guilherme & Santiago',
'Show de música sertaneja.',
'2026-11-06', '20:00:00',
'2026-11-06', '23:59:00',
'Teatro Glauce Rocha', 'Campo Grande - MS',
'pago', 80.00, 'imagem1.jpg', 'Aprovado',
4, 1, 2),

('Festival de Gastronomia',
'Festival com pratos típicos da região.',
'2026-11-07', '11:00:00',
'2026-11-07', '22:00:00',
'Praça do Rádio Clube', 'Campo Grande - MS',
'gratuito', NULL, 'imagem2.jpg', 'Aprovado',
5, 4, 2),

('Show Ana Castela',
'Show de música sertaneja.',
'2026-11-09', '21:00:00',
'2026-11-10', '00:00:00',
'Arena Morenão', 'Campo Grande - MS',
'pago', 120.00, 'imagem3.jpg', 'Pendente',
4, 1, NULL),

('Sarau Cultural',
'Noite de poesia e literatura.',
'2026-11-13', '19:00:00',
'2026-11-13', '22:00:00',
'Casa de Cultura', 'Campo Grande - MS',
'gratuito', NULL, 'imagem4.jpg', 'Reprovado',
4, 6, 3);


-- CURADORIA

INSERT INTO curadoria
(evento_id, curador_id, status, observacao)
VALUES
(1, 2, 'Aprovado', 'Evento aprovado.'),
(2, 2, 'Aprovado', 'Evento aprovado.'),
(4, 3, 'Reprovado',
'A descrição precisa informar a classificação indicativa e o horário de encerramento.');
