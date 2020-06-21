<?

	/**
	*	Настройка провайдов
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	defined('KERNEL_ACCESS') or header('Location: /');

	return
	[

		# Корневая страница
		'/' => [
			'view' => 'home',
			'content' => [
				'title' => 'Газпромбанк: Портал'
			]
		],

		# ТОП-10 предложений
		'top' => [
			'view' => 'top',
			'content' => [
				'title' => 'Газпромбанк: ТОП-10 предложений'
			]
		],

		# API
		'api' => [
			'view' => 'api',
			'content' => [
				'title' => 'Газпромбанк: API'
			]
		],

		# Новости
		'news' => [
			'view' => 'news',
			'content' => [
				'title' => 'Газпромбанк: Новости'
			]
		],

		# Профиль
		'profile' => [
			'view' => 'profile',
			'content' => [
				'title' => 'Газпромбанк: Профиль'
			]
		],

		# Регистрация
		'reg' => [
			'view' => 'reg',
			'content' => [
				'title' => 'Газпромбанк: Регистрация'
			]
		],

		# Предложение
		'offer' => [
			'view' => 'offer',
			'content' => [
				'title' => 'Газпромбанк: Предложение'
			]
		],

		# Ошибка 403
		'error-403' => [
			'view' => '403'
		],
		# Ошибка 404
		'error-404' => [
			'view' => '404'
		],

	];
