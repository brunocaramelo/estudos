<?php
class FiltroMesmoMes extends Filtro {
      function __construct($outroFiltro = null) {
        parent::__construct($outroFiltro);
      }

      public function filtra($contas) {
        $filtrada = [];
        foreach($contas as $c) {
          
          if($c->getDataAbertura()->format('m') == date("m") && 
            $c->getDataAbertura()->format("Y") == date("Y")) {
              $filtrada[] = $c;
          }
        }

        foreach($this->proximo($contas) as $c)  {
             $filtrada[] = $c;
        }
        return $filtrada;
      }
    }