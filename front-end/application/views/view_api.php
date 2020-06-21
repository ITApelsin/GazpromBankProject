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

			<h1 class="display-4 text-center mb-5">Документация</h1>

			<div class="alert alert-success mb-5" role="alert">
			  <h4 class="alert-heading">REST API</h4>
			  <p class="m-0">Данный раздел предназначен для разработчиков и является временным.</p>
			</div>

			<section>
				<h2 class="h4">Получение категорий</h2>
				<p>
					Запрос: /categories <br>
					Метод: GET <br>
					Аргументы: нет <br>
					Формат ответа: <code>[{"id": <id категории>, "name": "<наименование категории>", "color": <цвет>}]</code>
				</p>
				<blockquote class="blockquote-api mb-0">
					Цвет представлен целым числом. Нужно перевести в шестнадцатеричный формат
					00_FF_FF_FF, где 0xFF (красный), 0xFF(зеленый), 0xFF(синий)
				</blockquote>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Добавление категорий</h2>
				<p>
					Запрос: /add-category?name=<наименование>&color="цвет" <br>
					Метод: GET <br>
					Аргументы:
					<ul>
						<li>наименование - строка (пробелы запрещены, заменять _ )</li>
						<li>цвет - число в десятичном формате</li>
					</ul>
					Формат ответа: "OK" в случае успеха
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Случайное предложение</h2>
				<p>
					Запрос: /rand-offer <br>
					Метод: POST <br>
					Аргументы: входной поток. JSON-массив идентификаторов категорий (целые числа). Кодировка UTF-8. Например: [1, 10, 10202, 11, 232] <br>
					Выход: JSON объект предложения. Формат: <br>
					<code>
						[{"author":
{"username":"testUser","email":"test@mail.ru","password":"321","id":1},"title":"
титл","essence":"что-то","category":{"name":"Категория 2
[test]","color":8388564,"id":1},"created":
{"seconds":1592693391,"nanos":373000000},"comments":
[],"likes":0,"dislikes":0,"id":22}]
					</code>
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Топ-10 предложений</h2>
				<p>
					Запрос: /top-offers <br>
					Метод: GET <br>
					Аргументы: нет <br>
					Выход: 10 самых популярных предложений в виде JSON-массива
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Мои предложения</h2>
				<p>
					Запрос: /my-offers?user-id=<идентификатор текущего пользователя>&num=<максимальное количество в ответе (целое)> <br>
					Метод: GET <br>
					Аргументы: в строке запроса <br>
					Выход: num предложений пользователя в виде JSON-массива
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Добавить предложение</h2>
				<p>
					Запрос: /add-offer <br>
					Метод: POST <br>
					Аргументы: входной поток (UTF-8) - JSON объект следующего формата: <br>
					<code>
						{"userId":<идентификатор автора>, "category": <идентификатор категории>,
						"title":"<Заголовок/Тема>", "essence":"<Cуть>"}
					</code> <br>
					Выход: num предложений пользователя в виде JSON-массива
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Авторизация</h2>
				<p>
					Запрос: /auth <br>
					Метод: POST <br>
					Аргументы: входной поток (UTF-8) - JSON объект следующего формата: <br>
					<code>
						{"email":"<почта>", "password":"<пароль>"}
					</code> <br>
					Выход: <br>
					<code>
						{"username":"<ник>","email":"<почта>","password":"<пароль>","id":
<идентификатор>, icon:"<Base64 представление иконки>"}
					</code> <br>
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Смена пароля</h2>
				<p>
					Запрос: /change-password <br>
					Метод: POST <br>
					Аргументы: входной поток (UTF-8), JSON объект следующего формата: <br>
					<code>
						{"userId": <идентификатор пользователя>, "newPassword":"<новый пароль>"}
					</code> <br>
					Формат ответа: "OK" в случае успеха
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Лайк</h2>
				<p>
					Запрос: /like?offerId=<идентификатор предложения> <br>
					Метод: GET <br>
					Аргументы:  в адресной строке <br>
					Формат ответа: "OK" в случае успеха
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Дизлайк</h2>
				<p>
					Запрос: /dislike?offerId=<идентификатор предложения> <br>
					Метод: GET <br>
					Аргументы:  в адресной строке <br>
					Формат ответа: "OK" в случае успеха
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Регистрация пользователя</h2>
				<p>
					Запрос: /register <br>
					Метод: POST <br>
					Аргументы: входной поток (UTF-8). JSON объект следующего формата: <br>
					<code>
						{"offer": <идентификатор комментируемого предложения>, "author":<идентификатор
автора комментария>, "comment":"<сам комментарий>"}
					</code>
				</p>
				<hr class="my-5">
			</section>

			<section>
				<h2 class="h4">Оставить комментарий</h2>
				<p>
					Запрос: /comment <br>
					Метод: POST <br>
					Аргументы: входной поток (UTF-8). JSON-объект следующего формата: <br>
					<code>
						{"username":"<ник>", "email":"почта", "password":"пароль", imag="Base64
представление картинки"}
					</code> <br>
					Формат ответа: "OK" в случае успеха
				</p>
			</section>

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
