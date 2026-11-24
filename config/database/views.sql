USE agenda_cultural;

-- ==========================================
-- VIEWS
-- ==========================================

-- EVENTOS COM SUAS CATEGORIAS

CREATE VIEW vw_eventos_categorias AS
SELECT
    e.id_evento,
    e.nome,
    c.nome AS categoria,
    e.data_inicio,
    e.hora_inicio,
    e.local,
    e.status
FROM eventos e
INNER JOIN categorias c
    ON e.categoria_id = c.id_categoria;


-- EVENTOS APROVADOS

CREATE VIEW vw_eventos_aprovados AS
SELECT
    e.nome,
    c.nome AS categoria,
    e.data_inicio,
    e.hora_inicio,
    e.local
FROM eventos e
INNER JOIN categorias c
    ON e.categoria_id = c.id_categoria
WHERE e.status = 'Aprovado';


-- EVENTOS PENDENTES

CREATE VIEW vw_eventos_pendentes AS
SELECT
    e.id_evento,
    e.nome,
    u.nome AS organizador,
    c.nome AS categoria,
    e.data_inicio,
    e.local
FROM eventos e
INNER JOIN usuarios u
    ON e.organizador_id = u.id_usuario
INNER JOIN categorias c
    ON e.categoria_id = c.id_categoria
WHERE e.status = 'Pendente';


-- EVENTOS REPROVADOS

CREATE VIEW vw_eventos_reprovados AS
SELECT
    e.nome,
    u.nome AS organizador,
    e.motivo_reprovacao
FROM eventos e
INNER JOIN usuarios u
    ON e.organizador_id = u.id_usuario
WHERE e.status = 'Reprovado';


-- USUARIOS E SEUS PERFIS

CREATE VIEW vw_usuarios_perfis AS
SELECT
    u.id_usuario,
    u.nome,
    u.email,
    p.nome AS perfil,
    u.status
FROM usuarios u
INNER JOIN perfis p
    ON u.perfil_id = p.id_perfil;


-- TOTAL DE EVENTOS POR STATUS

CREATE VIEW vw_total_eventos_status AS
SELECT
    status,
    COUNT(*) AS quantidade
FROM eventos
GROUP BY status;


-- TOTAL DE EVENTOS POR CATEGORIA

CREATE VIEW vw_total_eventos_categoria AS
SELECT
    c.nome AS categoria,
    COUNT(e.id_evento) AS quantidade
FROM categorias c
LEFT JOIN eventos e
    ON c.id_categoria = e.categoria_id
GROUP BY c.id_categoria, c.nome;


-- EVENTOS E SEUS ORGANIZADORES

CREATE VIEW vw_eventos_organizadores AS
SELECT
    e.nome AS evento,
    u.nome AS organizador,
    e.data_inicio,
    e.local,
    e.status
FROM eventos e
INNER JOIN usuarios u
    ON e.organizador_id = u.id_usuario;


-- ==========================================
-- SELECT
-- ==========================================

SELECT * FROM vw_eventos_categorias;

SELECT * FROM vw_eventos_aprovados;

SELECT * FROM vw_eventos_pendentes;

SELECT * FROM vw_eventos_reprovados;

SELECT * FROM vw_usuarios_perfis;

SELECT * FROM vw_total_eventos_status;

SELECT * FROM vw_total_eventos_categoria;

SELECT * FROM vw_eventos_organizadores;
