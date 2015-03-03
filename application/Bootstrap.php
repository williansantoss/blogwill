<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
				'basePath' => APPLICATION_PATH,
				'namespace' => ''
		));
		return $autoloader;
	}
	protected function _initDoctype()
	{		
		$this->bootstrap('view');
		$view = $this->getResource('view');			
		//Doctype
		$view->Doctype('XHTML1_TRANSITIONAL');					
		//Css
	
		$view->headLink()->prependStylesheet('css/bootstrap.css');
		$view->headLink()->prependStylesheet('../css/bootstrap.css');
	
		$view->headLink()->prependStylesheet('../css/bootstrap-responsive.css');
		$view->headLink()->prependStylesheet('css/bootstrap-responsive.css');			
		//Js
	   
		$view->headScript()->prependFile('js/bootstrap.min.js');
                
	   $view->headScript()->prependFile('../js/jquery-2.1.3.min.js');
		$view->headScript()->prependFile('../js/bootstrap.min.js');
				
	}

}

