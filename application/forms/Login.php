<?php

class Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setName('teste')->setAttrib('class', 'form-signin');
        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('Usuario:')->setAttrib('class', 'form-control')->setAttrib('placeholder',
            'usuario')->setRequired(true)->addFilter('StripTags')->addFilter('StringTrim')->
            addValidator('NotEmpty');

        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('Senha:')->setAttrib('class', 'form-control')->setAttrib('placeholder',
            'senha')->setRequired(true)->addFilter('StripTags')->addFilter('StringTrim')->
            addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Entrar')->setAttrib('id', 'submitbutton')->setAttrib('class',
            'btn btn-lg btn-primary btn-block');

        $this->addElements(array(       
            $login,
            $senha,
            $submit));
    }


}
