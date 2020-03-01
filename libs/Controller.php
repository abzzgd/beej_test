<?
  class Controller {
    public function __construct() {
      session_start();
      $this->view = new View();
    }
  }
?>
