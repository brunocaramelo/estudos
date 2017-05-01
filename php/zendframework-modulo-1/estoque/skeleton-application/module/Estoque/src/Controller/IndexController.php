<?php

namespace Estoque\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Estoque\Entity\Produto;


use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Transport\SmtpOptions;

use Estoque\Form\ProdutoForm;
use Zend\Math\Rand;

class IndexController extends AbstractActionController{
     
     private $entityManager;
     private $authService;
  
     public function __construct( $entityManager , $authService ){
        $this->entityManager = $entityManager;
        $this->authService = $authService;
    }

    public function indexAction(){
       
        $pagina = $this->params()->fromRoute('page',1);
        $qtdPorPagina = 2 ;
        $offset = ( $pagina -1 ) *  $qtdPorPagina;
        
        $repositorio =  $this->entityManager->getRepository('Estoque\Entity\Produto');
        
        $produtos = $repositorio->getListaPaginacao( $qtdPorPagina , $offset );
        
        return new ViewModel( ['produtos' => $produtos , 'qtd_pagina' => $qtdPorPagina ] );
    }
    
    public function cadastrarAction(){
        
         if( $this->authService->hasIdentity() == false ){
             return  $this->redirect()->toUrl('/login');
         }

        $form = new ProdutoForm($this->entityManager);
       
        $this->saveProduto( true , true ,  $form);

        return new ViewModel( [ 'form' => $form ] );
    }

    private function saveProduto( $redirect = true , $flashMessage = true , ProdutoForm $form ){

         if( $this->request->isPost() === false ){
             return false;
         }
        
        $postValues = (array) $this->request->getPost();
        
        $id = empty($postValues['id']) === true ? null : $postValues['id'];

        $produto = ( !is_numeric($id)  ? new Produto() : $this->entityManager->find('Estoque\Entity\Produto', $id ) );
        
        $form->setInputFilter( $produto->getInputFilter() );
        $form->setData( $postValues );
        
        if( $form->isValid() === false ){
            return false;
        }

        $repositorio =  $this->entityManager->getRepository('Estoque\Entity\Produto');
      
        $repositorio->save( $produto , $postValues );
 
      
         if( $flashMessage === true ){
             $acaoSave = ( !is_numeric($id)  ? 'Inserido' : 'Editado');
             $this->flashMessenger()->addMessage("Produto $acaoSave com Sucesso");
        }

        if( $redirect === true ){
          return  $this->redirect()->toUrl('/');
        }
    }

    public function removerProdutoAction(){
        
        $id = $this->params()->fromRoute('id');
        
        $this->removerEsteProduto();

        $produto = $this->entityManager->getRepository('Estoque\Entity\Produto');
        
        return  new ViewModel( [ 'produto' => $produto->getById($id) ] );
    }

    private function removerEsteProduto( $redirect= true , $flashMessage = true ){

         if( $this->request->isPost() === false ){
             return false;
         }
        
        $postId = $this->request->getPost('id');

        $repositorio = $this->entityManager->getRepository('Estoque\Entity\Produto');
        $repositorio->removeById($postId);
        
        if( $flashMessage === true ){
            $this->flashMessenger()->addMessage('Produto Removido com Sucesso');
        }
        
        if( $redirect === true ){
            return $this->redirect()->toUrl('/');
        }
    }

     
    public function editarProdutoAction(){

        $id = $this->params()->fromRoute('id');

        $produto = $this->entityManager->find('Estoque\Entity\Produto', $id );

        $form = new ProdutoForm($this->entityManager);

        $this->saveProduto( true , true , $form );

        return new ViewModel([ 'produto' => $produto ,'form' => $form ]);
    }

    public function contatoAction(){
        
        $this->emailEnvite();

        return [];
    }

    public function emailEnvite(){

        if( $this->request->isPost() === false ){
             return false;
         }
         
        $postContato = $this->request->getPost('contato');
         
        $htmlPart = "Nome: {$postContato['nome']} <br />Mensagem: {$postContato['mensagem']} <br />Email: {$postContato['email']}"; 
        
        $html = new MimePart($htmlPart);

        $html->type = 'text/html';

        $body = new MimeMessage();
        $body->addPart($html);
        
        $message = new Message();
        $message->setBody($body);

        $config = [
                    'name' => 'smtp.gmail.com',
                    'host' => 'smtp.gmail.com',
                    'port' => 465,
                    'connection_class' => 'login',
                    'connection_config' => [
                        'username' => 'bruno.caramelo5@gmail.com',
                        'password' => 'brunocaramelo321',
                        'ssl' => 'ssl'
                        ] 
                    ];

        $transport = new SmtpTransport();
        $options = new SmtpOptions($config);
        $transport->setOptions($options);
        
        $transport->send($message);
    
    }


}
