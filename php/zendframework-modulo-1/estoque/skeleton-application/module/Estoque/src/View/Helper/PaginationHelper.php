<?php

namespace Estoque\View\Helper;

use Zend\View\Helper\AbstractHelper;

class PaginationHelper extends AbstractHelper{

    public function __invoke( $itens , $qtdPagina , $url ){
        $this->url = $url;
        $this->totalItens = $itens->count();
        $this->qtdPagina = $qtdPagina;
        
        return $this;

    }

    public function render(){

        $count = 0;
        $totalPaginas = ceil( $this->totalItens / $this->qtdPagina );

        $html = "<ul class='nav nav-pills'>";

        while( $count < $totalPaginas ){
            $count++;
            $html.= "<li><a href='{$this->url}/{$count}' >{$count}</a></li>";
        }

        $html.="</ul>";

        return $html;
    }

}