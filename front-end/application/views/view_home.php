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

		<div id="intro" class="carousel slide d-none d-md-block" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#intro" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/img/slider/slide-1.png">
          <div class="carousel-caption d-none d-md-block">
            <h3>Первый слайд</h3>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#intro" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#intro" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <main class="container mt-5 mb-5">
      <div class="row justify-content-between">
        <div class="col-12 col-md-5">
          <h2 class="text-uppercase font-weight-bold mb-3 h5">Фильтр категорий</h2>
          <div class="form-category mb-4">
            <select>
              <option>Значение 1</option>
              <option>Значение 2</option>
              <option>Значение 3</option>
            </select>
          </div>
        </div>
        <div class="col-12 col-md-5">
          <h2 class="text-uppercase font-weight-bold mb-3 h5">Поиск по тегам</h2>
          <div class="form-search mb-5">
            <form>
              <input type="text" placeholder="Искать здесь...">
              <button type="submit"></button>
            </form>
          </div>
        </div>
      </div>

      <div class="bg-light p-5">
        <div class="row">
          <div class="col-12 col-md-3">
            <img src="/img/no-profile.jpg" class="img-fluid rounded-circle" alt="">
          </div>
          <div class="col-12 col-md-9">
            <div class="d-flex flex-column justify-content-between h-100">
              <div>
                <a href="#" class="badge badge-primary">Категория 1</a>
                <a class="h3 header-post" href="/offer">Тема предложения</a>
                <p class="lead text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id quam sapiente molestiae numquam quas, voluptates omnis nulla ea odio quia similique corrupti magnam.</p>
                <div class="tags">
                  <a href="#" class="badge badge-pill badge-secondary">#тег 1</a>
                  <a href="#" class="badge badge-pill badge-secondary">#тег 2</a>
                  <a href="#" class="badge badge-pill badge-secondary">#тег 3</a>
                </div>
              </div>
              <div>
                <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-md-7 mt-3 mt-md-0">
                    <h2 class="h5">Фамилия Имя Отчество</h2>
                    <p class="m-0 p-0 text-muted">Должность</p>
                  </div>
                  <div class="col-12 col-md-5 text-center text-md-right">
										<hr class="d-block d-md-none">
                    <div class="d-inline-block mr-3 text-secondary">
                      <i class="far fa-thumbs-up"></i> 0
                    </div>
                    <div class="d-inline-block mr-3 text-secondary">
                      <i class="far fa-thumbs-down"></i> 0
                    </div>
                    <div class="d-inline-block text-secondary">
                      <i class="far fa-comment"></i> 0
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

			<div class="bg-light p-5 mt-3">
				<div class="row">
					<div class="col-12 col-md-3">
						<img src="/img/no-profile.jpg" class="img-fluid rounded-circle" alt="">
					</div>
					<div class="col-12 col-md-9">
						<div class="d-flex flex-column justify-content-between h-100">
							<div>
								<a href="#" class="badge badge-primary">Категория 1</a>
								<a class="h3 header-post" href="/offer">Тема предложения</a>
								<p class="lead text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id quam sapiente molestiae numquam quas, voluptates omnis nulla ea odio quia similique corrupti magnam.</p>
								<div class="tags">
									<a href="#" class="badge badge-pill badge-secondary">#тег 1</a>
									<a href="#" class="badge badge-pill badge-secondary">#тег 2</a>
									<a href="#" class="badge badge-pill badge-secondary">#тег 3</a>
								</div>
							</div>
							<div>
								<div class="row justify-content-between align-items-center">
									<div class="col-12 col-md-7 mt-3 mt-md-0">
										<h2 class="h5">Фамилия Имя Отчество</h2>
										<p class="m-0 p-0 text-muted">Должность</p>
									</div>
									<div class="col-12 col-md-5 text-center text-md-right">
										<hr class="d-block d-md-none">
										<div class="d-inline-block mr-3 text-success">
                      <i class="far fa-thumbs-up"></i> 4
                    </div>
                    <div class="d-inline-block mr-3 text-danger">
                      <i class="far fa-thumbs-down"></i> 2
                    </div>
                    <div class="d-inline-block text-secondary">
                      <i class="far fa-comment"></i> 0
                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bg-light p-5 mt-3">
				<div class="row">
					<div class="col-12 col-md-3">
						<img src="/img/no-profile.jpg" class="img-fluid rounded-circle" alt="">
					</div>
					<div class="col-12 col-md-9">
						<div class="d-flex flex-column justify-content-between h-100">
							<div>
								<a href="#" class="badge badge-primary">Категория 1</a>
								<a class="h3 header-post" href="/offer">Тема предложения</a>
								<p class="lead text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id quam sapiente molestiae numquam quas, voluptates omnis nulla ea odio quia similique corrupti magnam.</p>
								<div class="tags">
									<a href="#" class="badge badge-pill badge-secondary">#тег 1</a>
									<a href="#" class="badge badge-pill badge-secondary">#тег 2</a>
									<a href="#" class="badge badge-pill badge-secondary">#тег 3</a>
								</div>
							</div>
							<div>
								<div class="row justify-content-between align-items-center">
									<div class="col-12 col-md-7 mt-3 mt-md-0">
										<h2 class="h5">Фамилия Имя Отчество</h2>
										<p class="m-0 p-0 text-muted">Должность</p>
									</div>
									<div class="col-12 col-md-5 text-center text-md-right">
										<hr class="d-block d-md-none">
										<div class="d-inline-block mr-3 text-success">
                      <i class="far fa-thumbs-up"></i> 2
                    </div>
                    <div class="d-inline-block mr-3 text-danger">
                      <i class="far fa-thumbs-down"></i> 6
                    </div>
                    <div class="d-inline-block text-secondary">
                      <i class="far fa-comment"></i> 4
                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
