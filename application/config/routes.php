<?php

return [
  // MainController
  '' => [
    'controller' => 'main',
    'action' => 'index'
  ],
  'about' => [
    'controller' => 'main',
    'action' => 'about'
  ],
  'contacts' => [
    'controller' => 'main',
    'action' => 'contacts'
  ],
  'search' => [
    'controller' => 'main',
    'action' => 'search'
  ],
  'news/{id:\d+}' => [
    'controller' => 'main',
    'action' => 'news'
  ],
  'news' => [
    'controller' => 'main',
    'action' => 'news'
  ],
  // AdminController
  'login' => [
    'controller' => 'admin',
    'action' => 'login'
  ],
  'logout' => [
    'controller' => 'admin',
    'action' => 'logout'
  ],
  'add' => [
    'controller' => 'admin',
    'action' => 'add'
  ],
  'edit/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'edit'
  ],
  'edit' => [
    'controller' => 'admin',
    'action' => 'edit'
  ],
  'delete/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'delete'
  ],
  'delete' => [
    'controller' => 'admin',
    'action' => 'delete'
  ],
];