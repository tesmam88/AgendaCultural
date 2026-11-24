
<?php

namespace App\DAO;

use PDO;

class PerfilDAO extends DAO
{
    // ==========================================
    // BUSCAR PERFIL POR ID
    // ==========================================

    public function buscarPorId(int $idPerfil): ?array
    {
        $sql = "SELECT *
                FROM perfis
                WHERE id_perfil = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idPerfil, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // LISTAR TODOS OS PERFIS
    // ==========================================

    public function listarTodos(): array
    {
        $sql = "SELECT *
                FROM perfis
                ORDER BY id_perfil";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
