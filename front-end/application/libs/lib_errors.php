<?

	/**
	*	Библиотека для ядра (debug)
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*/

	defined('KERNEL_ACCESS') or header('Location: /');

	ob_start('ErrorHandler');
    function ErrorHandler($buffer)
    {
    	$error = error_get_last();
        $errorArray = ['code' => $error['type']];

        switch($error['type']) 
        {
            case 1:
                $errorArray['name'] = 'E_ERROR';
                $errorArray['text'] = 'Фатальные ошибки времени выполнения. Это неустранимые средствами самого скрипта ошибки, такие как ошибка распределения памяти и т.п. Выполнение скрипта в таком случае прекращается.';
                $errorArray['class'] = 'color-error';
            break;

            case 2:
                $errorArray['name'] = 'E_WARNING';
                $errorArray['text'] = 'Предупреждения времени выполнения (не фатальные ошибки). Выполнение скрипта в таком случае не прекращается.';
                $errorArray['class'] = 'color-warning';
            break;

            case 4:
                $errorArray['name'] = 'E_PARSE';
                $errorArray['text'] = 'Ошибки на этапе компиляции. Должны генерироваться только парсером.';
                $errorArray['class'] = 'color-warning';
            break;

            case 8:
                $errorArray['name'] = ' E_NOTICE';
                $errorArray['text'] = 'Уведомления времени выполнения. Указывают на то, что во время выполнения скрипта произошло что-то, что может указывать на ошибку, хотя это может происходить и при обычном выполнении программы.';
                $errorArray['class'] = 'color-info';
            break;

            case 16:
                $errorArray['name'] = 'E_CORE_ERROR';
                $errorArray['text'] = 'Фатальные ошибки, которые происходят во время запуска РНР. Такие ошибки схожи с E_ERROR, за исключением того, что они генерируются ядром PHP.';
                $errorArray['class'] = 'color-error';
            break;

            case 32:
                $errorArray['name'] = 'E_CORE_WARNING';
                $errorArray['text'] = 'Предупреждения (не фатальные ошибки), которые происходят во время начального запуска РНР. Такие предупреждения схожи с E_WARNING, за исключением того, что они генерируются ядром PHP.';
                $errorArray['class'] = 'color-warning';
            break;

            case 64:
                $errorArray['name'] = 'E_COMPILE_ERROR';
                $errorArray['text'] = 'Фатальные ошибки на этапе компиляции. Такие ошибки схожи с E_ERROR, за исключением того, что они генерируются скриптовым движком Zend.';
                $errorArray['class'] = 'color-error';
            break;

            case 128:
                $errorArray['name'] = ' E_COMPILE_WARNING';
                $errorArray['text'] = 'Предупреждения на этапе компиляции (не фатальные ошибки). Такие предупреждения схожи с E_WARNING, за исключением того, что они генерируются скриптовым движком Zend.';
                $errorArray['class'] = 'color-warning';
            break;

            case 256:
                $errorArray['name'] = 'E_USER_ERROR';
                $errorArray['text'] = 'Сообщения об ошибках, сгенерированные пользователем. Такие ошибки схожи с E_ERROR, за исключением того, что они генерируются в коде скрипта средствами функции PHP trigger_error().';
                $errorArray['class'] = 'color-error';
            break;

            case 512:
                $errorArray['name'] = 'E_USER_WARNING';
                $errorArray['text'] = 'Предупреждения, сгенерированные пользователем. Такие предупреждения схожи с E_WARNING, за исключением того, что они генерируются в коде скрипта средствами функции PHP trigger_error().';
                $errorArray['class'] = 'color-warning';
            break;

            case 1024:
                $errorArray['name'] = 'E_USER_NOTICE';
                $errorArray['text'] = 'Уведомления, сгенерированные пользователем. Такие уведомления схожи с E_NOTICE, за исключением того, что они генерируются в коде скрипта, средствами функции PHP trigger_error().';
                $errorArray['class'] = 'color-info';
            break;

            case 2048:
                $errorArray['name'] = 'E_STRICT';
                $errorArray['text'] = 'Включаются для того, чтобы PHP предлагал изменения в коде, которые обеспечат лучшее взаимодействие и совместимость кода.';
                $errorArray['class'] = 'color-info';
            break;

            case 4096:
                $errorArray['name'] = ' E_RECOVERABLE_ERROR';
                $errorArray['text'] = 'Фатальные ошибки с возможностью обработки. Такие ошибки указывают, что, вероятно, возникла опасная ситуация, но при этом, скриптовый движок остается в стабильном состоянии. Если такая ошибка не обрабатывается функцией, определенной пользователем для обработки ошибок (см. set_error_handler()), выполнение приложения прерывается, как происходит при ошибках E_ERROR.';
                $errorArray['class'] = 'color-error';
            break;

            case 8192:
                $errorArray['name'] = 'E_DEPRECATED';
                $errorArray['text'] = 'Уведомления времени выполнения об использовании устаревших конструкций. Включаются для того, чтобы получать предупреждения о коде, который не будет работать в следующих версиях PHP.';
                $errorArray['class'] = 'color-info';
            break;

            case 16384:
                $errorArray['name'] = 'E_USER_DEPRECATED';
                $errorArray['text'] = 'Уведомления времени выполнения об использовании устаревших конструкций, сгенерированные пользователем. Такие уведомления схожи с E_DEPRECATED за исключением того, что они генерируются в коде скрипта, с помощью функции PHP trigger_error().';
                $errorArray['class'] = 'color-info';
            break;
            
            default:
                $errorArray['name'] = 'Unknown error';
                $errorArray['text'] = 'Произошла неизвестная ошибка.';
                $errorArray['class'] = 'color-error';
            break;
        }

        if(isset($error['type'])) 
        {
	        $buffer = '
	            <title>' . $errorArray['name'] . ' [code: ' . $errorArray['code'] . ']</title>
	            <style>
	                @charset "UTF-8";@import "https://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic";html,body{font-family:Open Sans,Helvetica,Arial,Verdana,sans-serif;width:100%;height:100%;margin:0;padding:0;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;align-items:center;background:#2E2E2E}.error-content ul{padding:0;list-style:none}.error-content ul li{margin-top:10px;margin-bottom:10px}.error-content{width:600px;border:3px solid #e8f5e9;border-radius:5px;color:#e8f5e9;padding:1.2rem}.error-content h1{text-align:center;text-transform:uppercase;border-bottom:3px dashed #e8f5e9;display:block;width:100%;margin:0;padding:0 0 1.2rem}.error-content ul li.file{pointer-events:none!important;padding:.375rem .75rem;font-weight:400;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;text-align:center}.error-content details.help{display:block;cursor:pointer}.error-content details summary{outline:none}.error-content details.help p{padding:.375rem .75rem;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;text-align:justify;margin:10px 0 0}.error-content .color-error{color:#ff3547!important}.error-content .color-warning{color:#fb3!important}.error-content .color-info{color:#33b5e5!important}
	            </style>

	            <body>  
	                <div class="error-content">
	                    <h1 class="' . $errorArray['class'] . '">' . $errorArray['name'] . ' [code: ' . $errorArray['code'] . ']</h1>
	                    <ul>
	                        <li><b>Строка: </b> '.$error['line'].'</li>
	                        <li><b>Сообщение: </b> '.$error['message'].'</li>
	                        <li class="file"><b>Файл: </b> '.$error['file'].'</li>                             
	                    </ul> 
	                    <details class="help">
	                        <summary><b>Узнать об ошибки подробнее</b></summary>
	                        <p>' . $errorArray['text'] . '</p>
	                    </details>        
	                </div> 
	            </body>';

	        return $buffer;
	        die();
	    }

	    return false;
    }