<?php

namespace Estoque\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Estoque\Controller\IndexController;
use Zend\Authentication\AuthenticationService;
use Estoque\Controller\Factory\AuthenticationServiceFactory;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, 
                     $requestedName, array $options = null){
                   
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        $authService = AuthenticationServiceFactory::getInstance($container);

        return new IndexController( $entityManager , $authService );
    }
}