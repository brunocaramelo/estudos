<?php

namespace Estoque\Entity\Repository;

use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\Tools\Pagination\Paginator;

class CategoriaRepository extends EntityRepository{
  
    public function getById( int  $id ){
            
            $em = $this->getEntityManager();
            return $em->find('Estoque\Entity\Categoria',$id);
        
    }

}