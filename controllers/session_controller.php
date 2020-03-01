<?
  class Session_controller  extends Controller {
    public function __construct() {
      parent::__construct();
      
      require 'models/user.php';
      $this->model = new User();
    }

    public function login() {
      $this->view->render('_form_login');
      
      if (isset($_SESSION['flash_msg'])){
        unset($_SESSION['flash_msg']);
      }
    }

    public function create() {
      $user_id = $this->model->authenticate();
      if ($user_id) {
        $_SESSION['user_id'] = $user_id; 
        header('Location: /');
      } else {
        $_SESSION['flash_msg'] = 'Неверные имя админа, пароль';
        header('Location: /login');
      }
    }

    public function logout() {
      unset($_SESSION['user_id']);
      session_destroy();
      header('Location: /');
    }
  }
?>
