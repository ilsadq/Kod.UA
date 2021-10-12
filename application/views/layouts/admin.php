<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="/public/styles/style.css">
  <link rel="stylesheet" href="/public/styles/bootstrap.css">
  <script defer src="<?=PUBLIC_SCRIPTS.'jquery.js'?>"></script>
  <script defer src="<?=PUBLIC_SCRIPTS.'form.js'?>"></script>
  <script defer src="<?=PUBLIC_SCRIPTS.'formEdit.js'?>"></script>
</head>
<body class="bg-dark">
  <?php if ($this->route['action'] != 'login'): ?>
    <header>
    <div class="container">
      <div id="header">
        <div class="d-flex justify-content-between">
          <div id="logo" class="d-inline">
          <a href="<?=$hrefs['index']?>" class="p-0">
            <img src="<?=MEDIA_PATH.'logo.svg'?>" alt="" />
          </a>
        </div>
        <div class="d-flex align-items-center">
          <div class=" bg-danger p-1 rounded mx-3">
            <?=$_SESSION['admin_name']?>
          </div>
          <ul id="header-menu" class="nav">
            <li class="nav-item">
              <a class="nav-link <?=$css['selected']['add']?>" href="<?=$hrefs['add']?>">
                Добавить
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$css['selected']['edit']?>" href="<?=$hrefs['edit']?>">
                Редактировать
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$css['selected']['delete']?>" href="<?=$hrefs['delete']?>">
                Удалить
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$css['selected']['exit']?>" href="<?=$hrefs['logout']?>">
                Выйти
              </a>
            </li>
          </ul>
        </div>
      </div>
      <hr />
      </div>
    </div>
  </header>
  <?php endif; ?>
  <main>
    <div class="container">
      <?=$content?>
    </div>
  </main>
</body>
</html>
