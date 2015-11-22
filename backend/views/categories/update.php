<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<? $items = ArrayHelper::map($inco_ex,'inc_exp_id','inc_exp_name'); ?>   

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($categ, 'categ_name')->label('Название') ?>
    
    <?= $form->field($categ, 'inc_exp_id')->dropDownList($items)->label('Категории') ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>