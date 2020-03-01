<!DOCTYPE html>
<HTML>
<HEAD>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Главная</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</HEAD>
<BODY>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="/tasks/newform">Новая задача</a>
      </li>
      <li class="nav-item">
        <? if ($_SESSION['user_id']) { ?> 
          <a class="nav-link" href="/logout">выйти</a>
        <? } else { ?>
          <a class="nav-link" href="/login">admin</a>
        <? } ?>
      </li>
    </ul>
