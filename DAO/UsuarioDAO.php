
<?php

namespace App\DAO;

use PDO;

class UsuarioDAO extends DAO
{
    // ==========================================
    // BUSCAR USUARIO POR ID
    // ==========================================

    public function buscarPorId(int $idUsuario): ?array
    {
        $sql = "SELECT
                    id_usuario,
                    nome,
                    email,
                    documento,
                    status,
                    perfil_id
                FROM usuarios
                WHERE id_usuario = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $idUsuario, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // BUSCAR USUARIO POR EMAIL
    // ==========================================

    public function buscarPorEmail(string $email): ?array
    {
        $sql = "SELECT *
                FROM usuarios
                WHERE email = ?";

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $email, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // BUSCAR USUARIO POR EMAIL OU DOCUMENTO
    // ==========================================

    public function buscarPorLogin(string $login): ?array
    {
        // Verifica se o login informado é um e-mail
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {

            $sql = "SELECT *
                    FROM usuarios
                    WHERE email = ?";

            $valor = $login;

        } else {

            // Remove pontos, traços, barras e espaços do documento
            $documento = preg_replace('/\D/', '', $login);

            if (empty($documento)) {
                return null;
            }

            $sql = "SELECT *
                    FROM usuarios
                    WHERE REPLACE(
                        REPLACE(
                            REPLACE(
                                REPLACE(documento, '.', ''),
                            '-', ''),
                        '/', ''),
                    ' ', '') = ?";

            $valor = $documento;
        }

        $stmt = self::$connection->prepare($sql);

        $stmt->bindValue(1, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    // ==========================================
    // LISTAR TODOS OS USUARIOS
    // ==========================================

    public function listarTodos(): array
    {
        $sql = "SELECT
                    id_usuario,
                    nome,
                    email,
                    documento,
                    status,
                    perfil_id
                FROM usuarios
                ORDER BY id_usuario";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ==========================================
    // CADASTRAR USUARIO
    // ==========================================

    public function cadastrar(array $dados): int
    {
        $sql = "INSERT INTO usuarios
                    (nome, email, documento, senha, status, perfil_id)
                VALUES
                    (:nome, :email, :documento, :senha, :status, :perfil_id)";

        $stmt = self::$connection->prepare($sql);

        $stmt->execute([
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':documento' => $dados['documento'] ?? null,
            ':senha' => $dados['senha'],
            ':status' => $dados['status'] ?? 'Ativo',
            ':perfil_id' => $dados['perfil_id']
        ]);

        return (int) self::$connection->lastInsertId();
    }


    // ==========================================
    // ATUALIZAR USUARIO
    // ==========================================

    public function atualizar(int $idUsuario, array $dados): bool
    {
        $sql = "UPDATE usuarios
                SET
                    nome = :nome,
                    email = :email,
                    documento = :documento,
                    status = :status,
                    perfil_id = :perfil_id
                WHERE id_usuario = :id_usuario";

        $stmt = self::$connection->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':documento' => $dados['documento'] ?? null,
            ':status' => $dados['status'],
            ':perfil_id' => $dados['perfil_id'],
            ':id_usuario' => $idUsuario
        ]);
    }
}
