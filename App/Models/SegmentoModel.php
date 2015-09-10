<?php
class SegmentoModel extends FiltroDao {
	
	public $_table = "segmentos";
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