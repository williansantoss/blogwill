<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $tabTextoPrincipal = new Application_Model_Textoprincipal();
        $texto = $tabTextoPrincipal->listar();
        $this->view->textoprincipal = $texto;

        $tabNoticias = new Application_Model_Noticias();
        $noticias = $tabNoticias->listar();
        $this->view->noticias = $noticias;
    }


}
