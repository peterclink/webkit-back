<?php
class UsuarioController extends Controller {

	private $_prefix = 'Painel';
	
	public function index() {

		$this->entrar();
	}

	public function entrar() {

		$obj = new LoginHelper;

		$dados = array(
			'TITLE' =>  TITLE . ' - Painel de Login',
			'DESCRIPTION' =>  'Painel de Login para acessar a área restrita do sistema'
		);

		if ( $obj->isLogged() )
			header( 'Location: ' . PROJECT_DIR . 'Admin' );
		else 
			$this->view('Painel/Entrar', false)->show($dados);
	}

	public function sair() {

		$obj = new LoginHelper;
		$obj->logout();
		//$this->view('Painel/Sair', false)->show();
		header( 'Location: ' . PROJECT_DIR . 'Usuario/Entrar' );
	}

	public function recuperarSenha() {
		$this->view('Painel/RecSenha')->show();
	}

	public function validarUsuario() {
		
		$obj = new LoginHelper;
		$login = $_POST['login'];
		$senha = $_POST['senha'];

		$dados = array(
			'login' => $login,
			'senha' => $senha
		);

		$obj->open();

		$this->view('Painel/validarUsuario', false);

		if ( $obj->login($login,$senha) ) {
			$this->block("BLOCK_LOGIN_MSG");
		}
			
		$obj->close();

		$this->show();
	}

}