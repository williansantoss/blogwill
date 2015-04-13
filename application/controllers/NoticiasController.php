<?php

class NoticiasController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
         $tabNoticiasc = new Application_Model_Noticiascompletas();
         $noticias = $tabNoticiasc->listar();
         $this->view->noticias = $noticias;
    }

    public function adicionarAction()
    {
        // action body
    }


}



