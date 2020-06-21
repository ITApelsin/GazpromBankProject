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

			<h1 class="display-4 text-center mb-5">Тема предложения</h1>

			<div class="row">
				<div class="col-12 col-md-3 text-center">
					<img src="/img/no-profile.jpg" class="img-fluid rounded-circle" alt="">
					<h2 class="h5 mt-3">Фамилия Имя Отчество</h2>
					<p class="p-0 text-muted mb-3">Должность</p>
				</div>
				<div class="col-12 col-md-9">
					<div class="d-flex flex-column justify-content-between h-100">
						<div>
							<div class="tags mb-3">
								<div class="row justify-content-between align-items-center">
                  <div class="col-12 col-md-7 mt-3 mt-md-0 mb-3 text-center text-md-left">
										<a href="#" class="badge badge-pill badge-secondary">#тег 1</a>
										<a href="#" class="badge badge-pill badge-secondary">#тег 2</a>
										<a href="#" class="badge badge-pill badge-secondary">#тег 3</a>
                  </div>
                  <div class="col-12 col-md-5 mb-3 text-center text-md-right">
										<a href="#" class="badge badge-primary mr-3">Категория 1</a>
										<div class="d-inline-block mr-3 text-secondary">
											<i class="far fa-thumbs-up"></i> 0
										</div>
										<div class="d-inline-block mr-3 text-secondary">
											<i class="far fa-thumbs-down"></i> 0
										</div>
                  </div>
                </div>
							</div>
							<p class="lead text-muted">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor nisl quis orci porttitor venenatis. Mauris nisl ante, accumsan at lacinia sed, rutrum a urna. Nunc at libero ligula. Duis feugiat tortor vel felis ullamcorper, ac pretium sapien accumsan. Nunc eu tortor sed ante fermentum pretium. Vivamus sed dui et nisi tempus tristique. Duis a rutrum mi, ut cursus sem. Etiam sollicitudin quam non accumsan porta. Sed eu semper augue, sed mattis erat.
								<br><br>
								Fusce et justo id sapien pulvinar ullamcorper. Nunc rutrum risus sed mi mollis dictum. In semper dolor vel volutpat hendrerit. Mauris ac placerat odio. Nulla varius leo in lorem pulvinar sollicitudin. Donec suscipit laoreet finibus. Nunc ullamcorper mauris vel vulputate facilisis. Phasellus in dictum ligula. Nam in bibendum nisi. Aenean tempor consectetur lorem. Integer non massa suscipit, pulvinar nisi vel, iaculis quam. Nulla eu enim a lectus convallis faucibus vel sed felis. Integer et ultrices dolor. Quisque sit amet lacinia nisl.
								<br><br>
								Pellentesque et lorem lobortis, accumsan sapien eu, pellentesque mauris. Quisque in ullamcorper sapien. Mauris egestas feugiat magna, vitae placerat mauris feugiat ut. Vestibulum eu erat sodales augue molestie convallis eu nec nunc. Etiam commodo leo feugiat felis placerat mollis. Nullam sit amet convallis metus, quis ultricies nisl. Vivamus in nunc imperdiet, gravida libero ac, ornare tortor. Nam eget porta neque, nec mattis enim. Donec cursus a arcu quis malesuada. Fusce blandit eros eget tortor iaculis imperdiet in in arcu. Ut posuere fringilla sem, ac sollicitudin massa porttitor at. Cras ac tortor a tortor auctor tincidunt at non magna. Nulla non lectus risus. Cras a dui aliquam, facilisis justo vel, tempor erat. In eget sem a dui dictum volutpat et eget quam.
								ipsum aliquam, vel egestas odio accumsan. Pellentesque commodo eros sit amet mi placerat, a dapibus massa efficitur. Donec tempus aliquam felis, in suscipit ex malesuada a. Mauris semper est felis, a consequat odio suscipit in. Donec vel urna suscipit, ullamcorper augue non, eleifend ligula. Morbi vel mollis mauris. Vivamus cursus ante ut elit consequat condimentum.
							</p>
						</div>
					</div>
				</div>
				<div class="w-100 mt-3">
					<h2 class="h3 mt-3">Комментарии (6)</h2>
					<hr class="mt-4 mb-1">
					<ul class="media-list">
					  <!-- Комментарий (уровень 1) -->
					  <li class="media">
					    <div class="media-left">
					      <a href="#">
					        <img class="media-object img-rounded" src="/img/avatar-1.jpg" alt="...">
					      </a>
					    </div>
					    <div class="media-body">
					      <div class="media-heading">
					        <div class="author">Дима</div>
					        <div class="metadata">
					          <span class="date">16 ноября 2015, 13:43</span>
					        </div>
					      </div>
					      <div class="media-text text-justify">Lorem ipsum dolor sit amet. Blanditiis praesentium voluptatum deleniti atque. Autem vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Dolor repellendus cum soluta nobis. Corporis suscipit laboriosam, nisi ut enim. Debitis aut perferendis doloribus asperiores repellat. sint, obcaecati cupiditate non numquam eius. Itaque earum rerum facilis. Similique sunt in ea commodi. Dolor repellendus numquam eius modi. Quam nihil molestiae consequatur, vel illum, qui ratione voluptatem accusantium doloremque.</div>
					      <div class="footer-comment">
					        <span class="vote plus" title="Нравится">
					          <i class="fa fa-thumbs-up"></i>
					        </span>
					        <span class="rating">
					          +1
					        </span>
					        <span class="vote minus" title="Не нравится">
					          <i class="fa fa-thumbs-down"></i>
					        </span>
					        <span class="devide">
					         |
					        </span>
					        <span class="comment-reply">
					         <a href="#" class="reply">ответить</a>
					        </span>
					      </div>

					      <!-- Вложенный медиа-компонент (уровень 2) -->
					      <div class="media">
					        <div class="media-left">
					          <a href="#">
					            <img class="media-object img-rounded" src="/img/avatar-2.jpg" alt="">
					          </a>
					        </div>
					        <div class="media-body">
					          <div class="media-heading">
					            <div class="author">Пётр</div>
					            <div class="metadata">
					              <span class="date">19 ноября 2015, 10:28</span>
					            </div>
					          </div>
					          <div class="media-text text-justify">Dolor sit, amet, consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet, consectetur, adipisci velit, sed quia consequuntur magni dolores. Ab illo inventore veritatis et quasi architecto. Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non numquam eius modi tempora. Corporis suscipit laboriosam, nisi ut labore et aut reiciendis.</div>
					          <div class="footer-comment">
					            <span class="vote plus" title="Нравится">
					              <i class="fa fa-thumbs-up"></i>
					            </span>
					            <span class="rating">
					              +0
					            </span>
					            <span class="vote minus" title="Не нравится">
					              <i class="fa fa-thumbs-down"></i>
					            </span>
					            <span class="devide">
					              |
					            </span>
					            <span class="comment-reply">
					              <a href="#" class="reply">ответить</a>
					            </span>
					          </div>

							      <!-- Вложенный медиа-компонент (уровень 3) -->
					          <div class="media">
					            <div class="media-left">
					              <a href="#">
					                <img class="media-object img-rounded" src="/img/avatar-3.jpg" alt="">
					              </a>
					            </div>
					            <div class="media-body">
					              <div class="media-heading">
					                <div class="author">Александр</div>
					                <div class="metadata">
					                  <span class="date">Вчера в 19:34</span>
					                </div>
					              </div>
					              <div class="media-text text-justify">Amet, consectetur, adipisci velit, sed ut labore et dolore. Maiores alias consequatur aut perferendis doloribus asperiores. Voluptas nulla vero eos. Minima veniam, quis nostrum exercitationem ullam corporis. Atque corrupti, quos dolores eos, qui blanditiis praesentium voluptatum deleniti atque corrupti. Quibusdam et harum quidem rerum necessitatibus saepe eveniet, ut enim ipsam. Magni dolores et dolorum fuga nostrum exercitationem ullam. Eligendi optio, cumque nihil molestiae consequatur.</div>
					              <div class="footer-comment">
					                <span class="vote plus" title="Нравится">
					                  <i class="fa fa-thumbs-up"></i>
					                </span>
					                <span class="rating">
					                  +5
					                </span>
					                <span class="vote minus" title="Не нравится">
					                  <i class="fa fa-thumbs-down"></i>
					                </span>
					                <span class="devide">
					                  |
					                </span>
					                <span class="comment-reply">
					                  <a href="#" class="reply">ответить</a>
					                </span>
					              </div>
					            </div>
					          </div>
					          <!-- Конец вложенного комментария (уровень 3) -->

					        </div>
					      </div>
						    <!-- Конец вложенного комментария (уровень 2) -->

					      <!-- Ещё один вложенный медиа-компонент (уровень 2) -->
					      <div class="media">
					        <div class="media-left">
					          <a href="#">
					            <img class="media-object img-rounded" src="/img/avatar-3.jpg" alt="">
					          </a>
					        </div>
					        <div class="media-body">
					          <div class="media-heading">
					            <div class="author">Сергей</div>
					            <div class="metadata">
					              <span class="date">20 ноября 2015, 17:45</span>
					            </div>
					          </div>
					          <div class="media-text text-justify">Ex ea voluptate velit esse, quam nihil impedit, quo minus id quod. Totam rem aperiam eaque ipsa, quae ab illo. Minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Iste natus error sit voluptatem. Sunt, explicabo deleniti atque corrupti, quos dolores et expedita.</div>
					          <div class="footer-comment">
					            <span class="vote plus" title="Нравится">
					              <i class="fa fa-thumbs-up"></i>
					            </span>
					            <span class="rating">
					              +1
					            </span>
					            <span class="vote minus" title="Не нравится">
					              <i class="fa fa-thumbs-down"></i>
					            </span>
					            <span class="devide">
					              |
					            </span>
					            <span class="comment-reply">
					              <a href="#" class="reply">ответить</a>
					            </span>
					          </div>
					        </div>
					      </div>
					      <!-- Конец ещё одного вложенного комментария (уровень 2) -->

					  	</div>
					  </li>
					  <!-- Конец комментария (уровень 1) -->

					  <!-- Комментарий (уровень 1) -->
					  <li class="media">
					    <div class="media-left">
					      <a href="#">
					        <img class="media-object img-rounded" src="/img/avatar-1.jpg" alt="">
					      </a>
					    </div>
					    <div class="media-body">
					      <div class="media-heading">
					        <div class="author">Иван</div>
					        <div class="metadata">
					          <span class="date">Вчера в 17:34</span>
					        </div>
					      </div>
					      <div class="media-text text-justify">Eum iure reprehenderit, qui dolorem eum fugiat. Sint et expedita distinctio velit. Architecto beatae vitae dicta sunt, explicabo unde omnis. Qui aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto. Nemo enim ipsam voluptatem quia. Eos, qui ratione voluptatem sequi nesciunt, neque porro. A sapiente delectus, ut enim ipsam voluptatem, quia non recusandae architecto beatae.</div>
					      <div class="footer-comment">
					        <span class="vote plus" title="Нравится">
					          <i class="fa fa-thumbs-up"></i>
					        </span>
					        <span class="rating">
					          +2
					        </span>
					        <span class="vote minus" title="Не нравится">
					          <i class="fa fa-thumbs-down"></i>
					        </span>
					        <span class="devide">
					          |
					        </span>
					        <span class="comment-reply">
					          <a href="#" class="reply">ответить</a>
					        </span>
					      </div>
					    </div>
					  </li>
					  <!-- Конец комментария (уровень 1) -->

					  <!-- Комментарий (уровень 1) -->
					  <li class="media">
					    <div class="media-left">
					      <a href="#">
					        <img class="media-object img-rounded" src="/img/avatar-1.jpg" alt="">
					      </a>
					    </div>
					    <div class="media-body">
					      <div class="media-heading">
					        <div class="author">Дима</div>
					        <div class="metadata">
					          <span class="date">3 минуты назад</span>
					        </div>
					      </div>
					      <div class="media-text text-justify">Tempore, cum soluta nobis est et quas. Quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in. Obcaecati cupiditate non recusandae impedit. Hic tenetur a sapiente delectus. Facere possimus, omnis dolor repellendus inventore veritatis et voluptates. Ipsa, quae ab illo inventore veritatis et quasi architecto beatae. In culpa, qui in culpa. Cum soluta nobis est laborum et aut perferendis doloribus. Vitae dicta sunt, explicabo perspiciatis. Amet, consectetur, adipisci velit, sed quia voluptas sit, aspernatur. Obcaecati cupiditate non provident, similique sunt in. Reiciendis voluptatibus maiores alias consequatur aut officiis debitis aut perferendis doloribus asperiores. Assumenda est, omnis dolor repellendus voluptas assumenda est omnis.</div>
					      <div class="footer-comment">
					        <span class="vote plus" title="Нравится">
					          <i class="fa fa-thumbs-up"></i>
					        </span>
					        <span class="rating">
					          +0
					        </span>
					        <span class="vote minus" title="Не нравится">
					          <i class="fa fa-thumbs-down"></i>
					        </span>
					        <span class="devide">
					          |
					        </span>
					        <span class="comment-reply">
					          <a href="#" class="reply">ответить</a>
					        </span>
					      </div>
					    </div>
					  </li>
					  <!-- Конец комментария (уровень 1) -->

					</ul>
				</div>
			</div>

    </main>

		<? $site->view('footer', $path_blocks); ?>

	</body>
</html>
