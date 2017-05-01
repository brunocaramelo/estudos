<?php

interface  EstadoOrcamento{
    
    public function aplicaDescontoExtra(Orcamento $orcamento);
    public function aplica( Orcamento $orcamento );
    public function aprova( Orcamento $orcamento );
    public function reprova( Orcamento $orcamento );
    public function finaliza( Orcamento $orcamento );
    

}