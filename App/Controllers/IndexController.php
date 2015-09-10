<?php
class IndexController extends Controller {

	public function __construct() {
		//$this->index();
	}
	
	public function index() {

		//$email = new EmailHelper();
		//$email->enviarEmail();
		/*$db = new Model();
		$db->open();
		$db->read();*/
		$this->view('index')->show();
	}

}