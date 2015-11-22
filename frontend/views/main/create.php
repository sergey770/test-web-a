<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>


<? $item = ArrayHelper::map($categ,'categ_id','categ_name'); ?>   
<? $mony = ArrayHelper::map($mony,'cour_mon_id','cour_mon_name'); ?>   
<? $users = ArrayHelper::map($users,'user_id','user_name'); ?>   




<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($famil_bud, 'categ_id')->dropDownList($item)->label('Категории') ?>
    
    <?= $form->field($famil_bud, 'summa')->label('Сумма') ?>

    <?= $form->field($famil_bud, 'cour_mon_id')->dropDownList($mony)->label('Валюта') ?>
    
    <?= $form->field($famil_bud, 'user_id')->dropDownList($users)->label('Пользователь') ?>
    
    
    
    

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>