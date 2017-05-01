<?php
class RelatorioComplexo extends TemplateRelatorio{
    
    private $conteudo = null;

    public function __construct(Conteudo $conteudo){
        $this->conteudo = $conteudo;
    }

     protected function gerarCabecalho(){
         return 'CABECALHO ==> Nome: '.$this->conteudo->getNome().' Telefone: '.$this->conteudo->getTeleFone().' ENDERECO:'.$this->conteudo->getEndereco();
     }

    protected  function gerarCorpo(){
        return 'BODY ==> ';
    }

    protected  function gerarRodape(){
        return 'RODAPE ==> Email: '.$this->conteudo->getEmail().' Data:'.$this->conteudo->getData();
    }

}