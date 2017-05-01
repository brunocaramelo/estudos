<?php

	class Lance {
		private $usuario;
		private $valor;
		
		function __construct(Usuario $usuario,$valor) {
			if( $valor  < 1  ){
           		 throw new InvalidArgumentException('O valor do lance deve ser pelo menos 1');
       		}
			   
			$this->usuario = $usuario;
			$this->valor = $valor;
		}
		
		public function getUsuario() {
			return $this->usuario;
		}
		
		public function getValor() {
			return $this->valor;
		}
	}
