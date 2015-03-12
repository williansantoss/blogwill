<?php

class AutenticacaoController extends Zend_Controller_Action
{
    public $usuario = "";
    public function init()
    {
        $include_path .= ".;C:/wamp/www/projeto1/library";
    	$sessao = new Zend_Session_Namespace('Zend_Auth');
    	$this->_helper->layout()->disableLayout();	
		$this->_helper->viewRenderer->setNoRender(false);/* Initialize action controller here */
    }

     public function indexAction()
    {           		
 
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();
        
                $login = $this->_getParam("login");
                $senha = $this->_getParam("senha");

                try {
                    
                    Model_Auth::login($login, $senha);                                     
                    //Redireciona para o Controller protegido                    
                    return $this->_helper->redirector->goToRoute( array('controller' => 'admin'), null, true);                
                                         
                } catch (Exception $e) {
                    //Dados inválidos
                    $this->_helper->FlashMessenger($e->getMessage());                    
                    //$this->_redirect('autenticacao');                    
                }           
    } 
    
    public function loginAction()
    { 	 
    	  			  	 
       $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
       $this->view->messages = $this->_flashMessenger->getMessages();
        
        //if ( $this->getRequest()->isPost() ) {
         //   $data = $this->getRequest()->getPost();
            //Formulário corretamente preenchido?
            if ( $formulario_cadastro->isValid($data) ) {
            $nome = $formulario_cadastro->getValue('nome');
			            $email = $formulario_cadastro->getValue('email');
			            $senha = $formulario_cadastro->getValue('senha');			            
			          
			            try {
			            	$date = date("Y-m-d");
			            	$hora = strftime("%H:%M:%S");
							$usuario = new Application_Model_Usuarios();
							$relatorio = new Application_Model_Relatorio();			       
				        	$valor = array(
			    			'nome_completo' => $nome,
				        	'login' => $email,    		
			    			'senha' => sha1($senha),
				        	'perfil_id'=> '2'
							);
							$value = array(
			    			'usuario' => $nome,
				        	'tipo_perfil' => 'comum',    		
			    			'acao' => 'auth/cadastro',
							'nome_acao'=>'cadastro',
				        	'data'=> $date,
							'hora'=>$hora,
							'detalhe'=>$nome
							);
							$linhasinseridas = $usuario->insert($valor);
							$linhasadicionadas = $relatorio->insert($value);
							echo "cadastro recebido com sucesso";
														 
			            } catch (Exception $e) {
                    		//Dados inválidos
                    		$this->_helper->FlashMessenger($e->getMessage());                  		
                    		                   		
                		}
					} else {
                //Formulário preenchido de forma incorreta
                $form_Login->populate($data);
               
            }
            //}       
    }
       	   
 
    public function logoutAction()
    {
        
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        return $this->_helper->redirector->goToRoute( array('controller' => 'index'), null, true);
    }
}

