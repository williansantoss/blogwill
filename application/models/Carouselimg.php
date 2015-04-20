<?php
class Application_Model_Carouselimg extends Zend_Db_Table_Abstract {
	protected $_name = 'pg_inicial_carousel_imagens';
	protected $_primary = 'id';
	public function listar() {
		try {
			$selecao = $this->select();            		     
            $selecao->order("id DESC");
            $resultado = $this->fetchAll($selecao);
            
			return $resultado;
		} catch ( Exception $e ) {
		}
	}
}