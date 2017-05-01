<?php

namespace Estoque\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity(repositoryClass="\Estoque\Entity\Repository\CategoriaRepository")
*/

class Categoria{
 /** @ORM\Id
     @ORM\Column(type="integer")
     @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**  @ORM\Column(type="string")
     */
    private $nome;  
    /** @ORM\OneToMany(targetEntity="Estoque\Entity\Produto",mappedBy="categoria")
    */
    private $produto;
   
    public function ___construct( $id , $nome = null ){
        $this->id = $id;
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }    

    public function getNome(){
        return $this->nome;
    }    

    public function setNome($nome){
        $this->nome = $nome;
    }

}