<?php

namespace Estoque\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity(repositoryClass="\Estoque\Entity\Repository\UsuarioRepository")
*/
class Usuario{
    /** @ORM\Id
     @ORM\Column(type="integer")
     @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**  @ORM\Column(type="string")
     */
    private $email;
    /**  @ORM\Column(type="string")
     */
    private $senha;

    public function getId(){
        return $this->id;
    }    

    public function getEmail(){
        return $this->email;
    }    

    public function getSenha(){
        return $this->senha;
    }

    public function setEmail( $email ){
        $this->email = $email;
    }
    
    public function setSenha( $senha ){
        $this->senha = $senha ;
    }

}