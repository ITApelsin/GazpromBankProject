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

			<h1 class="display-4 text-center mb-5">Регистрация</h1>
			
			<form>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label>E-mail</label>
			      <input type="email" class="form-control">
			    </div>
			    <div class="form-group col-md-6">
			      <label>Пароль</label>
			      <input type="password" class="form-control">
			    </div>
			  </div>
				<div class="form-row">
			    <div class="form-group col-md-4">
			      <label>Фамилия</label>
			      <input type="text" class="form-control" placeholder="Иванов">
			    </div>
			    <div class="form-group col-md-4">
			      <label>Имя</label>
			      <input type="text" class="form-control" placeholder="Иван">
			    </div>
					<div class="form-group col-md-4">
			      <label>Отчество</label>
			      <input type="text" class="form-control" placeholder="Иванович">
			    </div>
			  </div>
			  <button type="submit" class="btn btn-primary mt-3">Зарегистрироваться</button>
			</form>

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
