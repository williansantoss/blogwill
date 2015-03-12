<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        $include_path .= ".;C:/wamp/www/projeto1/library";
        $sessaoautenticada = new Zend_Session_Namespace('Zend_Auth');
		$this->view->usuario = $sessaoautenticada->user;
    }

    public function indexAction()
    {
        $sessaoautenticada = new Zend_Session_Namespace('Zend_Auth');
    }

}

