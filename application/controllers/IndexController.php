<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        try{
            $tabPessoa = new Application_Model_Pessoa();
            $result = $tabPessoa->listarByInteresse();
            
            $page = $this->_getParam('page', 1);    
    
            $paginator = Zend_Paginator::factory($result);
            $paginator->setCurrentPageNumber($page)
                    ->setItemCountPerPage(10);
    
            Zend_Paginator::setDefaultScrollingStyle('Sliding');
            Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');
    
            $this->view->assign('paginator', $paginator);
       
      
            if ($result) {            
                $this->view->pessoas = $result;
            }
        
        } catch (Exception $e) {
            echo $e->getMessage();

        }       
         
    }


}
