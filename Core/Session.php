<?php

/**
 * Classe Session
 *
 * Responsável por iniciar, armazenar, consultar, remover e encerrar
 * as sessões de usuários do sistema Agenda Cultural.
 * Todos os métodos são estáticos: use Session::metodo() sem instanciar.
 */
class Session
{
    /**
     * Inicia a sessão PHP, caso ainda não esteja iniciada.
     */
    public static function iniciar(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Armazena uma informação na sessão.
     */
    public static function definir(string $chave, mixed $valor): void
    {
        self::iniciar();
        $_SESSION[$chave] = $valor;
    }

    /**
     * Recupera uma informação da sessão (ou null se não existir).
     */
    public static function obter(string $chave): mixed
    {
        self::iniciar();
        return $_SESSION[$chave] ?? null;
    }

    /**
     * Verifica se uma informação existe na sessão.
     */
    public static function existe(string $chave): bool
    {
        self::iniciar();
        return isset($_SESSION[$chave]);
    }

    /**
     * Remove uma informação específica da sessão.
     */
    public static function remover(string $chave): void
    {
        self::iniciar();
        unset($_SESSION[$chave]);
    }

    /**
     * Encerra a sessão e limpa todos os seus dados.
     */
    public static function encerrar(): void
    {
        self::iniciar();

        // Limpa todos os dados da sessão
        $_SESSION = [];

        // Apaga o cookie da sessão (só é possível se os headers ainda não foram enviados)
        if (ini_get('session.use_cookies') && !headers_sent()) {
            $parametros = session_get_cookie_params();
            setcookie(session_name(), '', [
                'expires'  => time() - 42000,
                'path'     => $parametros['path'],
                'domain'   => $parametros['domain'],
                'secure'   => $parametros['secure'],
                'httponly' => $parametros['httponly'],
                'samesite' => $parametros['samesite'] ?: 'Lax'
            ]);
        }

        // Destrói a sessão no servidor
        session_destroy();
    }
}