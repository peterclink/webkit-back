<?php
class AreaModel extends FiltroDao {
	
	public $_table = "areas";
	protected $id;
	protected $nome;

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->Id;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getNome() {
		return $this->nome;
	}
	
}