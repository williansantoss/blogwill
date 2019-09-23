<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array('basePath' =>
                APPLICATION_PATH, 'namespace' => ''));
        return $autoloader;
    }

    protected function _initDbAdapter() {
        $this->bootstrap('db');
        $db = $this->getResource('db');
        Zend_Registry::set('db' , $db);
    }

    protected function _initAcl()
    {
        
    }
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        //Doctype
        $view->Doctype('XHTML1_TRANSITIONAL');
        //Css
        $view->headLink()->prependStylesheet('/css/bootstrap.css');
        $view->headScript()->prependFile('/js/bootstrap.min.js');
        $view->headLink()->prependStylesheet('/css/bootstrap-responsive.css');
        
        $view->headLink()->prependStylesheet('css/bootstrap.css');
        $view->headScript()->prependFile('js/bootstrap.min.js');
        $view->headLink()->prependStylesheet('css/bootstrap-responsive.css');
        
        $view->headScript()->prependFile('js/jquery.gmap-1.1.0-min.js');
        $view->headScript()->prependFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
        $view->headScript()->prependFile('js/innovaeditor.js');
        $view->headScript()->prependFile('js/innovamanager.js');
        

        if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")) {
            $view->headScript()->prependFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
        } else {
            $view->headScript()->prependFile('js/jquery-2.1.3.min.js');
        }

    }

}
