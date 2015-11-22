
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Доходы \ расходы</div>
  <div class="panel-body">
    <a href="/categories/create">Добавить</a>
  </div>

  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Названия</th>
        <th>Категория</th>
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
            <td><?=$quer['categ_name']?></td>
            <td><?=$quer['inc_exp_name']?></td>
            <td><?=$quer['categ_active_from']?></td>
            <td><?=$quer['categ_active_to']?></td>
        <?if(isset($quer['categ_active_to'])):?>
            <td><a href="/categories/active?id=<?=$quer['categ_id']?>">Активировать</a></td>
        <?else:?>
            <td><a href="/categories/update?id=<?=$quer['categ_id']?>">Изменить</a> \ <a href="/categories/delete?id=<?=$quer['categ_id']?>">Закрыть</a></td>
        <?endif;?>
            
        </tr>
    <? endforeach; ?>
<?endif;?>
    </tbody>
  </table>
</div>

