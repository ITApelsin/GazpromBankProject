<?

	/**
	*	Контроллер для обработки POST запросов
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	defined('KERNEL_ACCESS') or header('Location: /');

	class POST_controller extends core
	{

		function __construct($request)
		{
			$model = (isset($request['model'])) ? $request['model'] : false;
			$request = (isset($request['request'])) ? $request['request'] : false;

			switch($model)
			{		
				default:
					$response = false;
				break;
			}

			print_r(json_encode($response));
		}
	}