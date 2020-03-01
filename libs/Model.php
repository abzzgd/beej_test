<?php
  class Model {
    public function __construct() {

      $host = 'localhost';
      $db   = 'bj';
      $user = 'root';
      $pass = '';
      $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
      ];
      
      $this->db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, $opt);
    }
  }
?>
