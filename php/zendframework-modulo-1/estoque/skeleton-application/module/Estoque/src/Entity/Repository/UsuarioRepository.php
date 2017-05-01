<?php

namespace Estoque\Entity\Repository;

use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\Tools\Pagination\Paginator;

class UsuarioRepository extends EntityRepository{
  

  public function getUsuarioPorEmailSenha($email,$senha){

         $em = $this->getEntityManager();

        return $em->getRepository('Estoque\Entity\Usuario')
                                        ->findBy(
                                                    array('email'=> $email,'senha' => $senha)
                                                );
  }

}