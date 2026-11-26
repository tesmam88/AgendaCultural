
<?php

namespace App\DAO;

use PDO;

class EventoDAO extends DAO
{
    // ==========================================
    // BUSCAR EVENTO POR ID
    // ==========================================

    public function buscarPorId(int $idEvento): ?array
    {
        $sql = "SELECT
                    e.*,
                    c.nome AS categoria,
                    u.nome AS organizador
                FROM eventos e
                INNER JOIN categorias c
                    ON e.categoria_id = c.id_categoria
                INNER JOIN usuarios u
                    ON e.organizador_id = u.id_usuario
                WHERE e.id_evento = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idEvento, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // LISTAR TODOS OS EVENTOS
    // ==========================================

    public function listarTodos(): array
    {
        $sql = "SELECT
                    e.*,
                    c.nome AS categoria,
                    u.nome AS organizador
                FROM eventos e
                INNER JOIN categorias c
                    ON e.categoria_id = c.id_categoria
                INNER JOIN usuarios u
                    ON e.organizador_id = u.id_usuario
                ORDER BY e.data_inicio";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ==========================================
    // CADASTRAR EVENTO
    // ==========================================

    public function cadastrar(array $dados): int
    {
        $sql = "INSERT INTO eventos (
                    nome,
                    descricao,
                    data_inicio,
                    hora_inicio,
                    data_fim,
                    hora_fim,
                    local,
                    endereco,
                    ingresso,
                    valor,
                    imagem_url,
                    status,
                    motivo_reprovacao,
                    organizador_id,
                    categoria_id,
                    curador_id
                ) VALUES (
                    :nome,
                    :descricao,
                    :data_inicio,
                    :hora_inicio,
                    :data_fim,
                    :hora_fim,
                    :local,
                    :endereco,
                    :ingresso,
                    :valor,
                    :imagem_url,
                    :status,
                    :motivo_reprovacao,
                    :organizador_id,
                    :categoria_id,
                    :curador_id
                )";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute([
            ':nome' => $dados['nome'],
            ':descricao' => $dados['descricao'],
            ':data_inicio' => $dados['data_inicio'],
            ':hora_inicio' => $dados['hora_inicio'],
            ':data_fim' => $dados['data_fim'],
            ':hora_fim' => $dados['hora_fim'],
            ':local' => $dados['local'],
            ':endereco' => $dados['endereco'],
            ':ingresso' => $dados['ingresso'],
            ':valor' => $dados['valor'] ?? null,
            ':imagem_url' => $dados['imagem_url'] ?? null,
            ':status' => $dados['status'] ?? 'Pendente',
            ':motivo_reprovacao' => $dados['motivo_reprovacao'] ?? null,
            ':organizador_id' => $dados['organizador_id'],
            ':categoria_id' => $dados['categoria_id'],
            ':curador_id' => $dados['curador_id'] ?? null
        ]);

        return (int) self::$connection->lastInsertId();
    }


    // ==========================================
    // ATUALIZAR EVENTO
    // ==========================================

    public function atualizar(int $idEvento, array $dados): bool
    {
        $sql = "UPDATE eventos
                SET
                    nome = :nome,
                    descricao = :descricao,
                    data_inicio = :data_inicio,
                    hora_inicio = :hora_inicio,
                    data_fim = :data_fim,
                    hora_fim = :hora_fim,
                    local = :local,
                    endereco = :endereco,
                    ingresso = :ingresso,
                    valor = :valor,
                    imagem_url = :imagem_url,
                    status = :status,
                    motivo_reprovacao = :motivo_reprovacao,
                    organizador_id = :organizador_id,
                    categoria_id = :categoria_id,
                    curador_id = :curador_id
                WHERE id_evento = :id_evento";

        $stmt = self::$connection->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':descricao' => $dados['descricao'],
            ':data_inicio' => $dados['data_inicio'],
            ':hora_inicio' => $dados['hora_inicio'],
            ':data_fim' => $dados['data_fim'],
            ':hora_fim' => $dados['hora_fim'],
            ':local' => $dados['local'],
            ':endereco' => $dados['endereco'],
            ':ingresso' => $dados['ingresso'],
            ':valor' => $dados['valor'] ?? null,
            ':imagem_url' => $dados['imagem_url'] ?? null,
            ':status' => $dados['status'],
            ':motivo_reprovacao' => $dados['motivo_reprovacao'] ?? null,
            ':organizador_id' => $dados['organizador_id'],
            ':categoria_id' => $dados['categoria_id'],
            ':curador_id' => $dados['curador_id'] ?? null,
            ':id_evento' => $idEvento
        ]);
    }


    // ==========================================
    // EXCLUIR EVENTO
    // ==========================================

    public function excluir(int $idEvento): bool
    {
        $sql = "DELETE FROM eventos
                WHERE id_evento = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idEvento, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
