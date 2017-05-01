<?php

class NotaFiscal implements Fatura{
        
    private $empresa='ss';
    private $cnpj;
    private $itens;
    private $valorBruto;
    private $valorImpostos;
    private $observacoes;
    private $dataEmissao;
    private $pagamentos;
    private $pago;


    public function __construct( $empresa , $cnpj , $listaItens , $valorBruto , $valorImpostos , $observacoes , $dataEmissao ){

        $this->empresa = $empresa;
        $this->cnpj = $cnpj;
        $this->itens = $listaItens;
        $this->valorBruto = $valorBruto;
        $this->valorImpostos = $valorImpostos;
        $this->observacoes = $observacoes;
        $this->dataEmissao = $dataEmissao;
        $this->pago = false;

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

    public function addPagamento( Pagamento $pagamento ){
        $this->pagamentos[] = $pagamento;

        if( $this->totalPagamentos() >= $this->valorBruto ){
            $this->pago = true;
        }
    }

    private function totalPagamentos(){
    
        $total = 0;

        foreach( $this->pagamentos as $pagamento ){
            
            $total += $pagamento->getValor();
        
        }
        
        return $total;

    }

    public function isPago(){
        return $this->pago;
    }

    public function calculaImposto(){
        return 999;
    }

}