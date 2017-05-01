<?php
class SemDesconto implements Desconto{
    
    private $proximoDesconto;

    public function desconto(Orcamento $orcamento){
        return 0;
    }
    
    public function setProximo(Desconto $proximo){
       return null;
    }

}