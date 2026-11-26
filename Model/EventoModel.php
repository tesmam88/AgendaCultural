<?php

namespace App\Model;

class EventoModel
{
    // ==========================================
    // PROPRIEDADES
    // ==========================================

    private ?int $idEvento;
    private string $nome;
    private string $descricao;
    private string $dataInicio;
    private string $horaInicio;
    private string $dataFim;
    private string $horaFim;
    private string $local;
    private string $endereco;
    private string $ingresso;
    private ?float $valor;
    private ?string $imagemUrl;
    private string $status;
    private ?string $motivoReprovacao;
    private int $organizadorId;
    private int $categoriaId;
    private ?int $curadorId;

    // ==========================================
    // CONSTRUTOR
    // ==========================================

    public function __construct(
        ?int $idEvento = null,
        string $nome = '',
        string $descricao = '',
        string $dataInicio = '',
        string $horaInicio = '',
        string $dataFim = '',
        string $horaFim = '',
        string $local = '',
        string $endereco = '',
        string $ingresso = '',
        ?float $valor = null,
        ?string $imagemUrl = null,
        string $status = 'PENDENTE',
        ?string $motivoReprovacao = null,
        int $organizadorId = 0,
        int $categoriaId = 0,
        ?int $curadorId = null
    ) {
        $this->idEvento = $idEvento;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dataInicio = $dataInicio;
        $this->horaInicio = $horaInicio;
        $this->dataFim = $dataFim;
        $this->horaFim = $horaFim;
        $this->local = $local;
        $this->endereco = $endereco;
        $this->ingresso = $ingresso;
        $this->valor = $valor;
        $this->imagemUrl = $imagemUrl;
        $this->status = $status;
        $this->motivoReprovacao = $motivoReprovacao;
        $this->organizadorId = $organizadorId;
        $this->categoriaId = $categoriaId;
        $this->curadorId = $curadorId;
    }

    // ==========================================
    // GETTERS
    // ==========================================

    public function getIdEvento(): ?int
    {
        return $this->idEvento;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getDataInicio(): string
    {
        return $this->dataInicio;
    }

    public function getHoraInicio(): string
    {
        return $this->horaInicio;
    }

    public function getDataFim(): string
    {
        return $this->dataFim;
    }

    public function getHoraFim(): string
    {
        return $this->horaFim;
    }

    public function getLocal(): string
    {
        return $this->local;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function getIngresso(): string
    {
        return $this->ingresso;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function getImagemUrl(): ?string
    {
        return $this->imagemUrl;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getMotivoReprovacao(): ?string
    {
        return $this->motivoReprovacao;
    }

    public function getOrganizadorId(): int
    {
        return $this->organizadorId;
    }

    public function getCategoriaId(): int
    {
        return $this->categoriaId;
    }

    public function getCuradorId(): ?int
    {
        return $this->curadorId;
    }

    // ==========================================
    // SETTERS
    // ==========================================

    public function setIdEvento(?int $idEvento): void
    {
        $this->idEvento = $idEvento;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setDataInicio(string $dataInicio): void
    {
        $this->dataInicio = $dataInicio;
    }

    public function setHoraInicio(string $horaInicio): void
    {
        $this->horaInicio = $horaInicio;
    }

    public function setDataFim(string $dataFim): void
    {
        $this->dataFim = $dataFim;
    }

    public function setHoraFim(string $horaFim): void
    {
        $this->horaFim = $horaFim;
    }

    public function setLocal(string $local): void
    {
        $this->local = $local;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function setIngresso(string $ingresso): void
    {
        $this->ingresso = $ingresso;
    }

    public function setValor(?float $valor): void
    {
        $this->valor = $valor;
    }

    public function setImagemUrl(?string $imagemUrl): void
    {
        $this->imagemUrl = $imagemUrl;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setMotivoReprovacao(?string $motivoReprovacao): void
    {
        $this->motivoReprovacao = $motivoReprovacao;
    }

    public function setOrganizadorId(int $organizadorId): void
    {
        $this->organizadorId = $organizadorId;
    }

    public function setCategoriaId(int $categoriaId): void
    {
        $this->categoriaId = $categoriaId;
    }

    public function setCuradorId(?int $curadorId): void
    {
        $this->curadorId = $curadorId;
    }
}
