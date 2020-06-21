<?
	require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core.php';
	$site = new core;
	$path_blocks = [
		'path' => 'blocks'
	];
?>

<!DOCTYPE HTML>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?=$array['title']?></title>
		<? $this->Bootstrap_load() ?>
		<? $this->CSS_load() ?>
		<? $this->JS_load() ?>
	</head>

	<body>

		<? $site->view('header', $path_blocks); ?>

		<main class="container mb-5">

			<h1 class="display-4 text-center mb-5">Новости</h1>

    	<div class="row">
      	<div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
        	<div class="card hoverable">
          	<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/58.jpg" alt="Card image cap">
          	<div class="card-body">
            	<p class="card-title text-muted text-uppercase font-small mt-1 mb-3">News</p>
            	<p class="mb-2">We relocated our office to a new designed garage</p>
          	</div>
        	</div>
      	</div>

      	<div class="col-lg-4 col-md-6 mb-md-0 mb-4">
        	<div class="card hoverable">
          	<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/project4.jpg" alt="Card image cap">
          	<div class="card-body">
            	<p class="card-title text-muted text-uppercase font-small mt-1 mb-3">Marketing</p>
            	<p class="mb-2">Top five brilliant content marketing strategies</p>
          	</div>
        	</div>
      	</div>

      	<div class="col-lg-4 col-md-6 mb-0">
        	<div class="card hoverable">
          	<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/88.jpg" alt="Card image cap">
          	<div class="card-body">
            	<p class="card-title text-muted text-uppercase font-small mt-1 mb-3">Design</p>
            	<p class="mb-2">Best practices for minimalist design with example</p>
          	</div>
        	</div>
      	</div>
    	</div>

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
