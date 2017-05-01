<?php

function carregaClassesPath($className){
    require getcwd().'/'.$className.'.php';
}

spl_autoload_register('carregaClassesPath');