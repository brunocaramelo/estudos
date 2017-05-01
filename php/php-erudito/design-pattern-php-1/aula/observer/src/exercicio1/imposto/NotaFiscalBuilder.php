<?php

class NotaFiscalBuilder{

private $empresa;
private $cnpj;
private $itens;
private $valorBruto;
private $valorImpostos;
private $observacoes;
private $dataEmissao;

private $acoesAoGerar = null;

public function __construct($acaoParam = null){
   
    $this->acoesAoGerar[] = $acaoParam;
   
    $this->valorBruto = 0;
    $this->valorImpostos = 0;
    $this->itens = [];
}

public function comEmpresa($empresa){
    $this->empresa = $empresa;    
}

public function comCnpj($cnpj){
    $this->cnpj = $cnpj;    
}

public function addItem(ItemNota $novoItem){
    $this->itens[] = $novoItem;
    $this->valorBruto += $novoItem->getValor();
    $this->valorImpostos += $novoItem->getValor() * 0.2;
}

public function addAcao(AcoesAoGerarNota $acaoParam){
    $this->acoesAoGerar[] = $acaoParam;
}

public function comObservacao($obs){
    $this->observacoes = $obs;
}

public function naData( $data = null ){
    
    $this->dataEmissao = date('Y-m-d H:i:s');
    
    if(! is_null($data)) {
        $this->dataEmissao = $data;
    } 

}

public function build(){
    $nf = new NotaFiscal($this->empresa,$this->cnpj,$this->itens,$this->valorBruto,$this->valorImpostos,$this->observacoes,$this->dataEmissao);
    
    if(count($this->acoesAoGerar) > 0 ){
        foreach($this->acoesAoGerar as $acaoClass){
            if($acaoClass instanceof AcoesAoGerar) $acaoClass->executa($nf);
        }
    }

    return $nf;

}

}