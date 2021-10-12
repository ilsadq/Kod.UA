<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=PUBLIC_STYLES.'style.css'?>">
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
    crossorigin="anonymous"
  />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  <script defer src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <header class="p-3 text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div id="logo">
          <a href="<?=$hrefs['main']?>">
            <img src="<?=MEDIA_PATH.'logo.svg'?>" />
          </a>
        </div>
        <form
          id="search-form"
          class="d-flex input-group-sm"
          method="POST"
          action=""
          >
          <input
            type="search"
            class="form-control form-control-dark m-1 border-dark"
            placeholder="Search..."
            aria-label="Search"
            />
          <button type="submit" class="btn m-auto">
            <span class="fs-5">
              <i class="fas fa-search"></i>
            </span>
          </button>
        </form>
      </div>
      <hr />
      <div class="d-flex justify-content-center">
          <ul id="header-menu" class="nav">
            <li class="nav-item <?=$css['selected']['news']?>">
              <!--bg-danger если выбран елемент меню-->
              <a class="nav-link text-white" href="<?=$hrefs['news']?>">Новости</a>
            </li>
            <li class="nav-item <?=$css['selected']['search']?>">
              <a class="nav-link text-white" href="<?=$hrefs['search']?>">Поиск</a>
            </li>
            <li class="nav-item <?=$css['selected']['about']?>">
              <a class="nav-link text-white" href="<?=$hrefs['about']?>">О нас</a>
            </li>
            <li class="nav-item <?=$css['selected']['contacts']?>">
              <a class="nav-link text-white" href="<?=$hrefs['contacts']?>">Контакты</a>
            </li>
          </ul>
        </div>
      <hr class="m-0" />
      </div>
    </div>
  </header>
  <div class="container">
    <main class="d-flex justify-content-center text-center">
      <div id="news-content" class="w-75">
        <?=$news?>
      </div>
    </main>
  </div>
  <footer>
    <div class="container mt-5">
      <hr />
      <div class="justify-content-start col-3 d-flex text-nowrap">
        <div class="m-3">
          <h4>Навигация</h4>
          <ul class="nav row">
            <li><a href="<?=$hrefs['news']?>">Новости</a></li>
            <li><a href="<?=$hrefs['article']?>">Статьи</a></li>
            <li><a href="<?=$hrefs['about']?>">О нас</a></li>
            <li><a href="<?=$hrefs['contacts']?>">Контакты</a></li>
          </ul>
        </div>
        <div class="m-3">
          <h4>Социальные сети</h4>
          <ul class="nav row">
            <li><a href="<?=$hrefs['telegram']?>">Telegram</a></li>
            <li><a href="<?=$hrefs['instagram']?>">Instagram</a></li>
            <li><a href="<?=$hrefs['facebook']?>">Facebook</a></li>
            <li><a href="<?=$hrefs['twiter']?>">Twiter</a></li>
          </ul>
        </div>
      </div>
      <hr />
      <div class="mt-3 d-flex justify-content-between">
        <div><a href="<?=$hrefs['errors']?>">Нашли ошибку? Сообщите нам о ней!</a></div>
        <div><a href="<?=$hrefs['main']?>">Код UA, 2021</a></div>
      </div>
    </div>
  </footer>
</body>
</html>