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
        
        $principal = $this->_getParam('id_principal');
        if($principal == '1'){
            $ID = $this->_getParam('principal');
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
             $data_noticia = date('Ymd');
             $autor_noticia = $this->_getParam('autor');
             $values = array(
			    	'titulo_noticia' => $titulo,
			    	'corpo_noticia' => $corpo_noticia,
			    	'autor_noticia' => $autor_noticia,
				    'data_noticia' => $data_noticia
            );           
            $linhasinseridas = $tabNoticiasc->insert($values);
            
            $resumo = substr($corpo_noticia, 0, 199);  
            $valores = array(
                'titulo' => $titulo,
                'descricao_resumo'=> $resumo,
                'autor_noticia' => $autor_noticia,
                'data_noticia'=>$data_noticia
            );               
             $linhas = $tabNoticias->insert($valores);
        }  

        try{
            $tabImg = new Application_Model_Carouselimg();          
            $resultado = $tabImg->listar();
            $this->view->imagens = $resultado;
             
            $formulario = new Application_Form_Uploadimg();
            
            $this->view->form = $formulario;
			// Verifica se foi uma requisição POST
			if(!$this->_request->isPost())
			return false;

			// Capturamos aqui o dados enviados via post
			$data = $this->_request->getPost();
				
			// Verifica se os dados do formulário são válidos
			if( !$formulario->isValid($data) )
			return false;
				
			// Instancia o adaptador do Zend para tranferência de arquivos via
			// protocolo Http e definine o destino do arquivo
			$upload_adapter = new Zend_File_Transfer_Adapter_Http();
			$upload_adapter->setDestination('../imagens');
			$files = $upload_adapter->getFileInfo();
			if($files){
				foreach($files as $arquivo)
				{
					$nomeArquivo = $arquivo['name'];
				}
			}
			if($upload_adapter->receive()){                 
                 $path = "../imagens/".$nomeArquivo;              
                 $values = array(                                  
    	   		  'path_img_carousel' => $path    			    
                );           
                $linhasinseridas = $tabImg->insert($values);
			}
		}catch(Exception $e){
			$erro = "Erro: ".$e->getMessage();
			echo $erro;die();
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
    public function deletarAction()
	{
		$this->_helper->viewRenderer->setNoRender();
		$idImagem = $this->_getParam('idImagem');
        $tabImg = new Application_Model_Carouselimg();
		if($idImagem){
			$resultado = $idImagem->getImagem($idImagem);
			if (count($resultado) > 0){				
				foreach ($resultado as $img){
					$linhadeletada = $tabImg->delete("id =" . $img->id);
				}
			}
		}
		$retornoAjax = array (
			'idImagem' => $idImagem
		);
		
		// $this->_response->setBody(json_encode($retornoAjax));
		echo json_encode ( $retornoAjax );
	
	}

}

