<?php

namespace Estoque\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Estoque\Entity\Usuario;
use Zend\Authentication\AuthenticationService;

class UsuarioController extends AbstractActionController{
     
     
    public function __construct($entityManager,  $authService)
    {
        $this->entityManager = $entityManager;
        $this->authService = $authService;
    }

    public function indexAction(){
       
       $this->efetuarLogin();
        return [];
    
    }

    private function efetuarLogin(){
        
        if( $this->request->isPost() === false ){
                return false;
        }

        $login = $this->request->getPost('login');
        $authService = $this->authService;
        
        $authAdapter = $authService->getAdapter();
       
        $authAdapter->setIdentifyValue($login['email']);
        $authAdapter->setCredentialValue($login['senha']);

        $authResult = $authService->authenticate();
       
        if( $authResult->isValid() === true ){
            
           $this->flashMessenger()->addMessage($authResult->getMessages()[0]);

           return  $this->redirect()->toUrl('/');
        }

         $this->flashMessenger()->addErrorMessage($authResult->getMessages()[0]);

         return  $this->redirect()->toUrl('/login');
    }

    public function logoutAction(){

       $this->authService->clearIdentity();
       
       return  $this->redirect()->toUrl('/login');

    }

}