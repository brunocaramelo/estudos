<?php

class DezOuVintePorcento implements RegraCalculo{
    
 public function  calcula( Funcionario $funcionario ){
    
    if( $funcionario->getSalario() > 2000 ){
        return $funcionario->getSalario() * 0.70;
    }

   return $funcionario->getSalario() * 0.80;
     
 }   

}