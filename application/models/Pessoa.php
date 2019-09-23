<?php
class Application_Model_Pessoa extends Zend_Db_Table_Abstract {
	protected $_name = 'pessoa';
	protected $_primary = 'id';

	public function gravar($data)
    {
        return $this->insert($data);
	}

	public function alterar($data)
    {
        return $this->update($data);
	}

	public function listar() {
		try {
			return $this->fetchAll ();
		} catch ( Exception $e ) {
		}
	}

	public function listarByInteresse() {
		try {
			$selecao = $this->select();            		     
            $selecao->order(6,5);
            $resultado = $this->fetchAll($selecao);
            
			return $resultado;
		} catch ( Exception $e ) {
		}
	}

	public function visualizar($id) {
		try {
			$selecao = $this->select();            		     
            $selecao->where('id='.$id);
			$resultado = $this->fetchAll($selecao);

			return $resultado;
		} catch ( Exception $e ) {
		}
	}
}