<?php
class Finalizado implements EstadoOrcamento{

     public function aplicaDescontoExtra(Orcamento $orcamento) {
     }

    public function aplica( Orcamento $orcamento ){

       throw new Exception('Finalizado , nao recebe desconto');
    
    }


     public function aprova( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi finalizado, nao pode ser aprovado');
    }

    public function reprova( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi finalizado, nao pode ser reprovado');
    }

    public function finaliza( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi finalizado');
    }
    


}