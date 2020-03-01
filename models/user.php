<?php
  class User extends Model {

    public function authenticate() {
      $name = $_POST['login'];
      $pass = $_POST['password'];
      $sql = "SELECT * FROM users WHERE name = ?";
      $sth = $this->db->prepare($sql);
      $sth -> bindParam(1, $name);
      $sth -> execute();
      $res = $sth->fetch();
      if ($res['id'] AND ($res['password'] == $pass)) {
        return $res['id'];
      } else { return; }  
    }
    
  }
?>
