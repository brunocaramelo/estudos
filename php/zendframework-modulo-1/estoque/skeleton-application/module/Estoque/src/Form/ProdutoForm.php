<?php 

namespace Estoque\Form;

use Zend\Form\Form;
use Zend\Form\FormLabel;
use Zend\Form\Element;

class ProdutoForm extends Form{

    public function __construct(\Doctrine\ORM\EntityManager $entityManager ){
        
        parent::__construct('form_produto');
        
        $this->add([ 
                  'type'=> 'Hidden',
                  'name' => 'id',
                    'options' => [
                        'label' => 'Nome',
                    ],
                 ]);

        $this->add([ 
                  'type'=> 'Text',
                  'name' => 'nome',
                  'attributes' => [
                   'class' =>   'form-control'
                    ],
                    'options' => [
                        'label' => 'Nome',
                    ],
                 ]);
        
        $this->add([ 
                  'type'=> 'number',
                  'name' => 'preco',
                  'attributes' => [
                   'class' =>   'form-control'
                    ],
                    'options' => [
                        'label' => 'Preço',
                    ],
                 ]);
        
        $this->add([ 
                 'type'=> 'Text',
                  'name' => 'descricao',
                  'attributes' => [
                   'class' =>   'form-control'
                    ],
                    'options' => [
                        'label' => 'Descriçao',
                    ],
                 ]);

        $this->add([ 
                 'type'=> 'DoctrineModule\Form\Element\ObjectSelect',
                  'name' => 'categoria',
                  'attributes' => [
                   'class' =>   'form-control'
                    ],
                    'options' => [
                        'object_manager' => $entityManager,
                        'target_class' => 'Estoque\Entity\Categoria',
                        'property' => 'nome',
                        'empty_property' => 'Escolha uma categoria',
                        'label' => 'Categoria'
                    ],
                 ]);

        $this->add( new Element\Csrf('csrf') );
        



    }
    

}