<?php
class Application_Model_Noticias extends Zend_Db_Table_Abstract {
	protected $_name = 'pg_inicial_noticias';
	protected $_primary = 'id';
	public function listar() {
		try {
			return $this->fetchAll ();
		} catch ( Exception $e ) {
		}
	}	
}