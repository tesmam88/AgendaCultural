<?php

require_once __DIR__ . '/Session.php';

class Auth
{
    private const PERFIS_VALIDOS = [
        'admin',
        'curador',
        'organizador'
    ];

    public static function estaAutenticado(): bool
    {
        $usuario = Session::obter('usuario_logado');
        $perfil  = Session::obter('perfil');

        return is_string($usuario)
            && $usuario !== ''
            && is_string($perfil)
            && in_array($perfil, self::PERFIS_VALIDOS, true);
    }

    public static function perfilAtual(): ?string
    {
        if (!self::estaAutenticado()) {
            return null;
        }

        return Session::obter('perfil');
    }

    public static function temPerfil(string $perfil): bool
    {
        return self::estaAutenticado()
            && self::perfilAtual() === $perfil;
    }
}