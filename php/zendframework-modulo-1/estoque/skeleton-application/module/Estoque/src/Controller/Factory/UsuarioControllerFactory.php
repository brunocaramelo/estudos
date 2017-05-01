<?php

namespace Estoque\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Estoque\Controller\UsuarioController;
use Zend\Authentication\AuthenticationService;
use Estoque\Controller\Factory\AuthenticationServiceFactory;


class UsuarioControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, 
                     $requestedName, array $options = null){
                         
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
       
        $authService =  $this->setAuthenticate($container);

        return new UsuarioController($entityManager, $authService );

    }


    private function setAuthenticate($container){
        
       return AuthenticationServiceFactory::getInstance($container);

    }
}