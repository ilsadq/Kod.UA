<?php
namespace application\core;

class View {
  public $path, $route, $layout = 'default';

  public function __construct($route) {
    $this->route = $route;
    $this->path = $route['controller'].'/'.$route['action'];
  }

  public function render($title, $vars = []) {
    // debug($vars);
    extract($vars);
    $path = VIEWS_PATH.$this->path.'.php';
    if (file_exists($path)) {
      ob_start();
      require $path;
      $content = ob_get_clean();
      require LAYOUTS_PATH.$this->layout.'.php';
    } else {
      // Вид не найдден
      $this::errorCode(404);
    }
  }

  public function redirect($url) {
    header('location: '.$url);
    exit;
  }

  public static function errorCode($code) {
    $path = VIEWS_PATH.'errors/'.$code.'.php';
    if (file_exists($path)) {
      http_response_code($code);
      require $path;
      exit;
    }
  }

  public function message($status, $message) {
    exit(json_encode([
        'status' => $status,
        'message' => $message
      ]));
  }
}