<?php

class Produto
{
    public ?int    $id;
    public string  $codigo;
    public string  $nome;
    public ?string $descricao;
    public float   $valor;
    public int     $quantidade;
    public bool  $status;     

    public function __construct(
        string  $codigo,
        string  $nome,
        ?string $descricao,
        float   $valor,
        int     $quantidade,
        bool    $status = true,
        ?int    $id     = null
    ) {
        $this->codigo     = $codigo;
        $this->nome       = $nome;
        $this->descricao  = $descricao;
        $this->valor      = $valor;
        $this->quantidade = $quantidade;
        $this->status     = $status;
        $this->id         = $id;
    }
}