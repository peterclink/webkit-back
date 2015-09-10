<?php
header('Content-Type: text/html; charset=utf-8');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');  
header('Last Modified: '. gmdate('D, d M Y H:i:s') .' GMT');  
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');  
header('Pragma: no-cache');  
header("Cache: no-cache");    
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors','On');
set_time_limit(0);
date_default_timezone_set('America/Sao_Paulo');

/** Diretorios do Projeto **/
define('PROJECT_DIR', '/MyFrameWork/');
define('SYSTEM_DIR', '/xampp/htdocs');
define('SYS_HELPER_DIR', SYSTEM_DIR . PROJECT_DIR . 'System/Helpers/');
define('SYS_EXCEPTION_DIR', SYSTEM_DIR . PROJECT_DIR . 'System/Exceptions/');
define('SYS_MODEL_DIR', SYSTEM_DIR . PROJECT_DIR . 'System/Models/');

/** Diretorios da Aplicação **/
define('CONTROLLER_DIR', SYSTEM_DIR . PROJECT_DIR . 'App/Controllers/');
define('VIEW_DIR', SYSTEM_DIR . PROJECT_DIR . 'App/Views/');
define('MODEL_DIR', SYSTEM_DIR . PROJECT_DIR . 'App/Models/');
define('DAO_DIR', MODEL_DIR . 'DAO/');
define('CONTENT_DIR', PROJECT_DIR . 'Content/');
define('IMG_DIR', CONTENT_DIR . 'img/');

/** Class AutoLoad **/
$AutoLoad = array(
	"Helper" => array(
		"SYS" => SYS_HELPER_DIR
	),
	"Model" => array(
		"APP" => MODEL_DIR,
		"SYS" => SYS_MODEL_DIR
	),
	"Exception" => array(
		"SYS" => SYS_EXCEPTION_DIR
	),
	"Dao" => array(
		"APP" => DAO_DIR
	)
);

/** Configurações de Acesso ao banco de dados **/

define("DB_HOST", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_DATABASE", "myFrameWork");

/** Configurações Gerais **/
define('TITLE', 'Sistema de Banners');
define('PAGE_DEFAULT', 'Banners');