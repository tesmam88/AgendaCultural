<?php

namespace App\Models;

/**
 * Classe Usuario
 *
 * Representa um usuário do sistema Agenda Cultural (tabela `usuarios`).
 * Será utilizada futuramente no cadastro e na autenticação.
 */
class Usuario
{
    // ==========================================
    // PROPRIEDADES (todas privadas)
    // ==========================================
    private ?int $id_usuario = null;
    private string $nome = '';
    private string $email = '';
    private ?string $documento = null;
    private string $senha = '';
    private string $status = 'Ativo';
    private int $perfil_id = 0;

    // ==========================================
    // GETTERS: retornam os valores
    // ==========================================
    public function getIdUsuario(): ?int
    {
        return $this->id_usuario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPerfilId(): int
    {
        return $this->perfil_id;
    }

    // ==========================================
    // SETTERS: modificam os valores
    // ==========================================
    public function setIdUsuario(?int $id): void
    {
        $this->id_usuario = $id;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setDocumento(?string $documento): void
    {
        $this->documento = $documento;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setPerfilId(int $perfil_id): void
    {
        $this->perfil_id = $perfil_id;
    }
}