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

			<div class="row">
				<div class="col-12 col-lg-4 col-md-6">
					<img src="/img/no-profile.jpg" class="img-fluid rounded-circle" alt="">
				</div>
				<div class="col-12 col-lg-8 col-md-6">
					<h2 class="display-4 text-center">Фамилия Имя Отчество</h2>
					<p class="lead m-0 p-0 text-muted text-center">Должность</p>
				</div>
			</div>

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
