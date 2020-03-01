<?php
  class Task extends Model {
   
    const LIMIT = 3;  
  
    public function get_list($page, $sort_field) {
      $sql = "SELECT * FROM tasks ".( $sort_field == 'id' ? '' : 'ORDER BY '.$sort_field )." limit ? offset ?";
      $sth = $this->db->prepare($sql);
      $lim = self::LIMIT;
      $ofs = ($page-1)*$lim;
      $sth -> bindParam(1, $lim);
      $sth -> bindParam(2, $ofs);
      $sth -> execute();
      $res = $sth->fetchAll();
      return $res;
    }


    public function get($task_id) {
      $sql = "SELECT * FROM tasks WHERE id = ?";
      $sth = $this->db->prepare($sql);
      $sth -> bindParam(1, $task_id);
      $sth -> execute();
      $res = $sth->fetch();
      $res['page_num'] = ceil($task_id/self::LIMIT); 
      return $res;
    }

    public function save() {
      $user  = $_POST['user'];
      $email = $_POST['email'];
      $body  = $_POST['body'];
      $isValid = $this->_validation($user,$email,$body);

      if (! $isValid[0]) { return $isValid; } 

      $sql = "INSERT INTO tasks(user,email,body) values (?,?,?)";
      $sth = $this->db->prepare($sql);
      $sth -> bindParam(1,$user);
      $sth -> bindParam(2,$email);
      $sth -> bindParam(3,$body);
      $sth->execute();
      $id = $this->db->lastInsertId();
      return ['id' => $id, 'msg' => 'ЗАДАЧА УСПЕШНО ДОБАВЛЕНА!'];
    }

    public function update() {
      $sql = "UPDATE tasks set body = ?, status = ?  WHERE id = ?";
      $sth = $this->db->prepare($sql);
      $sth -> bindParam(1,$_POST['body']);
      $status = ($_POST['status']? 'выполнено ' : '').'отредактировано администратором';
      $sth -> bindParam(2,$status);
      $sth -> bindParam(3,$_POST['id']);
      $sth->execute();
    }

    public function status() {
      $sql = 'UPDATE tasks SET status = CONCAT("выполнено ", ifnull(status,"")) 
              WHERE id in ('.implode(',', array_keys($_POST['status'])).')';
      $sth = $this->db->prepare($sql);
      $sth->execute();
    }


    public function get_total_num() {
      $sql = "SELECT COUNT(*) as cnt FROM tasks";
      $sth = $this->db->query($sql);
      return $sth->fetch()['cnt']; 
    }

    function _validation($user, $email, $body) { 
      if (empty($user) || empty($email) || empty($body)) { 
        return [ 0, 'msg' => 'required fields are empty'];
      }
        
      if (! $this->isValidEmail($email)) { 
        return [ 0, 'msg' => 'wrong email'];
      }
      return [1]; 
    }

    function isValidEmail($email){
      return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email);
    }

  }
?>
