<?
  if (isset($_SESSION['flash_msg'])) {
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['flash_msg'];
    echo '</div>';
  } 
?>

<div class="col-3">
<form class="form" action="session/create" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Login</h1>
  <div class="form-group">
    <label>Login</label>
    <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
  </div>  
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>  
  <div class = "mt-5">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
  </div>
</form>
</div>
