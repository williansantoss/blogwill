<?php
class Application_Model_Interesses extends Zend_Db_Table_Abstract {
	protected $_name = 'interesses';
	protected $_primary = 'id';
	public function listar() {
		try {
			$selecao = $this->select();            		     
            $selecao->where ("status = 0");
            $resultado = $this->fetchAll($selecao);
            
			return $resultado;
		} catch ( Exception $e ) {
		}
	}	
}