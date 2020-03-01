<form action="/" method="POST">
    <label for="sortField">Сортировать по: </label>
    <select name="sort_field" id="sortValue">
        <option value="id"     <? if ($data['sort_field']=='id')     {echo 'selected';} ?>></option>
        <option value="user"   <? if ($data['sort_field']=='user')   {echo 'selected';} ?>>пользователю возр.</option>
        <option value="user desc"   <? if ($data['sort_field']=='user desc')   {echo 'selected';} ?>>пользователю убыв.</option>
        <option value="email"  <? if ($data['sort_field']=='email')  {echo 'selected';} ?>>e-mail возр.</option>
        <option value="email desc"  <? if ($data['sort_field']=='email desc')  {echo 'selected';} ?>>e-mail убыв.</option>
        <option value="status" <? if ($data['sort_field']=='status') {echo 'selected';} ?>>статусу возр.</</option>
        <option value="status desc" <? if ($data['sort_field']=='status desc') {echo 'selected';} ?>>статусу убыв.</option>
    </select>
    <input type="submit" value="Применить">
</form>
