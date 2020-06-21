<?php

	/**
	*	Обработчик запросов
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	require_once '../application/core.php';
	$core = new core();
	$error_403 = true;

	if(!empty($_POST['request'])) 
	{
		$request = json_decode($_POST['request'], true);

		if(isset($request['model']))
		{
			$core->POST_controller($request);
		}

		$error_403 = false;
	}

	if(!empty($_GET['request'])) 
	{
		$core->GET_controller($_GET);

		$error_403 = false;
	}
	
	if($error_403 === true)
	{
		$core->provider('error-403');
	}