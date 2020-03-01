<?
  foreach ($data['tasks'] as $row) {
?>
    <div class="card border-light mb-3" >
      <div class="card-body">
        <h5 class="card-title"><? echo $row['user']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><? echo $row['email']; ?></h6>
        <p class="card-text"><? echo $row['body']; ?></p>
      </div>
      <div class="card-footer text-muted">
        <? echo $row['status']  ?>
      </div>
    </div>
<?
  }
?>
