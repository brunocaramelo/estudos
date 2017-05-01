<?php

namespace Estoque\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Zend\InputFilter\InputFilterAwareInterface;
use \Zend\InputFilter\InputFilterInterface;
use \Zend\InputFilter\InputFilter;

/** @ORM\Entity(repositoryClass="\Estoque\Entity\Repository\ProdutoRepository")
*/

class Produto implements InputFilterAwareInterface{
    /** @ORM\Id
     @ORM\Column(type="integer")
     @ORM\GeneratedValue(strategy="AUTO")
     */
     private $id;
    /**  @ORM\Column(type="string")
     */
     private $nome;
     /** @ORM\Column(type="decimal",scale=2)
     */
    private $preco;
    /** @ORM\Column(type="string")
    */
    private $descricao;
     /** @ORM\ManyToOne(targetEntity="Estoque\Entity\Categoria",inversedBy="produto")
     *   @ORM\JoinColumn(name="categoria_id",referencedColumnName="id",nullable=false)
    */
    private $categoria;
    
    public function getId(){
        return $this->id;
    }    
    public function getNome(){
        return $this->nome;
    }    

    public function getPreco(){
        return $this->preco;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setPreco($preco){
        $this->preco = $preco ;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setCategoria(Categoria $categoria){
        $this->categoria = $categoria;
    }

    public function setInputFilter( InputFilterInterface $inputFilter ){
        throw new Exception('nao invoque este metodo');
    }

    public function getInputFilter(){
        
        $inputFilter = new InputFilter();
        
        $inputFilter->add([
                            'name' => 'nome',    
                            'require' => true,    
                            'validators' => [
                                                [
                                                    'name' => 'StringLength',
                                                    'options' => [
                                                                    'min' => 3,
                                                                    'max' => 100,
                                                                    'messages' => ['stringLengthTooShort' => 'Valor menor que o permitido > 3', 
                                                                                    'stringLengthTooLong' => 'Valor maior que o permitido < 100']
                                                                    
                                                                ],
                                                ],
                                                [
                                                 'name' => 'NotEmpty' ,
                                                    'options' => [
                                                                'messages' => [
                                                                    'isEmpty' => 'Preencha o nome'
                                                                    ]
                                                                ],
                                                ]
                                            ]   
                            ]);

        $inputFilter->add([
                            'name' => 'preco',    
                            'require' => true,    
                            'validators' => [
                                                [
                                                    'name' => 'StringLength',
                                                    'options' => [
                                                                    'min' => 2,
                                                                    'max' => 20,
                                                                    'messages' => ['stringLengthTooShort' => 'Valor menor que o permitido > 2', 
                                                                                    'stringLengthTooLong' => 'Valor maior que o permitido < 20']
                                                                 
                                                                ]
                                                    ],
                                                    [
                                                        'name' => 'NotEmpty' ,
                                                        'options' => [
                                                                    'messages' => [
                                                                        'isEmpty' => 'Preencha o preco'
                                                                        ]
                                                                    ]
                                                    
                                                    ]
                                             ]    
                            ]);

        $inputFilter->add([
                    'name' => 'descricao',    
                    'require' => true,    
                    'validators' => [
                                        [
                                            'name' => 'StringLength',
                                            'options' => [
                                                            'min' => 20,
                                                            'max' => 200,
                                                            'messages' => ['stringLengthTooShort' => 'Valor menor que o permitido > 20', 
                                                                                    'stringLengthTooLong' => 'Valor maior que o permitido < 200']
                                                                 
                                                        ]
                                        ],
                                        [
                                            'name' => 'NotEmpty' ,
                                            'options' => [
                                                        'messages' => [
                                                            'isEmpty' => 'Preencha o preco'
                                                            ]
                                                        ]
                                        
                                        ]

                                    ]    
                    ]);

        $inputFilter->add([
                    'name' => 'categoria',    
                    'require' => true,    
                    'validators' => [
                                          [
                                            'name' => 'NotEmpty' ,
                                            'options' => [
                                                        'messages' => [
                                                            'isEmpty' => 'Selecione uma categoria'
                                                            ]
                                                        ]
                                        
                                        ]

                                    ]    
                    ]);

            return $inputFilter;
    }
    
}

