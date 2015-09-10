<?php
class IndexController extends Controller {

	public function __construct() {
		//$this->index();
	}
	
	public function index() {

		$dados = array(
			'TITLE' =>  TITLE . ' - Administração'
		);

		$this->view('Admin/Index')->show();
	}

}