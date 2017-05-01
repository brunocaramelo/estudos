<?php

class AvaliadorTest extends PHPUnit_Framework_TestCase{

    public function testarDeveLancesOrdemDecrescente(){
        
        $leilao = new Leilao( 'Xbox One' );

        $renan = new Usuario( 'Renan' );
        $caio = new Usuario( 'Caio' );
        $felipe = new Usuario( 'Felipe' );

        $leilao->propoe( new Lance( $renan , 400 ) );
        $leilao->propoe( new Lance( $caio , 300 ) );
        $leilao->propoe( new Lance( $felipe , 100 ) );

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );


        $maiorEsperado = 400;
        $menorEsperado = 100;

        $this->assertEquals( $maiorEsperado , $leiloeiro->getMaiorLance() );
        $this->assertEquals( $menorEsperado , $leiloeiro->getMenorLance() );

    }

    public function testarDeveLancesOrdemCrescente(){
        
        $leilao = new Leilao( 'Xbox One' );

        $renan = new Usuario( 'Renan' );
        $caio = new Usuario( 'Caio' );
        $felipe = new Usuario( 'Felipe' );

        $leilao->propoe( new Lance( $felipe , 120 ) );
        $leilao->propoe( new Lance( $caio , 300 ) );
        $leilao->propoe( new Lance( $renan , 700 ) );

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );


        $maiorEsperado = 700;
        $menorEsperado = 120;

        $this->assertEquals( $maiorEsperado , $leiloeiro->getMaiorLance() );
        $this->assertEquals( $menorEsperado , $leiloeiro->getMenorLance() );

    }
    
    public function testarDeveLanceUnico(){
        
        $leilao = new Leilao( 'Xbox One' );

        $felipe = new Usuario( 'Felipe' );

        $leilao->propoe( new Lance( $felipe , 2000 ) );
       
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );


        $maiorEsperado = 2000;
        $menorEsperado = 2000;

        $this->assertEquals( $maiorEsperado , $leiloeiro->getMaiorLance() );
        $this->assertEquals( $menorEsperado , $leiloeiro->getMenorLance() );

    }
    
    public function testarDeveObterMedia(){
        
        $leilao = new Leilao( 'Xbox One' );

        $renan = new Usuario( 'Renan' );
        $caio = new Usuario( 'Caio' );
        $felipe = new Usuario( 'Felipe' );

        $leilao->propoe( new Lance( $felipe , 200 ) );
        $leilao->propoe( new Lance( $caio , 300 ) );
        $leilao->propoe( new Lance( $renan , 400 ) );

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );


        $mediaEsperado = 300;
        
        $this->assertEquals( $mediaEsperado , $leiloeiro->getMediaLances() );

    }

   public function testarDevePegarOsTresMaiores(){
       
        $renan = new Usuario( 'Renan' );
        $caio = new Usuario( 'Caio' );
        $felipe = new Usuario( 'Felipe' );

        $construtor = new LeilaoBuilder();
        
        $leilao = $construtor->para('Xbox One')
                             ->lance( $felipe , 200 )
                             ->lance( $caio , 250 )
                             ->lance( $caio , 300 )
                             ->lance( $renan , 400 )
                             ->build();

        
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );


        $quantidadeEsperado = 3;
        
        $this->assertEquals( $quantidadeEsperado , count( $leiloeiro->getListaMaioresLances() ) );

    }

    /**
     * @expectedException     InvalidArgumentException
     */
    public function testarDeveRecusarLeilaoSemLance(){
        
        $leilao = new Leilao( 'Macbook pro' );

        $renan = new Usuario( 'Renan' );
        
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia( $leilao );

    }

}