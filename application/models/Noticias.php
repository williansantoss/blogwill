<?php
class Application_Model_Noticias extends Zend_Db_Table_Abstract {
	protected $_name = 'pg_inicial_noticias';
	protected $_primary = 'id';
	public function listar() {
		try {
			$selecao = $this->select();            		     
            $selecao->order("id DESC")
                    ->limit(5);
            $resultado = $this->fetchAll($selecao);
            
			return $resultado;
		} catch ( Exception $e ) {
		}
	}	
}