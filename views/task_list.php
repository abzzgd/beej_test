<h1> Task list </h1>


<?php 
  if (isset($_SESSION['flash_msg'])){
    echo '<div class="alert alert-success" role="alert">';
    echo $_SESSION['flash_msg'];
    echo '</div>';
  }

  include 'views/_form_sort.php';

  if (isset($_SESSION['user_id'])) { 
    include 'views/_admin_list.php';
  } else {
    include 'views/_plane_list.php';
  }
 
?>

<nav aria-label="Page navigation">
<ul class="pagination">
  <? if ($data['cur_page'] == 1) { ?>
    <li class="page-item disabled">
      <span class="page-link">«</span></li>
  <? } else {
    echo '<li class="page-item">';
    echo ' <a class="page-link" href="/tasks/page/'.($data['cur_page']-1).'">«</a></li>';
  }
  foreach ( range(1, $data['total_pages']) as $i) {
    if ($i==$data['cur_page']) { ?> 
      <li class="page-item active" >
        <span class="page-link">
          <? echo $i ?>
        </span>
      </li>
    <? } else {
      echo '<li class="page-item" ><a class="page-link" href="/tasks/page/'.$i.'">'.$i.'</a></li>';
    }
  }
  if ($data['cur_page'] == $data['total_pages']) { ?>
    <li class="page-item disabled">
      <span class="page-link">»</span></li>
  <? } else {
    echo '<li class="page-item">';
    echo ' <a class="page-link" href="/tasks/page/'.($data['cur_page']+1).'">»</a></li>';
  }?>

</ul>
</nav>


