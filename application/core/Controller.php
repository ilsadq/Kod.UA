<?php
namespace application\core;

abstract class Controller {
  public $route, $view, $model, $acl;

  public function __construct($route) {
    $this->route = $route;
    if (!$this->checkAcl()) {
      View::errorCode(403);
    }
    $this->view = new View($this->route);
    $this->model = $this->loadModel($route['controller']);
  }

  public function loadModel($name) {
    $path = str_replace('/', '\\', MODELS_PATH.ucfirst($name).'Model');
    if (class_exists($path)) {
      return new $path();
    }
    return null;
  }

  public function checkAcl(): bool {
    $this->acl = require ACL_PATH.$this->route['controller'].'.php';
    if ($this->isAcl('all')) {
      return true;
    }
    elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
      return true;
    }
    return false;
  }

  public function isAcl($key): bool {
    return in_array($this->route['action'], $this->acl[$key]);
  }
}