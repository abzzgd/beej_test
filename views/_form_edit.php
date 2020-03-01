<div class="col-6">
  <form class="form" action="/tasks/update" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Edit task</h1>
    <input type="hidden" name="id" value=<? echo $data['id']; ?>>
    <div class="form-group row">
      <label class = "col-sm-3 col-form-label">Name :</label>
      <div class = "col-sm-6">
        <input type="text" readonly class="form-control-plaintext"  value="<? echo $data['user']; ?>"  >
      </div>  
    </div>  
    <div class="form-group row">
      <label class = "col-sm-3 col-form-label">Email address :</label>
      <div class = "col-sm-6">
        <input type="text" readonly class="form-control-plaintext"  value="<? echo $data['email']; ?>"  >
      </div>  
    </div>  
  
    <div class="form-group">
      <label>Task :</label>
      <textarea  name="body" class="form-control" rows="7"><? echo $data['body'];?></textarea>
    </div>  
    <input type="hidden" name="old_task_body" value="<? echo $data['body'];?>">
    <input type="hidden" name="page_num" value="<? echo $data['page_num']; ?>">
    <label>выполнено:</label>
    <input class ="ml-4" type="checkbox" name="status" <? echo (strpos($data['status'],'выполнено') !== false)? 'checked':''; ?>><br>
  
    <button class="btn btn-primary btn-block" name = "submit" type="submit">Сохранить</button>
  </form>
</div>
