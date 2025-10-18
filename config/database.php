<?php
class Database {
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $dbname = 'db_admin';

  protected $conn;

  public function __construct() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    if ($this->conn->connect_error) {
      die("Koneksi gagal: " . $this->conn->connect_error);
    }
  }

  public function getConn() {
    return $this->conn;
  }
}
?>
