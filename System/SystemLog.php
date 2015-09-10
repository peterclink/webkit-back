<?php
	class SystemLog {

		private $_dados;
		private $_method;

		public function log($method, array $dados = null) {
			$this->_dados  = $dados;
			$this->_method  = $method;
			self::verificarLogin();
		}

		public function verificarLogin() {
			
			$obj = new loginHelper();
			
			if ($obj->getDataSession("usuario_login") == null) {
				throw new Exception_Form("Você precisa efetuar o login novamente para continuar.");
			} else {
				
				$model = new Model();
				$model->open();
				$model->set("sql","
					INSERT INTO `systemlog` 
						(`method`, `url`, `dados`, `login`, `data`) 
						VALUES 
						(:method,:url,:dados,:login,now())
				");
				$model->set('params',array(
					":method" => $this->_method,
					":url" => $_SERVER['REQUEST_URI'],
					":dados" => implode(';', $this->_dados),
					":login" => $obj->getDataSession("usuario_login")
				));
				$model->query();
				$model->close();
			}
		}
		
	}