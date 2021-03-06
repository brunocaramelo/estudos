<?php
class CSV implements Resposta{

   private $formatoEsperado = 'CSV';
   private $proximoDesconto;
    
    public function responde(Requisicao $req, Conta $conta){
        
        if($req->getFormato() === $this->formatoEsperado ){
            return $conta->getTitular().';'.$conta->getSaldo().";\n";
        }

        return $this->proximoDesconto->responde($req,$conta);

    }

    public function setProximo(Resposta $resposta){
         $this->proximoDesconto = $resposta;
    }


}