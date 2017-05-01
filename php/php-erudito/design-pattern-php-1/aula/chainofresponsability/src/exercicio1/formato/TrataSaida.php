<?php
class TrataSaida{

    public function responde(Requisicao $req,Conta $conta){
        
        $respostaXml = new XML();        
        $respostaCsv = new CSV();        
        $respostaPorcento = new Porcento();        
        
        $respostaXml->setProximo($respostaCsv);        
        $respostaCsv->setProximo($respostaPorcento);        
        $respostaPorcento->setProximo($respostaXml);        
        
        $valorDesconto = $respostaXml->responde($req,$conta);

        return $valorDesconto;

    }

}