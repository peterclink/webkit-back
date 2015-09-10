<?php
	require_once('System/Settings.php');
	require_once('System/Autoloader.php');
	require_once('System/Factory.php');
	require_once('System/Controller.php');
	require_once('System/SystemLog.php');
	require_once('System/Model.php');

		$autoloader = new Autoloader($AutoLoad);
		$start = new Controller();

	try {

		$start->run();

	} catch ( Exception_404 $e ) {

		$start->view('Exceptions/404', false);
  		$start->show(array('ERROR_MSG' => $e->getMessage()));

	} catch ( Exception_Login $e ) {

		$start->view('Exceptions/Login', false);
  		$start->show(array('ERROR_MSG' => $e->getMessage()));

	} catch (Exception $e) {
  		
  		$start->view('Exceptions/Exception', false);
  		$start->show(array('ERROR_MSG' => $e->getMessage()));

	}