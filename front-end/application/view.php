<?php

	/**
	*	Обработчик представлений
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	defined('KERNEL_ACCESS') or header('Location: /');

	class view extends core
	{
		public function load($name, $array = false)
		{
			/*
				Выводим нужный нам шаблон

				$name - имя шаблона
				$array - дополнительный массив с данными
			*/

			$path = (isset($array['path'])) ? $array['path'] . '/' : '';
			@include('views/' . $path . 'view_' . $name . '.php');
		}

		public function CSS_load($array = NULL, $onlyThis = false)
		{
			if($onlyThis == false)
			{
				$HTML = '
					<link href="/css/plugins/toastr.min.css" rel="stylesheet">
				';
			}

			if(isset($array))
			{
				for($i=0; $i < count($array); $i++)
				{
					$HTML .= '<link href="' . $array[$i] . '" rel="stylesheet">';
				}
			}

			print($HTML);
		}

		public function JS_load($array = NULL, $onlyThis = false)
		{
			if($onlyThis == false)
			{
				$HTML = '
					<script src="/js/jQuery/jquery.toastr.min.js"></script>
				  <script src="/js/additional/dist.js"></script>
				';
			}

			if(isset($array))
			{
				for($i=0; $i < count($array); $i++)
				{
					$HTML .= '<script src="' . $array[$i] . '"></script>';
				}
			}

			print($HTML);
		}

		public function Bootstrap_load($array = NULL)
		{
			$HTML = '
				<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
				<link href="/bootstrap-dist/bootstrap.min.css" rel="stylesheet">
				<link href="/css/additional/style.css" rel="stylesheet">
				<script src="/bootstrap-dist/jquery.min.js"></script>
				<script src="/bootstrap-dist/bootstrap.min.js"></script>
				<script src="/bootstrap-dist/bootstrap.bundle.min.js"></script>
				<script src="/js/additional/api.js"></script>
			';

			print($HTML);
		}

	}
