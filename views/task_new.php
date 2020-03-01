
<?
  if (isset($_SESSION['flash_msg'])) { 
    
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['flash_msg'];
    echo '</div>';
  
  }

  include 'views/_form.php';
?>
