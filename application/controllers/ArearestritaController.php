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
        $tabNoticiasc = new Application_Model_Noticiascompletas();
        $tabNoticias = new Application_Model_Noticias();
        
         $id_noticia = $this->_getParam('id_noticia');
         if($id_noticia == 1){
             $titulo = $this->_getParam('titulo');
             $corpo_noticia = $this->_getParam('content');
             $data_noticia = $this->_getParam('data');
             $autor_noticia = $this->_getParam('autor');
             $values = array(
			    	'titulo_noticia' => $titulo,
			    	'corpo_noticia' => $corpo_noticia,
			    	'autor_noticia' => $autor_noticia,
				    'data_noticia' => $data_noticia
            );           
            $linhasinseridas = $tabNoticiasc->insert($values);
            
            $valores = array(
                'titulo' => $titulo,
                'descricao_resumo'=> $corpo_noticia,
                'autor_noticia' => $autor_noticia,
                'data_noticia'=>$data_noticia
            );               
             $linhas = $tabNoticias->insert($valores);
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

