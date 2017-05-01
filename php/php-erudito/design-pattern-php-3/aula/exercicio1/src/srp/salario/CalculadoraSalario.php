<?php

class CalculadoraSalario{

    public function calcula( Funcionario $funcionario ){
        
        return $funcionario->getCargo()->getRegra()->calcula($funcionario);

    }

}