
<?php

namespace App\DAO;

use PDO;

class CategoriaDAO extends DAO
{
    // ==========================================
    // BUSCAR CATEGORIA POR ID
    // ==========================================

    public function buscarPorId(int $idCategoria): ?array
    {
        $sql = "SELECT *
                FROM categorias
                WHERE id_categoria = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idCategoria, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // LISTAR TODAS AS CATEGORIAS
    // ==========================================

    public function listarTodos(): array
    {
        $sql = "SELECT *
                FROM categorias
                ORDER BY nome";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ==========================================
    // CADASTRAR CATEGORIA
    // ==========================================

    public function cadastrar(string $nome): int
    {
        $sql = "INSERT INTO categorias (nome)
                VALUES (?)";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $nome, PDO::PARAM_STR);

        $stmt->execute();

        return (int) self::$connection->lastInsertId();
    }


    // ==========================================
    // EDITAR CATEGORIA
    // ==========================================

    public function atualizar(int $idCategoria, string $nome): bool
    {
        $sql = "UPDATE categorias
                SET nome = ?
                WHERE id_categoria = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $nome, PDO::PARAM_STR);
        $stmt->bindValue(2, $idCategoria, PDO::PARAM_INT);

        return $stmt->execute();
    }


    // ==========================================
    // EXCLUIR CATEGORIA
    // ==========================================

    public function excluir(int $idCategoria): bool
    {
        $sql = "DELETE FROM categorias
                WHERE id_categoria = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idCategoria, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
