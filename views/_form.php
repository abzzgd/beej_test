<div class="col-6">
  <form class="form" action="/tasks/create" method="post">
    <h1 class="h3 mb-3 font-weight-normal">New task</h1>
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="user" class="form-control" placeholder="User" required autofocus>
    </div>  
    <div class="form-group">
      <label>Email address</label>
      <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    </div>  
  
    <div class="form-group">
      <label>Task</label>
      <textarea  name="body" class="form-control" rows="7" required></textarea>
    </div>  
  
    <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
  </form>
</div>
