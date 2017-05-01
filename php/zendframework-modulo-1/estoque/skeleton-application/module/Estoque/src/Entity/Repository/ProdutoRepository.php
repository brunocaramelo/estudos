<?php

namespace Estoque\Entity\Repository;

use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\Tools\Pagination\Paginator;


class ProdutoRepository extends EntityRepository{
  
    public function getListaPaginacao( $qtdPorPagina = 2 , $offset ){
        
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('p')
           ->from('Estoque\Entity\Produto','p')
           ->setMaxResults($qtdPorPagina)
           ->setFirstResult($offset)
           ->orderBy('p.id');
        
        $query = $qb->getQuery();

        $paginator = new Paginator( $query );
        
        return $paginator;
    }

    public function getById( int  $id ){
        
        $em = $this->getEntityManager();
        return $em->find('Estoque\Entity\Produto',$id);
    
    }

    public function removeById( int  $id ){
        
      $produto = $this->getById($id);
      $this->remove($produto);

    }

    public function remove( \Estoque\Entity\Produto $produto ){
        
        $em = $this->getEntityManager();

        $em->remove($produto);
        $em->flush();
    }


    public function save( \Estoque\Entity\Produto $produto , array $produtoParam ){
        
        $em =  $this->getEntityManager();
       
        $produto->setNome( $produtoParam['nome'] );
        $produto->setPreco( $produtoParam['preco'] );
        $produto->setDescricao( $produtoParam['descricao'] );
        $produto->setCategoria( $em->getRepository('Estoque\Entity\Categoria')->getById( $produtoParam['categoria'] ) ) ;
        
        $em->persist($produto);
        $em->flush();
        
    }


}