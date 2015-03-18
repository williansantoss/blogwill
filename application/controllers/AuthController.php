<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction()
    {
        $identity = Zend_Auth::getInstance()->getStorage()->read();
        if ($identity != null) {
            return $this->_helper->redirector->goToRoute(array('controller' =>
                    'arearestrita'), null, true);
        }
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();
        $form = new Form_Login();
        $this->view->form = $form;
        //Verifica se existem dados de POST
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            //Formulário corretamente preenchido?
            if ($form->isValid($data)) {
                $login = $form->getValue('login');
                $senha = $form->getValue('senha');

                try {
                    Model_Auth::login($login, $senha);
                    //Redireciona para o Controller protegido
                    return $this->_helper->redirector->goToRoute(array('controller' =>
                            'arearestrita'), null, true);
                }
                catch (exception $e) {
                    //Dados inválidos
                    $this->_helper->FlashMessenger($e->getMessage());
                    $this->_redirect('/auth');
                }
            } else {
                //Formulário preenchido de forma incorreta
                $form->populate($data);
            }
        }

    }
    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        return $this->_helper->redirector('index');
    }

}
