<?php
  class Database extends PDO {
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
      parent::__construct("mysql:host=$host;dbname=$db", $user, $pass, $opt);
    }
  }
?>
