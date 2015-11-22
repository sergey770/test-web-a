
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Доходы \ расходы</div>
  <div class="panel-body">
    <a href="/main/create">Добавить</a>
  </div>

  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Названия</th>
        <th>Категория</th>
        <th>Пользователь</th>
        <th>Дата поступления</th>
        <th>Сумма</th>
        <th>Валюта</th>
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
            <td><?=$quer['user_name']?></td>
            <td><?=$quer['fam_bud_create']?></td>
            <td><?=$quer['summa']?></td>
            <td><?=$quer['cour_mon_name']?></td>
            <td><a href="/main/update?id=<?=$quer['fam_bud_id']?>">Изменить</a> \ <a href="/main/delete?id=<?=$quer['fam_bud_id']?>">Удалить</a></td>

            
        </tr>
    <? endforeach; ?>
<?endif;?>
    </tbody>
  </table>
</div>

