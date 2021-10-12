<?php
namespace application\models;

use application\core\Model;

class AdminModel extends Model {
  public $error;

  public function loginValidate($login, $password) {
    $params = [
      'login' => $login,
      'password' => $password
    ];
    $res = $this->db->single(
      'SELECT
          id
        FROM
          admin_users
        WHERE
          admin_login = :login
        AND
          admin_password = :password',
        $params);
    if (!empty($res['id'])) {
      return $res['id'];
    }
    $this->error ='Неправильный логин или пароль';
    return;
  }

  public function addNews($params) {
    // Добавить новость и вернуть id новости
    $this->db->query('
    INSERT INTO news
    (
        title,
        date,
        redactor
    )
    VALUES
    (
        :title,
        :date,
        :redactor
    )', $params);
    return $this->db->lastInsertID();
  }

  public function addImage($val = []) {
    // Создать папку по id последней новости
    mkdir('public/materials/news/'.$val['id']);
    // Переместить картинку в эту паапку
    $path = 'public/materials/news/'.$val['id'].'/'.$val['img'];
    move_uploaded_file(
      $val['path'],
      $path
    );
    $this->db->query('
    INSERT INTO news_images
    (
        path,
        news_id
    )
    VALUES
    (
      :path,
      :news_id
    )',
    [
      'path' => $path,
      'news_id' => $val['id']
    ]);
  }

  public function addNewsContent($params = []) {
    $this->db->query(
      'INSERT INTO news_content
      (
          news_id,
          content
      )
      VALUES
      (
        :news_id,
        :content
      )',
    $params);
  }

  public function getAdminFio($id) {
    return $this->db->single(
      'SELECT admin_name FROM admin_users WHERE id = :id',
      ['id' => $id]);
  }

  public function getNewsContent($id) {
    return $this->db->single(
      'SELECT
          n.id,
          n.title,
          nc.content
        FROM
          news n,
          news_content nc
        WHERE
          nc.news_id = n.id AND
          n.id = :id',
      ['id' => $id]
    );
  }

  public function editNews($params = []) {
    debug($params);
    // Редактирование title
    $this->db->query(
      'UPDATE
          news
        SET
          title = :title
        WHERE
          id = :id',
      [
        'title' => $params['title'],
        'id' => $params['id']
      ]);
    // Редактирование content
    $this->db->query(
      'UPDATE
          `news_content`
        SET
          content = :content
        WHERE
          news_id = :id',
      [
        'content' => $params['content'],
        'id' => $params['id']
      ]);
  }

  public function getNews() {
    return $this->db->row(
      'SELECT
          *
        FROM
          news
          ');
  }

  public function deleteNews($id) {
    // Удалить данные из бд
    $this->db->query(
      'DELETE FROM `news_images`
      WHERE id = :id;
      DELETE FROM `news_content`
      WHERE news_id = :id;
      DELETE FROM `news`
      WHERE id = :id;', ['id' => $id]);
    // Удалить папку по id
    $this->dirDel('public/materials/news/'.$id);
  }

  function dirDel ($dir) {
    $d = opendir($dir);
    while(($entry = readdir($d)) !== false) {
        if ($entry != "." && $entry != "..") {
            if (is_dir($dir."/".$entry)) {
                $this->dirDel($dir."/".$entry);
            } else {
                unlink ($dir."/".$entry);
            }
        }
    }
    closedir($d);
    rmdir ($dir);
 }

}