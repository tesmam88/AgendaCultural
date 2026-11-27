<?php

namespace App\Config;

use PDO;
use PDOException;
use RuntimeException;

class Database
{
    // ==========================================
    // CONEXÃO COM O BANCO DE DADOS
    // ==========================================

    public static function conectar(): PDO
    {
        try {

            return new PDO(
                "mysql:host=localhost;dbname=agenda_cultural;charset=utf8mb4",
                "root",
                "",
                [
                    // Define que os erros do PDO serão tratados como exceções
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    // Define o retorno das consultas como arrays associativos
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                    // Desativa a emulação de prepared statements
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );

        } catch (PDOException $e) {

            // Registra os detalhes do erro no log do servidor
            error_log($e->getMessage());

            // Apresenta uma mensagem genérica, sem revelar dados sensíveis
            throw new RuntimeException(
                "Não foi possível conectar ao banco de dados."
            );
        }
    }
}
