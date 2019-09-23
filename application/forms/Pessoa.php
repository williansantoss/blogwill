<?php

class Form_Pessoa extends Zend_Form
{
    public function init()
    {
        $this->setName('teste')->setAttrib('class', 'form-signin');
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome:')
            ->setAttrib('class', 'form-control')
            ->setAttrib('placeholder','nome')
            ->setAttrib('required','required')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('email:')
        ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder','email')
        ->setAttrib('type','email')            
            ->addValidator('NotEmpty');

        $dtNasc = new Zend_Form_Element_Text('nascimento');
        $dtNasc->setLabel('data nascimento:')
        ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'dt nascimento')
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $localidade = new Zend_Form_Element_Text('localidade');
        $localidade->setLabel('localidade:')
        ->setAttrib('class', 'form-control')
        ->setAttrib('required','required')
        ->setAttrib('placeholder','localidade')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')->
            addValidator('NotEmpty');

        $interesse = new Zend_Form_Element_Text('interesse');
        $interesse->setLabel('interesse:')
                    ->setAttrib('class', 'form-control')
                    ->setAttrib('placeholder', 'interesse')                   
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim')
                    ->addValidator('NotEmpty');

        $foto = new Zend_Form_Element_File('foto');
        $foto->setLabel('foto:')
        ->setAttrib('required','required')
            ->setRequired(true);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Cadastrar')->setAttrib('id', 'submitbutton')->setAttrib('class',
            'btn btn-lg btn-primary btn-block');

        $this->addElements(array(       
            $nome,
            $email,
            $dtNasc,
            $localidade,
            $interesse,
            $foto,
            $submit));
    }


}
