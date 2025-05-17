<?php

class Produto
{
    public ?int    $id;
    public string  $codigo;
    public string  $nome;
    public ?string $descricao;
    public float   $valor;
    public int     $quantidade;
    public bool  $status_do_produto;     

    public function __construct(
        string  $codigo,
        string  $nome,
        ?string $descricao,
        float   $valor,
        int     $quantidade,
        bool    $status_do_produto = true,
        ?int    $id     = null
    ) {
        $this->codigo     = $codigo;
        $this->nome       = $nome;
        $this->descricao  = $descricao;
        $this->valor      = $valor;
        $this->quantidade = $quantidade;
        $this->status_do_produto     = $status_do_produto;
        $this->id         = $id;
    }
}