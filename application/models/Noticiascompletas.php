<?php
class Application_Model_Noticiascompletas extends Zend_Db_Table_Abstract {
	protected $_name = 'pg_noticias';
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