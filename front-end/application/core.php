<?

	/**
	*	PHP Version: 7
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	define('KERNEL_ACCESS', true);

	class core
	{
		/*
		*	Модули которые нужно подключить:
		* 		- ['%название файла%']
		*/
		private $LOADER = [

		];

		const PATH_MODELS = 'models/';						# Директория моделей
		const PATH_VIEWS = 'views/';						# Директория представлений
		const PATH_LIBS = 'libs/';							# Директория библиотек
		const PATH_CONFIG = 'config.php';					# Директория файла config.php
		const PATH_POST_CONTROLLER = 'POST_controller.php';	# Директория файла POST_controller.php
		const PATH_GET_CONTROLLER = 'GET_controller.php';	# Директория файла GET_controller.php
		const PATH_VIEW = 'view.php';						# Директория файла view.php
		const PATH_PROVIDER = 'provider.php';				# Директория файла provider.php

		private $config;
		private $CORE_SETTINGS = [];

		function __construct()
		{
			$this->CORE_SETTINGS['debug'] = $this->config()->debug;
			$this->CORE_SETTINGS['site'] = $this->config()->site;
			$this->CORE_SETTINGS['HTTPS'] = $this->config()->HTTPS;

			if($this->CORE_SETTINGS['debug'] === true)
			{
				@include_once(self::PATH_LIBS . 'lib_errors.php');
			}
			else
			{
				ini_set('error_reporting', 0);
				ini_set('display_errors', 0);
				ini_set('display_startup_errors', 0);
			}

			if($this->CORE_SETTINGS['HTTPS'] === true)
			{
				@include_once(self::PATH_LIBS . 'lib_https.php');
			}

			if(version_compare(PHP_VERSION, '7', '<='))
			{
    			$this->CoreHandler(1);
			}

			if(!(is_dir(dirname( __FILE__ ) . '/' . self::PATH_MODELS)))
			{
				$this->CoreHandler(2);
			}

			if(!(is_dir(dirname( __FILE__ ) . '/' . self::PATH_VIEWS)))
			{
				$this->CoreHandler(3);
			}

			if(!(is_dir(dirname( __FILE__ ) . '/' . self::PATH_LIBS)))
			{
				$this->CoreHandler(4);
			}

			if(!@include_once(self::PATH_POST_CONTROLLER))
			{
				$this->CoreHandler(5);
			}

			if(!@include_once(self::PATH_GET_CONTROLLER))
			{
				$this->CoreHandler(8);
			}

			if(!@include_once(self::PATH_VIEW))
			{
				$this->CoreHandler(6);
			}

			if(!@include_once(self::PATH_LIBS . 'lib_functions.php'))
			{
				$this->CoreHandler(7);
			}

			if(!@include_once(self::PATH_PROVIDER))
			{
				$this->CoreHandler(8);
			}

			if($this->CORE_SETTINGS['site'] === false)
			{
				$this->SiteClose();
			}

			foreach($this->LOADER as $path)
			{
				if(!@include_once(self::PATH_MODELS . $path . '.php'))
				{
					$this->CoreHandler('{LOADER} Не удалось загрузить модель "' . self::PATH_MODELS . $path . '.php');
				}
			}
		}

	    public function model($modelName)
		{
			/*
				Вызываем подключенный модуль
			*/
			if(class_exists($modelName, false))
			{
				@$request = new $modelName();
				return $request;
			}
			else
			{
				$this->CoreHandler('{MODEL} Модель не найдена "' . $modelName . '"');
			}
		}

		public function POST_controller($request)
		{
			/*
				Вызываем POST контроллер
			*/
			if($POST_controller = new POST_controller($request))
			{
				return $POST_controller;
			}
			else
			{
				return false;
			}
		}

		public function GET_controller($request)
		{
			/*
				Вызываем GET контроллер
			*/
			if($GET_controller = new GET_controller($request))
			{
				return $GET_controller;
			}
			else
			{
				return false;
			}
		}

	    public function view($name, $array = false)
		{
			/*
				Вызываем представление
			*/
			return (@$request = new view()) ? $request->load($name, $array) : false;
		}

		public function lib()
		{
			/*
				Вызываем библиотеку "lib_functions"
			*/
			return (@$request = new lib_functions()) ? $request : false;
		}

		public function config()
		{
			/*
				Вызываем конфиг
			*/
			return ($this->config = @include(self::PATH_CONFIG)) ? $this->config : false;
		}

		public function URL($host = false, $request = false)
		{
			if(!$host)
			{
				$host = $_SERVER["HTTP_HOST"];
			}
			if(!$request)
			{
				$request = $_SERVER['REQUEST_URI'];
			}

			$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
			$url = parse_url($protocol . (($host === false) ? $_SERVER["HTTP_HOST"] : $host) . $request);
			$dirs = explode('/', $url['path']);
			isset($url['query']) && parse_str($url['query'], $_GET);
			for($i = 1; $i < (count($dirs) - 1); $i++)
			{
				$dirs[$i] = urldecode($dirs[$i]);
			}
			unset($dirs[0]);
			unset($dirs[count($dirs)]);
			$dirs = array_values($dirs);

			$response = [
				'protocol' => $url['scheme'],
				'host' => $url['host'],
				'path' => $dirs,
				'query' => $_GET
			];

			return $response;
		}

		public function provider($request)
		{
			$data = @include(self::PATH_PROVIDER);

			if($request == 'this')
			{
				$request = $this->URL();
			}

			if($request == 'error-403')
			{
				$this->view($data['error-403']['view']);
				return false;
			}

			if($request == 'error-404')
			{
				$this->view($data['error-404']['view']);
				return false;
			}

			$index_page = $data['/']['view'];
			$page_404 = $data['error-404']['view'];
			$search = false;

    		if(empty($request['path']))
    		{
    			$content = (!empty($data['/']['content'])) ? $data['/']['content'] : false;
    			$this->view($index_page, $content);

    			return true;
    		}
    		else
    		{
			    foreach($request['path'] as $key)
			    {
			        if (is_array($data) && array_key_exists($key, $data))
			        {
			            $data = $data[$key];
			            $search = true;
			        } else {
			            $search = false;
			        }
			    }
			}

			if($search and isset($data['view']))
			{
				$content = (!empty($data['content'])) ? $data['content'] : false;
				$this->view($data['view'], $content);
			}
			else
			{
				$this->view($page_404);
			}
		}

		protected function CoreHandler($error)
	    {
	        $errorArray = ['code' => $error, 'file' => 'core.php'];

	        switch($error)
	        {
	            case 1:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Установлена старая версия PHP (' . PHP_VERSION . ')';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 2:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не найдена директория с моделями "' . self::PATH_MODELS . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 3:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не найдена директория с представлениями "' . self::PATH_VIEWS . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 4:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не найдена директория с библиотеками "' . self::PATH_LIBS . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 5:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не удалось загрузить контроллер "' . self::PATH_POST_CONTROLLER . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 6:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не удалось загрузить представление "' . self::PATH_VIEW . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 7:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не удалось загрузить библиотеку "' . self::PATH_LIBS . 'lib_functions.php"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 7:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не удалось загрузить провайдеры "' . self::PATH_PROVIDER . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            case 8:
	                $errorArray['name'] = 'CORE_ERROR';
	                $errorArray['text'] = 'Не удалось загрузить контроллер "' . self::PATH_GET_CONTROLLER . '"';
	                $errorArray['class'] = 'color-error';
	            break;

	            default:
	                $errorArray['name'] = 'Unknown error';
	                $errorArray['text'] = 'Произошла неизвестная ошибка.';
	                $errorArray['class'] = 'color-error';
	            break;
	        }

	        $buffer = '
	            <title>' . $errorArray['name'] . ' [code: ' . $errorArray['code'] . ']</title>
	            <style>
	                @charset "UTF-8";@import "https://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic";html,body{font-family:Open Sans,Helvetica,Arial,Verdana,sans-serif;width:100%;height:100%;margin:0;padding:0;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;align-items:center;background:#2E2E2E}.error-content ul{padding:0;list-style:none}.error-content ul li{margin-top:10px;margin-bottom:10px}.error-content{width:600px;border:3px solid #e8f5e9;border-radius:5px;color:#e8f5e9;padding:1.2rem}.error-content h1{text-align:center;text-transform:uppercase;border-bottom:3px dashed #e8f5e9;display:block;width:100%;margin:0;padding:0 0 1.2rem}.error-content ul li.file{pointer-events:none!important;padding:.375rem .75rem;font-weight:400;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;text-align:center}.error-content details.help{display:block;cursor:pointer}.error-content details summary{outline:none}.error-content details.help p{padding:.375rem .75rem;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;text-align:justify;margin:10px 0 0}.error-content .color-error{color:#ff3547!important}.error-content .color-warning{color:#fb3!important}.error-content .color-info{color:#33b5e5!important}
	            </style>

	            <body>
	                <div class="error-content">
	                    <h1 class="' . $errorArray['class'] . '">' . $errorArray['name'] . ' [code: ' . $errorArray['code'] . ']</h1>
	                    <ul>
	                        <li><b>Сообщение: </b> ' . $errorArray['text'] . '</li>
	                        <li class="file"><b>Файл: </b> ' . $errorArray['file'] . '</li>
	                    </ul>
	                </div>
	            </body>';

	        die($buffer);
	    }

	    public function SiteClose()
	    {
	    	$auth = false;

	    	if(isset($_POST['InputAuthSiteClose']))
	    	{
	    		if($_POST['InputAuthSiteClose'] == $this->config()->sitePassword)
	    		{
					setcookie('AuthSiteCloseHash', md5($_POST['InputAuthSiteClose']), time() + 60 * 60 * 24);
	    			$auth = true;
	    			print('<script>location.href="/"</script>');
	    		}
	    	}

	    	if(isset($_COOKIE['AuthSiteCloseHash']) and $_COOKIE['AuthSiteCloseHash'] == md5($this->config()->sitePassword))
	    	{
	    		$auth = true;
	    	}
	    	else
	    	{
	    		$auth = false;
	    	}

	    	$buffer = '
				<!DOCTYPE html>
				<html lang="ru">
					<head>
						<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
						<link href="/bootstrap-dist/bootstrap.min.css" rel="stylesheet">
			    		<script src="/bootstrap-dist/jquery-3.2.1.min.js"></script>
			    		<script src="/bootstrap-dist/bootstrap.min.js"></script>
						<title>' . $this->config()->title . '</title>
						<style>
							html,body{
								display:flex;
								flex-direction: column;
							}
							main {
  								flex: 1 0 auto;
							}
							footer {
							  	flex: 0 0 auto;
							  	height: 60px;
    							line-height: 60px;
							}
						</style>
					</head>
				    <body class="bg-dark text-light text-center vw-100 vh-100">
						<main>
							<div class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
								<h1 class="display-3">' . $this->config()->title . '</h1>
								<p class="lead">Извините, сайт временно недоступен. <br> Ведутся технические работы.</p>
								<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalAuthSiteClose">Авторизация</button>
							</div>
						</main>
						<footer>
							© ' . date('Y') . ' ' . $this->config()->title . '
						</footer>

						<div class="modal fade text-dark" id="ModalAuthSiteClose">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Авторизация</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" action="/">
											<div class="row">
												<div class="col-12 col-sm-8 mb-1 mt-1">
													<input type="password" class="form-control w-100" placeholder="PIN-код" name="InputAuthSiteClose" required="">
												</div>
												<div class="col-12 col-sm-4 mb-1 mt-1">
													<button class="btn btn-primary w-100" type="submit"><i class="fas fa-sign-in-alt"></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				    </body>
				</html>
	    	';

	    	if($auth === false)
	    	{
	    		die($buffer);
	    	}
	    }

	}
