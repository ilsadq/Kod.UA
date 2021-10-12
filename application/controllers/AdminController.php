<?php
namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller {
  public $hrefs = [
    'add' => 'http://kod.ua/add',
    'delete' => 'http://kod.ua/delete',
    'edit' => 'http://kod.ua/edit',
    'index' => 'http://kod.ua/',
    'logout' => 'http://kod.ua/logout'
  ];

  public function __construct($route) {
    parent::__construct($route);
    $this->view->layout = 'admin';
  }

  public function adminAction() {
    if (!empty($_POST)) {
      $id = $this->model->addNews([
        'title' => $_POST['title'],
        'redactor' => $_POST['redactor'],
        'date' => $_POST['date']
      ]);
      $this->model->addImage([
        'id' => $id,
        'img' => 'card.jpg'
      ]);
    }

    $this->view->render(
      'Админ Панель',
      [
        'hrefs' => $this->hrefs,
        'css' => [
          'selected' => [
            'add' => 'text-white',
            'delete' => 'text-white',
            'edit' => 'text-white',
            'exit' => 'text-white'
          ]
        ]
      ]
    );
  }

  public function loginAction() {
    // Редирект если админ уже есть
    if (!empty($_SESSION['admin'])) {
      $this->view->redirect(URL.'add');
    }
    // Проверка логина и пароля
    if (!empty($_POST)) {
      $admin_id = $this->model->loginValidate($_POST['login'], $_POST['password']);
      if (!empty($admin_id)) {
        $_SESSION['admin'] = $admin_id;
        $_SESSION['admin_name'] = $this->model->getAdminFio($admin_id)['admin_name'];
        exit('success');
      } else {
        exit($this->model->error);
      }
    }
    $this->view->render('Вход');
  }

  public function logoutAction() {
    unset($_SESSION['admin']);
    unset($_SESSION['admin_name']);
    $this->view->redirect('login');
  }

  public function addAction() {
    if (!empty($_POST)) {
      // Добавить новость
      $id = $this->model->addNews([
        'title' => $_POST['title'],
        'redactor' => $_SESSION['admin'],
        'date' => date('Y-m-d H:m:s')
      ]);
      // Добавить картинку новости
      $this->model->addImage([
        'id' => $id,
        'img' => $_FILES['image']['name'],
        'path' => $_FILES['image']['tmp_name']
      ]);
      // Добавить контент новости
      $this->model->addNewsContent([
        'news_id' => $id,
        'content' => $_POST['content']
      ]);
    }

    $this->view->render(
      'Добавить',
      [
        'hrefs' => $this->hrefs,
        'css' => [
          'selected' => [
            'add' => 'text-danger',
            'delete' => 'text-white',
            'edit' => 'text-white',
            'exit' => 'text-white'
          ]
        ]
      ]
    );
  }

  public function editAction() {
    if (!empty($_POST)) {
      debug($_POST);
      $this->model->editNews([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'id' => $_POST['id']
      ]);
      exit;
    }
    else if (!empty($this->route['id'])) {
      $this->view->render(
        'Редактировать',
        [
          'hrefs' => $this->hrefs,
          'css' => [
            'selected' => [
            'add' => 'text-white',
            'delete' => 'text-white',
            'edit' => 'text-danger',
            'exit' => 'text-white'
            ]
          ],
          'news' => $this->model->getNewsContent($this->route['id'])
        ]
      );
      exit;
    } else {
      $this->view->render(
        'Редактировать',
        [
          'hrefs' => $this->hrefs,
          'css' => [
            'selected' => [
              'add' => 'text-white',
              'delete' => 'text-white',
              'edit' => 'text-danger',
              'exit' => 'text-white'
            ]
            ],
            'news' => $this->model->getNews()
        ]
      );
    }
  }

  public function deleteAction() {
    if (!empty($_POST)) {
      $this->model->deleteNews(intval($_POST['id']));
    }
    $this->view->render(
      'Удалить',
      [
        'hrefs' => $this->hrefs,
        'css' => [
          'selected' => [
            'add' => 'text-white',
            'delete' => 'text-danger',
            'edit' => 'text-white',
            'exit' => 'text-white'
            ],
          ],
          'news' => $this->model->getNews()
      ]
    );
  }
}