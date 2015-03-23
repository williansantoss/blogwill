<?php

class Aplicacao_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    /**
     * @var Zend_Auth
     */
    protected $_auth = null;
    /**
     * @var Zend_Acl
     */
    protected $_acl = null;
    /**
     * @var array
     */


    protected $_notLoggedRoute = array(
        'controller' => 'auth',
        'action' => 'index',
        'module' => 'default');

    /**
     * @var array
     */
    protected $_forbiddenRoute = array(
        'controller' => 'error',
        'action' => 'forbidden',
        'module' => 'default');

    public function __construct()
    {
        $this->_auth = Zend_Auth::getInstance();
        $this->_acl = Zend_Registry::get('acl');
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $controller = "";
        $action = "";
        $module = "";
        if (!$this->_auth->hasIdentity()) {
            $controller = $request->getControllerName();
            switch ($controller) {
                case "index":
                    $controller = 'index';
                    $action = 'index';
                    $module = 'default';
                    break;
                case "sobre":
                    $controller = 'sobre';
                    $action = 'index';
                    $module = 'default';
                    break;
                case "atuacao":
                    $controller = 'atuacao';
                    $action = 'index';
                    $module = 'default';
                    break;
                case "contato":
                    $controller = 'contato';
                    $action = 'index';
                    $module = 'default';
                    break;
                default:
                    $controller = $this->_notLoggedRoute['controller'];
                    $action = $this->_notLoggedRoute['action'];
                    $module = $this->_notLoggedRoute['module'];
            }


        } else
            if (!$this->_isAuthorized($request->getControllerName(), $request->
                getActionName())) {
                $controller = $this->_forbiddenRoute['controller'];
                $action = $this->_forbiddenRoute['action'];
                $module = $this->_forbiddenRoute['module'];
            } else {
                $controller = $request->getControllerName();
                $action = $request->getActionName();
                $module = $request->getModuleName();
            }
            $request->setControllerName($controller);
        $request->setActionName($action);
        $request->setModuleName($module);
    }

    protected function _isAuthorized($controller, $action)
    {
        $this->_acl = Zend_Registry::get('acl');
        $user = $this->_auth->getIdentity();
        if (!$this->_acl->has($controller) || !$this->_acl->isAllowed($user, $controller,
            $action))
            return false;
        return true;
    }
}