<?php
class Reprovado implements EstadoOrcamento{
    
    public function aplicaDescontoExtra(Orcamento $orcamento) {
    }

    public function aplica( Orcamento $orcamento ){

       throw new Exception('Reprovado , nao recebe desconto');
    
    }

   public function aprova( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi reprovado, nao pode ser aprovado');
    }

    public function reprova( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi reprovado');
    }

    public function finaliza( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi reprovado, nao pode ser finalizado');
    }
    

}