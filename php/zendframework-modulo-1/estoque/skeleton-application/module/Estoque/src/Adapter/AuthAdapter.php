<?php

namespace Estoque\Adapter;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

use Estoque\Entity\Usuario;


class AuthAdapter implements AdapterInterface
{
    /**
     * User email.
     * @var string 
     */
    private $isValid = false;

    private $errorMessage = false;

    private $email;
    
    /**
     * Password
     * @var string 
     */
    private $password;
    
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager 
     */
    private $entityManager;
        
    /**
     * Constructor.
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * Sets user email.     
     */
    public function setIdentifyValue($email) 
    {
        $this->email = $email;        
    }
    
    /**
     * Sets password.     
     */
    public function setCredentialValue($password) 
    {   
        $passwordTratado = (string)$password;
        $this->password = sha1($passwordTratado);        
    }
    
    /**
     * Performs an authentication attempt.
     */
    public function authenticate()
    {                
        $user = $this->entityManager->getRepository('Estoque\Entity\Usuario')
                                        ->getUsuarioPorEmailSenha( $this->email , $this->password );
                                      
        if ( $user != null ) {

            $this->isValid = true;
           
            return new Result(
                    Result::SUCCESS, 
                    $this->email, 
                    ['Bem vindo , '.$this->email ]);    

        }   
        
        $this->errorMessage = 'Login ou senha nao conferem';
        
         return new Result(
                Result::FAILURE_CREDENTIAL_INVALID, 
                null, 
                ['login ou senha nao conferem']);           
    }


    public function getErrorMessage(){
        return $this->errorMessage;
    }
}
