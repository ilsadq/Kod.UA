<?php
namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {
  public $hrefs = [
    'main' => 'http://kod.ua/',
    'news' => 'http://kod.ua/news',
    'about' => 'http://kod.ua/about',
    'search' => 'http://kod.ua/search',
    'contacts' => 'http://kod.ua/contacts',
    'telegram' => 'https://telegram.org/',
    'instagram' => 'https://www.instagram.com/',
    'facebook' => 'https://ru-ru.facebook.com/',
    'twiter' => 'https://twitter.com/',
    'errors' => 'https://t.me/mistake_kod_bot',
  ];

  public function indexAction() {
    $this->view->redirect($this->hrefs['news']);
  }

  public function aboutAction() {
    $this->view->render(
      'О нас',
      [
        'hrefs' => $this->hrefs,
        'css' => [
          'selected' => [
            'news' => '',
            'about' => 'bg-danger',
            'article' => '',
            'contacts' => ''
          ]
          ],
          'contacts' => [ // Тут придумать размещение ссылок
            [
              'text' => 'По вопросам размещения рекламы и спецпроектов - ',
              'link' => 'adua@kod.ua',
              'mail' => 'adua@kod.ua'
            ],
            [
              'text' => 'Директор по продукту - ',
              'link' => 'aik@kod.ua',
              'mail' => 'Гайк Даллакян'
            ],
            [
              'text' => 'Нашли баг на сайте? Есть рекомендации и пожелания? Пишите: ',
              'link' => 'support@kod.ua',
              'mail' => 'support@kod.ua'
            ]
          ],
          'admin' => $this->model->getRedactor($_SESSION['admin'])
      ]
    );
  }

  public function contactsAction() {
    $this->view->render(
      'Контакты',
      [
        'hrefs' => $this->hrefs,
        'css' => [
          'selected' => [
            'news' => '',
            'about' => '',
            'article' => '',
            'contacts' => 'bg-danger'
          ]
          ],
          'contacts' => [
            'Главный редактор' => [
              'name' => 'Michael Vernik',
              'href' => 'vernik@kod.ua'
            ],
            'Шеф-редактор' => [
              'name' => 'Кирилл Сергеев',
              'href' => 'kirill@kod.ua'
            ],
            'Редактор утренних новостей' => [
              'name' => 'Игорь Савкин',
              'href' => 'savkin@kod.ua'
            ],
            'Редактор' => [
              'name' => 'Гор Хачатрян',
              'href' => 'gor@kod.ua'
            ]
            ],
            'admin' => $this->model->getRedactor($_SESSION['admin'])
      ]
    );
  }

  public function searchAction() {
    if (!empty($_POST)) {
      exit(json_encode($this->model->searchNews($_POST['req'])));
    }
    else {
      $this->view->render(
        'Поиск',
        [
          'hrefs' => $this->hrefs,
          'css' => [
            'selected' => [
              'news' => '',
              'about' => '',
              'search' => 'bg-danger',
              'contacts' => ''
            ]
            ],
            'card_title' => 'Авторские материалы от редакции. Своё мнение, своя аналитика, свои прогнозы. Совместная работа с экспертами рынка.',
            'admin' => $this->model->getRedactor($_SESSION['admin'])
        ]
      );
    }
  }

  public function newsAction() {
    if (!empty($this->route['id'])) {
      $this->view->layout = 'news';
      $news = $this->model->getNewsContent($this->route['id']);
      $this->view->render(
        'Новость',
        [
          'hrefs' => $this->hrefs,
          'news' => $news
        ]
      );
    }
    else {
      $this->view->render(
        'Новости',
        [
          'hrefs' => $this->hrefs,
          'css' => [
            'selected' => [
              'news' => 'bg-danger',
              'about' => '',
              'article' => '',
              'contacts' => ''
            ],
          ],
          'news' => $this->model->getNews(),
          'news_count' => $this->model->getNewsCount(),
          'card_title' => 'Главные события вокруг украинской и мировой IT-индустрии. Только свежая и ценная информация.',
          'redactors' => $this->model->getRedactors(),
          'admin' => $this->model->getRedactor($_SESSION['admin'])
        ]
      );
    }
  }
}