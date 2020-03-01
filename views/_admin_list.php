<form action="/tasks/solved" method="post">
<?
  foreach ($data['tasks'] as $row) {
?>
    <div class="card border-light mb-3" >
      <div class="card-body">
        <h5 class="card-title"><? echo $row['user']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted d-inline"><? echo $row['email']; ?></h6>
             <div class="d-inline pl-6">
                 <a href="/tasks/edit/<? echo $row['id'] ?>">Редактировать</a>
               </div>

        <p class="card-text"><? echo $row['body']; ?></p>
      </div>
      <div class="card-footer text-muted">
        <? if (isset($row['status']) ) { 
             echo $row['status'];
             if (strpos($row['status'], 'выполнено') === false) {
        ?>     <div class="d-inline checkbox ml-4">
                 <label> выполнено : <input type="checkbox" name ="status[<? echo $row['id']; ?>]"> </label>
               </div>
        <?   }
           } else { ?>
             <div class="d-inline checkbox pr-2">
               <label> выполнено : <input type="checkbox" name ="status[<? echo $row['id']; ?>]"> </label>
             </div>
        <? } ?>
      </div>
    </div>
<?
  }
?>
 
  <input type="hidden" name = "cur_page" value="<? echo $data['cur_page'] ?>">
  <input type="submit" value="Сохранить">
</form>
