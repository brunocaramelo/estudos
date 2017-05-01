<?php

class Impressora{
    
    private $numero;

    public function visitaNumero(Numero $numero){
       echo  $numero->getNumero();
    }
   
    public function visitaSoma(Soma $soma){
       echo '(';
       $soma->getEsquerda()->aceita($this);
       echo ' + ';
       echo $soma->getDireita()->aceita($this).')';
    }
    
    public function visitaSubtracao(Subtracao $subtracao){
       echo '(';
       $subtracao->getEsquerda()->aceita($this);
       echo ' - ';
       echo $subtracao->getDireita()->aceita($this).')';
    }

    public function visitaMultiplicacao(Multiplicacao $multiplicacao){
        echo '(';
       $multiplicacao->getEsquerda()->aceita($this);
       echo ' * ';
       echo $multiplicacao->getDireita()->aceita($this).')';
    }
    
    public function visitaDivisao(Divisao $divisao){
       echo '(';
       $divisao->getEsquerda()->aceita($this);
       echo ' / ';
       echo $divisao->getDireita()->aceita($this).')';
    }
    
    public function visitaRaizQuadrada(RaizQuadrada $raiz){
        echo '('.$raiz->getNumero()->avalia().')';
    }

}