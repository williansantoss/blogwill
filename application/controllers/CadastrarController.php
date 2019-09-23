<?php

class CadastrarController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();
        $form = new Form_Pessoa();
        $this->view->form = $form;


        //Verifica se existem dados de POST
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            //Formulário corretamente preenchido?
            if ($form->isValid($data)) {
                $nome = $form->getValue('nome');
                $foto = $form->getValue('foto');
                $email = $form->getValue('email');
                $dtNascimento = $form->getValue('nascimento');
                $localidade = $form->getValue('localidade');
                $interesse = $form->getValue('interesse');
                
                $data = array(
                    'name' => $nome,
                    'foto' => $foto,
                    'email' => $email,
                    'dt_nasc'=> $dtNascimento,
                    'localidade'=>$localidade,
                    'interesse'=> $interesse
                );
                try {

                    $tabPessoa = new Application_Model_Pessoa();
                    if ($tabPessoa->gravar($data)) {
                        echo "cadastrado com sucesso!";
                    } else {
                        echo "Não cadastrado";
                    }
                }
                catch (exception $e) {
                    //Dados inválidos
                    $this->_helper->FlashMessenger($e->getMessage());
                    $this->_redirect('/cadastrar/index');
                }
            } else {
                //Formulário preenchido de forma incorreta
                $form->populate($data);
            }
        }
         
    }
    public function visualizarAction()
    {
        $id = $this->_getParam('id');
        
        $tabPessoa = new Application_Model_Pessoa();
        $result = $tabPessoa->visualizar($id);

        if ($result) {
            $this->view->pessoa = $result;
        } 
    }
    


}



