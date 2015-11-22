
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Семья</div>
  <div class="panel-body">
    <a href="/user/create">Добавить</a>
  </div>

  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Активен с</th>
        <th>Активен до</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
<?$i = 0?>    
<?if(isset($query)):?>
    <? foreach($query as $quer): ?>
        <?$i = $i + 1;?>
        <tr>
            <td><?=$i?></td>
            <td><?=$quer['user_name']?></td>
            <td><?=$quer['user_active_from']?></td>
            <td><?=$quer['user_active_to']?></td>
        <?if(isset($quer['user_active_to'])):?>
            <td><a href="/user/active?id=<?=$quer['user_id']?>">Активировать</a></td>
        <?else:?>
            <td><a href="/user/update?id=<?=$quer['user_id']?>">Изменить</a> \ <a href="/user/delete?id=<?=$quer['user_id']?>">Закрыть</a></td>
        <?endif;?>
            
        </tr>
    <? endforeach; ?>
<?endif;?>
    </tbody>
  </table>
</div>

