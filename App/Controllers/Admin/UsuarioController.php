<?php
class UsuarioController extends Controller {

	public function index() {
		$this->listarUsuarios();
	}
	
	public function cadastrar() {

		$this->view('Admin/Usuario/Cadastrar');

		$model = new UsuarioModel();

		$dados = array(
			'TITLE' =>  TITLE . ' - Cadastrar Usuário'
		);

		foreach ($model->_perfis as $key => $value) {

			$this->set("COMBO_INDEX",$key);
			$this->set("COMBO_VALUE",$value);
			$this->clear("COMBO_SELECTED");			

			$this->block("BLOCK_COMBO_ADMIN");
		}

		$this->show();
	}

	public function remover() {

		$dados = array(
			"USUARIONOME"=> $_POST['nome'],
			"USUARIOID"=> $_POST['id']
		);

		//$param =  $this->getParam('Editar');

		$this->view('Admin/Usuario/Remover',false)->show($dados);
	}

	public function removerUsuario() {

		$model = new UsuarioModel();
		$model->setId($_POST['id']);
		$model->open();
		$model->remover();
		$model->close();
	}

	public function editar() {

		$param =  $this->getParam('Editar');

		if (isset($param) && is_numeric($param)) {
			$this->editarUsuarios($param);
		} else {
			$this->listarUsuarios();
		}
	}

	public function editarUsuarios($param) {

		$this->view('Admin/Usuario/Cadastrar');
		
		$model = new UsuarioModel();
		$model->open();
		$usuario = $model->getUsuarios($param);
		$model->close();

		foreach ($usuario as $key) {
			
			$dados = array(
				"USUARIOID" => $key->id,
				"USUARIONOME" => $key->nome,
				"USUARIOEMAIL" => $key->email,
				"USUARIOLOGIN" => $key->login,
				"USUARIOSENHA" => $key->senha,
				"USUARIOPERFIL" => $key->perfil,
				"DISABLED" => "DISABLED"
			);

			break;
		}

		foreach ($model->_perfis as $key => $value) {

			$this->set("COMBO_INDEX",$key);
			$this->set("COMBO_VALUE",$value);

			if( $dados['USUARIOPERFIL'] == $key )
				$this->set("COMBO_SELECTED","SELECTED");
			else
				$this->clear("COMBO_SELECTED");

			$this->block("BLOCK_COMBO_ADMIN");
		}

		$this->block("BLOCK_EDITAR_USUARIO_FORM")
		->block("BLOCK_EDITAR_USUARIO_TITLE")
		->block("BLOCK_EDITAR_USUARIO")
		->show($dados);
	}

	public function listarUsuarios() {
		
		$this->view('Admin/Usuario/Editar');

		$dados = array(
			'TITLE' =>  TITLE . ' - Administração'
		);

		$model = new UsuarioModel();
		$model->open();
		$usuarios = $model->getUsuarios();
		$model->close();

		foreach ($usuarios as $key) {
			
			$this->set("LIST_USUARIOID",$key->id);
			$this->set("LIST_USUARIONOME",$key->nome);
			$this->set("LIST_USUARIOEMAIL",$key->email);
			$this->set("LIST_USUARIOLOGIN",$key->login);
			$this->set("LIST_USUARIOPERFIL",$model->getPerfil($key->perfil));

			$this->block("BLOCK_LISTAR_USUARIO");
		}

		$this->show();
	}


	public function salvar() {

		$model = new UsuarioModel();

		$this->view('Admin/Usuario/Salvar', false);

		$dados = null;

		try {

			$model->setNome($_POST['nome']);
			$model->setLogin($_POST['login']);
			$model->setEmail($_POST['email']);
			$model->setSenha($_POST['senha']);
			$model->setReSenha($_POST['resenha']);
			$model->setPerfil($_POST['perfil']);

			$model->validate->validate();
			
			$model->open();
			$model->salvar();
			$model->close();


		} catch ( Exception_Form $e ) {
			$dados = array(
				'ERROR_MSG' => $e->getMessage()
			);

			$this->block("BLOCK_CADASTRAR_USUARIO");
		}

		$this->show($dados);

	}

	public function atualizar() {

		$model = new UsuarioModel();
		$val = new ValidateHelper();

		$this->view('Admin/Usuario/Atualizar', false);

		$dados = null;

		try {

			$model->setId($_POST['id']);
			$model->setNome($_POST['nome']);
			//$model->setLogin($_POST['login']);
			$model->setEmail($_POST['email']);
			$model->setSenha($_POST['senha']);
			$model->setReSenha($_POST['resenha']);
			$model->setPerfil($_POST['perfil']);

			$model->open();
			$model->atualizar();
			$model->close();

		} catch ( Exception_Form $e ) {
			$dados = array(
				'ERROR_MSG' => $e->getMessage()
			);

			$this->block("BLOCK_ATUALIZAR_USUARIO");
		}

		$this->show($dados);

	}

}