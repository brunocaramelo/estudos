<?php
class ItemNotaBuilder 
{
    private $descricao;
    private $valor;

    public function comDescricao($descricao) 
    {
    $this->descricao = $descricao;
    return $this;
    }

    public function comValor($valor) 
    {
    $this->valor = $valor;
    return $this;
    }

    public function build() 
    {
    return new ItemNota($this->descricao, $this->valor);
    }
}