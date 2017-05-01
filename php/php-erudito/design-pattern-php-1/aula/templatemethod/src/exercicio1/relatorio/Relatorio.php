<?php

interface Relatorio{

    public function __construct(Conteudo $conteudo);
    public function imprime();

}