<?php

class EmpresaFacade{

    private static $instance = null;

    private function __construct(){
        //so para ninguem instanciar isso de fora
    }

    public static function getInstance(){

        if(! self::$instance instanceof EmpresaFacade ){

            self::$instance = new EmpresaFacade();
        
        }

        return self::$instance;
        
    }

    public function criarContrato( $nome ,$valor ){
        return new Contrato( $nome , $valor );
    }

    public function criarItem( $nome ,$valor ){
        return new Item( $nome , $valor );
    }

    public function criarPedido( $nome ,$valor ){
        return new Pedido( $nome , $valor );
    }

    public function getStatusService( ){
        return 'o servico esta de pe';
    }

}