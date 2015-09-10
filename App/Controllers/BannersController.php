<?php
class BannersController extends Controller {

	public function index() {

		$this->view('Banner/index', false)->show();
	}

	public function banners( $filter ) {

		$this->view('index')->show();
	}

	public function campanha() {

		$banner = $this->getParam('campanha');

		if (isset($banner)) {

		}

		$dados = array(
			'BANNER_ID' => $banner
		);

		$this->view('Banner/banner', false)->show($dados);
	}

}