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
         
         
        $page = $this->_getParam('page', 1);    
 
        $paginator = Zend_Paginator::factory($noticias);
        $paginator->setCurrentPageNumber($page)
                  ->setItemCountPerPage(1);
 
        Zend_Paginator::setDefaultScrollingStyle('Sliding');
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');
 
        $this->view->assign('paginator', $paginator);
         
    }

    public function adicionarAction()
    {
        // action body
    }


}



