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

			<h1 class="display-4 text-center mb-5">ТОП-10 предложений</h1>

			<div class="bg-light p-5">
				<span class="d-block float-right font-weight-bold lead">#1</span>
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
				<span class="d-block float-right font-weight-bold lead">#2</span>
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
				<span class="d-block float-right font-weight-bold lead">#3</span>
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
				<span class="d-block float-right font-weight-bold lead">#4</span>
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
				<span class="d-block float-right font-weight-bold lead">#5</span>
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
				<span class="d-block float-right font-weight-bold lead">#6</span>
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
				<span class="d-block float-right font-weight-bold lead">#7</span>
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
				<span class="d-block float-right font-weight-bold lead">#8</span>
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
				<span class="d-block float-right font-weight-bold lead">#9</span>
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
				<span class="d-block float-right font-weight-bold lead">#10</span>
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

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
