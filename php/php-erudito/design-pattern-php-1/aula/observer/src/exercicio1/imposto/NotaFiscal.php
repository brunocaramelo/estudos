<?php

class NotaFiscal {
    
private $empresa='ss';
private $cnpj;
private $itens;
private $valorBruto;
private $valorImpostos;
private $observacoes;
private $dataEmissao;


public function __construct($empresa,$cnpj,$listaItens,$valorBruto,$valorImpostos,$observacoes,$dataEmissao){

    $this->empresa = $empresa;
    $this->cnpj = $cnpj;
    $this->itens = $listaItens;
    $this->valorBruto = $valorBruto;
    $this->valorImpostos = $valorImpostos;
    $this->observacoes = $observacoes;
    $this->dataEmissao = $dataEmissao;

}

public function getEmpresa(){
    return $this->empresa;
}

public function getCnpj(){
    return $this->cnpj;
}

public function getValorBruto(){
    return $this->valorBruto;
}
public function getValorImpostos(){
    return $this->valorImpostos;
}

}