<?
  class Tasks_controller extends Controller {
    public function __construct() {
      parent::__construct();
      
      require 'models/task.php';
      $this->model = new Task();
    }
 
    public function page($page_num = 1) {
      $this->cur_page = $page_num;
      if (isset($_POST['sort_field'])) {
        $sort_field = $_POST['sort_field'];
        $_SESSION['sort_field'] = $_POST['sort_field'];
      } elseif (isset($_SESSION['sort_field'])) {
        $sort_field = $_SESSION['sort_field'];
      } else {
        $sort_field = 'id';
      }
      $data['tasks']       = $this->model->get_list($page_num, $sort_field);
      $data['cur_page']    = $page_num;
      $data['total_pages'] = $this->total_pages();
      $data['sort_field']  = $sort_field;
      $this->view->render('task_list', $data);
      if (isset($_SESSION['flash_msg'])){
        unset($_SESSION['flash_msg']);
      }

    } 

    public function new() {
      $this->view->render('task_new');

      if (isset($_SESSION['flash_msg'])){ 
        unset($_SESSION['flash_msg']);
      }
    }

 
    public function create() {
      $isSaved = $this->model->save();
      $_SESSION['flash_msg'] = $isSaved['msg'];
      if ($isSaved['id']) {
        $last_page_num = ceil($isSaved['id']/$this->model::LIMIT);
        header('Location: /tasks/page/'.$last_page_num);
      } else {
        header('Location: /tasks/new');
      }
    }
   
    public function edit($task_id) {
      $task = $this->model->get($task_id);
      $this->view->render('_form_edit',$task);
    }

    public function update() {

      if (!isset($_SESSION['user_id'])) { header('Location: /login'); }
      if (isset($_POST['submit']) AND ($_POST['body'] != $_POST['old_task_body']) ) {
        $this->model->update();
      }
      header('Location: /tasks/page/'.$_POST['page_num']);
    }

    public function solved() {
      if (isset($_POST['status'])) {
        $this->model->status();
      }
      header('Location: /tasks/page/'.$_POST['cur_page']);
    }

    function total_pages() {
      $total_rows  = $this->model->get_total_num();
      return ceil($total_rows/3);
    }
  }
?>
