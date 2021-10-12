<?php
require 'application/lib/Dev.php';

use application\core\Router;

const URL = '//kod.ua/';
const APPLICATION_PATH = 'application/';
const PUBLIC_PATH = URL.'public/';
const PUBLIC_SCRIPTS = PUBLIC_PATH.'scripts/';
const PUBLIC_STYLES = PUBLIC_PATH.'styles/';
const PUBLIC_FONTS = PUBLIC_PATH.'fonst/';
const PUBLIC_IMAGES = PUBLIC_PATH.'images/';
const CONTROLLERS_PATH = APPLICATION_PATH.'controllers/';
const VIEWS_PATH = APPLICATION_PATH.'views/';
const LIB_PATH = APPLICATION_PATH.'lib/';
const LAYOUTS_PATH = VIEWS_PATH.'layouts/';
const MODELS_PATH = APPLICATION_PATH.'models/';
const CORE_PATH = APPLICATION_PATH.'core/';
const CONFIG_PATH = APPLICATION_PATH.'config/';
const ACL_PATH = APPLICATION_PATH.'acl/';
const MEDIA_PATH = PUBLIC_PATH.'media/';
const MATERIAL_PATH = PUBLIC_PATH.'materials/';
const NEWS_PATH = 'public/materials/news/';

spl_autoload_register(function ($class) {
  $path = str_replace('\\', '/', $class.'.php');
  if (file_exists($path)) {
    require $path;
  }
});

session_start();

$router = new Router();
$router->run();