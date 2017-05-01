<?php
class XML implements Resposta{

    private $formatoEsperado = 'XML';
    private $proximoDesconto;
    
    public function responde(Requisicao $req, Conta $conta){
        
        if($req->getFormato() === $this->formatoEsperado ){
            return '<conta><titular>'.$conta->getTitular().'</titular><saldo>'.$conta->getSaldo().'</saldo></conta>';
        }

        return $this->proximoDesconto->responde($req,$conta);

    }

    public function setProximo(Resposta $resposta){
         $this->proximoDesconto = $resposta;
    }

}