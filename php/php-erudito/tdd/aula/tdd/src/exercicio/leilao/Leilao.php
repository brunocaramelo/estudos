<?php

	class Leilao {
		private $descricao;
		private $lances;
		
		function __construct($descricao) {
			$this->descricao = $descricao;
			$this->lances = array();
		}
		
		public function propoe(Lance $lance) {
            
            if( $this->getUltimoLance() instanceof Lance &&
                $this->getUltimoLance()->getUsuario() === $lance->getUsuario() 
                ){

                return false;
            }

            if( count( $this->getLancesPorUsuario( $lance->getUsuario() ) ) > 5 ){
                return false;
            }
            
			$this->lances[] = $lance;
		}

		public function getDescricao() {
			return $this->descricao;
		}
		
        public function getUltimoLance() {
            
            if(!empty($this->lances) ){
                return  $this->lances[count($this->lances) -1];
            }

            return [];
		}
        
        public function getUltimoLancePorUsuario(Usuario $usuario) {
            
           $return = $this->getLancesPorUsuario($usuario);
           
           return array_slice($return,-1);
		}

        public function dobrarLance(Usuario $usuario) {
            
            $return = $this->getUltimoLancePorUsuario($usuario);
            
            if( $return[0] instanceof Lance ){
                
                $valorDobrado =  $return[0]->getValor() * 2;

                $this->propoe(new Lance( $return[0]->getUsuario() ,$valorDobrado) );
                
                return $valorDobrado;
            }

            return 0;
		}
        
        public function getLancesPorUsuario(Usuario $usuario) {
            
            $lancesUsuario = [];
            
            foreach($this->lances as $lanceUser){
                
                if($lanceUser->getUsuario() === $usuario){
                
                    $lancesUsuario[] = $lanceUser;    

                }
            } 
           
            return $lancesUsuario;
		}

		public function getLances() {
			return $this->lances;
		}
	}
