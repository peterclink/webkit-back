<?php
class BannersController extends Controller {

	public function index() {

		$this->editar();
	}

	public function cadastrar() {

		$this->view('Admin/Banners/Cadastrar')->show();
	}

	public function editar() {

		$this->view('Admin/Banners/Editar')->show();
	}

	public function segmentos() {

		$this->view('Admin/Banners/Segmentos')->show();
	}

	public function areas() {

		$this->view('Admin/Banners/Areas')->show();
	}

	public function produtos() {

		$this->view('Admin/Banners/Produtos')->show();
	}

}