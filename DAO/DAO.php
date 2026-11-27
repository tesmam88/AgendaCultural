
<?php

namespace App\DAO;

use PDO;
use App\Config\Database;

abstract class DAO
{
    // ==========================================
    // CONEXÃO COMPARTILHADA
    // ==========================================

    protected static ?PDO $connection = null;

    public function __construct()
    {
        // Cria a conexão somente se ela ainda não existir
        if (self::$connection === null) {

            self::$connection = Database::conectar();

        }
    }
}
