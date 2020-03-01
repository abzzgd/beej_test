<?
  
  require_once 'libs/Controller.php';
  require_once 'libs/View.php';
  require_once 'libs/Model.php';

  $route = explode('/',$_SERVER["REQUEST_URI"]);

  if (empty($route[1]) OR $route[1] == 'index.html') { 
    $route[1] = 'tasks'; 
    $route[2] = 'page';
  } elseif (($route[1] == 'login') OR ($route[1] == 'logout')) {
    $route[2] = $route[1];
    $route[1] = 'session'; 
  }


  $route[1] = $route[1].'_controller';
  require_once 'controllers/'.$route[1].'.php';
  $controller = new $route[1];
  $action = $route[2] ? $route[2] : 'page';
  if (isset($route[3]) AND $route[3]) { 
    $controller->$action($route[3]);
  } else {
    $controller->$action();
  }
?>
