<header>
  <div class="container d-flex justify-content-between mt-3 mb-3">
    <div class="text-center">
      <img src="/img/logo.png" class="d-inline-block align-top mr-2" alt=""> <span class="font-weight-bold">Портал</span>
    </div>
    <div>
      <button type="button" class="btn btn-outline-primary d-none d-lg-block" data-toggle="modal" data-target="#modal-profile">Профиль</button>
    </div>
  </div>
  <hr class="mt-0 mb-0 d-none d-lg-block">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <button class="navbar-toggler mx-auto mb-3" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-main">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
          <li class="nav-item mr-3">
            <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="/top/">ТОП-10 предложений</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="/api/">API</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/news/">Новости</a>
          </li>
          <li class="nav-item">
            <hr class="d-block d-lg-none">
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-outline-primary d-block d-lg-none mx-auto my-3" data-toggle="modal" data-target="#modal-profile">Профиль</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr class="mt-0 mb-0">
</header>

<!-- Modal -->
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Профиль</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Email или логин</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label">Запомнить вход</label>
          </div>
        </form>
      </div>
      <div class="modal-footer mx-auto">
        <button type="button" class="btn btn-primary" onclick="document.location='/reg'">Регистрация</button>
        <button type="button" class="btn btn-outline-primary" onclick="document.location='/profile'">Авторизация</button>
      </div>
    </div>
  </div>
</div>
