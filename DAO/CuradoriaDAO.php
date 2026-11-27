
<?php

namespace App\DAO;

use PDO;

class CuradoriaDAO extends DAO
{
    // ==========================================
    // BUSCAR CURADORIA POR ID
    // ==========================================

    public function buscarPorId(int $idCuradoria): ?array
    {
        $sql = "SELECT
                    c.*,
                    e.nome AS evento,
                    u.nome AS curador
                FROM curadoria c
                INNER JOIN eventos e
                    ON c.evento_id = e.id_evento
                INNER JOIN usuarios u
                    ON c.curador_id = u.id_usuario
                WHERE c.id_curadoria = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idCuradoria, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // LISTAR TODAS AS CURADORIAS
    // ==========================================

    public function listarTodos(): array
    {
        $sql = "SELECT
                    c.*,
                    e.nome AS evento,
                    u.nome AS curador
                FROM curadoria c
                INNER JOIN eventos e
                    ON c.evento_id = e.id_evento
                INNER JOIN usuarios u
                    ON c.curador_id = u.id_usuario
                ORDER BY c.data_analise DESC";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ==========================================
    // BUSCAR CURADORIAS POR EVENTO
    // ==========================================

    public function buscarPorEvento(int $idEvento): array
    {
        $sql = "SELECT
                    c.*,
                    u.nome AS curador
                FROM curadoria c
                INNER JOIN usuarios u
                    ON c.curador_id = u.id_usuario
                WHERE c.evento_id = ?
                ORDER BY c.data_analise DESC";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idEvento, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ==========================================
    // REGISTRAR ANALISE DE CURADORIA
    // ==========================================

    public function registrarAnalise(array $dados): int
    {
        $sql = "INSERT INTO curadoria (
                    evento_id,
                    curador_id,
                    status,
                    observacao
                ) VALUES (
                    :evento_id,
                    :curador_id,
                    :status,
                    :observacao
                )";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute([
            ':evento_id' => $dados['evento_id'],
            ':curador_id' => $dados['curador_id'],
            ':status' => $dados['status'],
            ':observacao' => $dados['observacao'] ?? null
        ]);

        return (int) self::$connection->lastInsertId();
    }
}
