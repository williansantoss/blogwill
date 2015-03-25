<?php

class ArearestritaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $tabTextoPrincipal = new Application_Model_Textoprincipal();
        $texto = $tabTextoPrincipal->listar();
        $this->view->textoprincipal = $texto;
        
        $principal = $this->_getParam('principal');
        if($principal == '1'){
            $ID = $this->_getParam('id');
            $tituloPrincipal = $this->_getParam('titulop');
            $contentP = $this->_getParam('contentp');
            
            $values = array(
			    	'ini_titulo' => $tituloPrincipal,
				    'ini_descricao' => $contentP
            );			
            if($ID){	
                $linhasatualizada = $tabTextoPrincipal->update($values, 'id ='.$ID);
            }else{
                $linhasinseridas = $tabTextoPrincipal->insert($values);
            }    
        }
    }
    public function sobreAction()
    {
        // action body
    }
    public function atuacaoAction()
    {
        // action body
    }
    public function contatoAction()
    {
        // action body
    }


}

