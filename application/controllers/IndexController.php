<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $tabNoticias = new Application_Model_Noticias();
        $noticias = $tabNoticias->listar();        
        $this->view->noticias = $noticias;
    }


}

