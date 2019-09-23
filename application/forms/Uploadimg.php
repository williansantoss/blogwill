<?php

class Application_Form_Uploadimg extends Zend_Form
{

	public function init()
	{		
		// Seta o m�todo de envio do formul�rio como POST
		$this->setMethod( Zend_Form::METHOD_POST );

		// Seta o enctype do formul�rio para upload de arquvos
		$this->setEnctype( Zend_form::ENCTYPE_MULTIPART );
        
        // Input hidden para valida��o
        $login = new Zend_Form_Element_Text('container_img');
        $login->setAttrib('class', 'form-control')->setAttrib('id', 'container_img')->setAttrib('type', 'hidden')->setAttrib('value', 'hidden');

		// Inicia aqui a cria��o e configura��o do campo file_image
		$file = new Zend_Form_Element_File('img_path');
		$file -> setAttrib('class', 'btn')
			-> setAttrib('id', '')
			-> setRequired(true);		
		
		// Inicia aqui a cria��o e configura��o do bot�o de submit
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Enviar Arquivo')
		->setAttrib('id', 'enviar')
		->setAttrib('class', 'btn btn-primary');

		// Adiciona os elementos ao formul�rio
		$this->addElements(array(
		$file,
		$submit
		));
	}

}




