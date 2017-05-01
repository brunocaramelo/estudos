<?php

namespace Estoque;

use Zend\ServiceManager\Factory\InvokableFactory;
use Estoque\Controller\Factory\AuthenticationServiceFactory;
 
    
return [
   'session_config' => [
        'cookie_lifetime' => 60*60*1,
        'gc_maxlifetime' => 60*60*24*30,
        ],
    'session_manager' => [
        'validators' => [
                            \Zend\Session\Validator\RemoteAddr::class,
                            \Zend\Session\Validator\HttpUserAgent::class,
                            ],
                         ],
    'session_storage' => [
        'type' => \Zend\Session\Storage\SessionArrayStorage::class,
    ],

     'service_manager' => [
        'factories' => [
             \Zend\Authentication\AuthenticationService::class => Controller\Factory\AuthenticationServiceFactory::class,
            
        ],
      ],
    'controllers' => [
        // 'invokables' => [
        //      'Estoque\Controller\UsuarioController' => 'Estoque\Controller\UsuarioController',    
        // ],
        'factories' => [
             Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
             Controller\UsuarioController::class => Controller\Factory\UsuarioControllerFactory::class,
             
        ],
        //fim factories
    ],
    //fim controllers
    'router' => [
        'routes' => [
            'home' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller'    => Controller\IndexController::class,
                        'action'        => 'index',
                    ],
                ],
                
                'may_terminate' => true,
                'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],
                ],
            'lista_produtos' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/produtos[/:page]',
                    'defaults' => [
                        'controller'    => Controller\IndexController::class,
                        'action'        => 'index',
                        'page'        => '1',
                    ],
                ],
                
                'may_terminate' => true,
                'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],
                ],
                //fim home

                'cadastrar' => [
                    'type'    => 'Literal',
                    'options' => [
                        'route'    => '/cadastrar',
                        'defaults' => [
                            'controller'    => Controller\IndexController::class,
                            'action'        => 'cadastrar',
                        ],
                    ],
                    
                    'may_terminate' => true,
                    'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],

                ],
                
                'editar_produto' => [
                    'type'    => 'Segment',
                    'options' => [
                        'route'    => '/editar-produto[/:id]',
                        'defaults' => [
                            'controller'    => Controller\IndexController::class,
                            'action'        => 'editarProduto',
                            'id'        => '[0-9]*',
                        ],
                    ],
                    
                    'may_terminate' => true,
                    'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],

                ],
                //fim cadastrar
                'confirmar_remover_produto' => [
                    'type'    => 'Segment',
                    'options' => [
                        'route'    => '/confirmar-remover-produto[/:id]',
                        'defaults' => [
                            'controller'    => Controller\IndexController::class,
                            'action'        => 'removerProduto',
                            'id'        => '[0-9]*',
                        ],
                    ],
                    
                    'may_terminate' => true,
                    'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],

                ],
                //fim remover-produto
               
                //fim cadastrar
                'contato' => [
                    'type'    => 'Literal',
                    'options' => [
                        'route'    => '/contato',
                        'defaults' => [
                            'controller'    => Controller\IndexController::class,
                            'action'        => 'contato',
                            'id'        => '[0-9]*',
                        ],
                    ],
                    
                    'may_terminate' => true,
                    'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],

                ],
                //fim contato
                'login' => [
                    'type'    => 'Literal',
                    'options' => [
                        'route'    => '/login',
                        'defaults' => [
                            'controller'    => Controller\UsuarioController::class,
                            'action'        => 'index',
                        ],
                    ],
                    
                    'may_terminate' => true,
                    'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],

                ],
                //fim usuario
                'logout' => [
                    'type'    => 'Literal',
                    'options' => [
                        'route'    => '/logout',
                        'defaults' => [
                            'controller'    => Controller\UsuarioController::class,
                            'action'        => 'logout',
                        ],
                    ],
                    
                    'may_terminate' => true,
                    'child_routes' => [
                        // You can place additional routes that match under the
                        // route defined above here.
                    ],

                ],
                //fim usuario
               
            ],
            //fim route
        ],
        //fim routes
     'view_manager' => [
        'template_path_stack' => [
            'Estoque' => __DIR__ . '/../view',
        ],

        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
    ],
    
    'view_helpers' => [
            'factories'=> [
                View\Helper\FlashHelper::class => InvokableFactory::class,   
                View\Helper\PaginationHelper::class => InvokableFactory::class,   
            ],
            'aliases' =>[   
                'flashHelper' => View\Helper\FlashHelper::class,
                'paginationPadraoHelper' => View\Helper\PaginationHelper::class
            ]
    ],
    
    'doctrine' => [
    'driver' => [
        __NAMESPACE__ . '_driver' => [
        'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => [__DIR__ . '/../src/Entity']
        ],
        'orm_default' => [
            'drivers' => [
            __NAMESPACE__ .  '\Entity' => __NAMESPACE__ . '_driver'
            ]
          ],
        'authentication'=> [
                            'orm_default' => [
                                            'object_manager' => 'Doctrine\ORM\EntityManager',
                                            'identify_class' => 'Estoque\Entity\Usuario',
                                            'identify_property' => 'email',
                                            'credential_property' => 'senha',
                                            ]
                            ]
        ]
    ],


];

