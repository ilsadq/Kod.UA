<?php
namespace application\models;

use application\core\Model;

class MainModel extends Model {
  public function getNews() {
    return $this->db->row(
      <<<SQL
        SELECT
          nw.id,
          nw.title,
          nw.date,
          nw.redactor,
          ni.path
        FROM
          news AS nw,
          news_images AS ni
        WHERE
          ni.news_id = nw.id
        ORDER BY nw.date DESC
SQL
    );
  }

  public function getNewsCount() {
    return $this->db->single('SELECT COUNT(*) FROM news');
  }

  public function getRedactor($id) {
    return $this->db->single(
      "SELECT id, admin_name, admin_email, img FROM admin_users WHERE id = :id",
      ['id' => $id]
    );
  }

  public function getNewsContent($id) {
    return $this->db->single(
      'SELECT
          content
       FROM
          news_content
       WHERE
          news_id = :id',
       ['id' => $id]);
  }

  public function getRedactors() {
    return $this->db->row('SELECT id, admin_name, admin_email, img FROM admin_users');
  }

  public function searchNews($req) {
    return $this->db->row(
      "SELECT
          *
        FROM
          `news` AS n
        WHERE
          n.title + ' ' + n.date LIKE '%:req%'",
          ['req' => $req]);
  }
}