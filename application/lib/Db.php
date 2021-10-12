<?php
namespace application\lib;

use PDO;

class Db {
  protected $db;

  public function __construct() {
    $config = require CONFIG_PATH.'db.php';
    $opt = [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      \PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $this->db = new PDO(
      'mysql:host='.$config['host'].
      ';dbname='.$config['db_name'],
      $config['user'],
      $config['password'],
      $opt);
  }

  public function query($sql, $params) {
    $sth = $this->db->prepare($sql);
    if (!empty($params)) {
      foreach ($params as $key => $value) {
        $sth->bindValue(":$key", $value);
      }
    }
    $sth->execute();
    return $sth;
  }

  public function getDb() {
    return $this->db;
  }

  public function row($sql, $params = []) {
    $result = $this->query($sql, $params);
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single($sql, $params = []) {
    $result = $this->query($sql, $params);
    return $result->fetch(PDO::FETCH_ASSOC);
  }

  public function column($sql, $params = []) {
    $result = $this->query($sql, $params);
    return $result->fetchColumn();
  }

  public function lastInsertID() {
    return $this->db->lastInsertId();
  }
}
