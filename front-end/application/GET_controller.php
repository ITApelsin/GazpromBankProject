<?

	/**
	*	Контроллер для обработки GET запросов
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	defined('KERNEL_ACCESS') or header('Location: /');

	class GET_controller extends core
	{

		function __construct($request)
		{

			switch($request['request'])
			{
				default:
					$response = false;
				break;
			}

			print_r(json_encode($response));
			
		}
	}