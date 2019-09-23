<?php

class VisualizarController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $id = $this->_getParam('id');
        
        $tabPessoa = new Application_Model_Pessoa();
        $result = $tabPessoa->visualizar($id);

        if ($result) {
            $this->view->pessoa = $result;
        } 
         
    }

    


}



