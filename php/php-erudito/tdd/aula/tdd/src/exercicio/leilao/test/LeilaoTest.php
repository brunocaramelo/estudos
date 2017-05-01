<?php

class LeilaoTest extends PHPUnit_Framework_TestCase{

    public function testarDeveProporUmLance(){
        
        $leilao = new Leilao( 'Macbook pro' );

        $renan = new Usuario( 'Renan' );
        
        $leilao->propoe( new Lance( $renan , 2000 ) );
        
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );

        $this->assertEquals( 1 , count( $leilao->getLances() ) );
        $this->assertEquals( 2000 , $leilao->getLances()[0]->getValor() );

    }

   
    public function testarDeveBarrarDoisLancesSeguidos(){
        
        $leilao = new Leilao( 'Macbook pro' );

        $renan = new Usuario( 'Renan' );
        
        $leilao->propoe( new Lance( $renan , 2000 ) );
        $leilao->propoe( new Lance( $renan , 2100 ) );
        
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );

        $this->assertEquals( 1 , count( $leilao->getLances() ) );
        $this->assertEquals( 2000 , $leilao->getLances()[0]->getValor() );

    }
    
    public function testarDevwDobrarLance(){
        
        $leilao = new Leilao( 'Macbook pro' );

        $renan = new Usuario( 'Renan' );
        
        $leilao->propoe( new Lance( $renan , 2000 ) );
        
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );

        $this->assertEquals( 4000 , $leilao->dobrarLance($renan) );

    }

    public function testarDeveRecusarLeilaoSemLance(){
        //esperando este tipo de excessao : InvalidArgumentException
        $this->setExpectedException('InvalidArgumentException');  

        $leilao = new Leilao( 'Macbook pro' );

        $renan = new Usuario( 'Renan' );
        
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );

    }

    public function testarDeveRecusarLanceZerado(){
        //esperando este tipo de excessao : InvalidArgumentException
        $this->setExpectedException('InvalidArgumentException');  

        $leilao = new Leilao( 'Macbook pro' );
        
        $renan = new Usuario( 'Renan' );

        $leilao->propoe( new Lance( $renan , 0 ) );

    }

}