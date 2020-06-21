<?php

	/**
	*	Файл настроек
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	defined('KERNEL_ACCESS') or header('Location: /'); // Не удалять

	return (object)
	[
		# Версия SiteCore
		'version' => '3.1.2',

		# Режим debug
		'debug' => true,

		# Название проекта
		'title' => 'Project',

		# Дата создания
		'date' => '',

		# Переадресация на HTTPS
		'HTTPS' => false,

		# Отключить/включить сайт
		'site' => true,

		# Пароль для доступа к закрытому сайту
		'sitePassword' => 'MyPass',

		// Модель для работы с БД [model_DB]
		'model_DB' =>
		[
			'CONST' =>
			[
				'DB_PREFIX'  	=> '',					# Префикс таблиц
				'DB_NAME'    	=> ''					# Имя базы данных
			],

			'DB' =>
			[
				'host' 		 	=> 'localhost',			# Хост
				'login' 	 	=> '', 					# Логин
				'password' 	 	=> '' 					# Пароль
			]
		]

	];
