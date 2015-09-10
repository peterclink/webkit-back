<?php
	class Controller extends Factory {

		protected $tp;

		public function view( $file, $layout = true ) {

			$this->tp = new TemplateHelper();

			if($layout) {
				$this->layout($file);
				$this->isLogged();
			} else {
				$this->tp->loadfile( ".", $file );
				
				if ( $this->tp->exists('SCRIPTS') )
					$this->tp->addFile("SCRIPTS", "_scripts");
			}

			return $this;
		}

		protected function layout($file) {
			$this->header();        
	        $this->tp->addFile("CONTAINER", $file);        
			$this->footer();
		}

		protected function header() {

			$this->tp->loadfile( ".", "header" );
			$this->tp->addFile("SCRIPTS", "_scripts");
			$this->tp->addFile("NAVBAR", "_navbar");
			$this->tp->addFile("SIDEBAR", "_sidebar");
		}
		
		protected function footer() {
	        $this->tp->addFile("FOOTER", "footer");
		}

		protected function block($block) {
			$this->tp->block($block);
			return $this;
		}

		protected function set($index,$value) {
			if ( $this->tp->exists($index) )
				$this->tp->$index = $value;
		}

		protected function clear($index) {
			if ( $this->tp->exists($index) )
				$this->tp->clear($index);
		}

		public function show(array $dados = null) {

			$this->components();
			
			if( isset( $dados ) )
				foreach ($dados as $key => $value) {
					$key = strtoupper($key);
					if ( $this->tp->exists($key) )
						$this->tp->$key = $value;
				}


			return print($this->tp->show());
		}

		public function components() {

	        if ( $this->tp->exists('PROJECT_DIR') )
	        	$this->tp->PROJECT_DIR = PROJECT_DIR;

	        if ( $this->tp->exists('CONTENT_DIR') )
	        	$this->tp->CONTENT_DIR = CONTENT_DIR;

	        if ( $this->tp->exists('IMG_DIR') )
	        	$this->tp->IMG_DIR = IMG_DIR;

	        if ( $this->tp->exists('TITLE') )
	        	$this->tp->TITLE = TITLE;
		}

		protected function isLogged() {

			parent::setUrl();
			parent::setExplode();
			parent::setController();
			$module = parent::getModule();

			if ( $module == "admin" ) {

				$obj = new LoginHelper;

				if ( $obj->isLogged() ) {

					if ( $this->tp->exists('S_USERNAME') )
						$this->tp->S_USERNAME = $_SESSION['usuario_nome'];
					if ( $this->tp->exists('S_EMAIL') )
						$this->tp->S_EMAIL = $_SESSION['usuario_email'];
					if ( $this->tp->exists('S_LOGIN') )
						$this->tp->S_LOGIN = $_SESSION['usuario_login'];

				}
				else {
					throw new Exception_Login();
				}
			}
		}

	}