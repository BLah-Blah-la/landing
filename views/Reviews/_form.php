<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vendor\landing\partner\models\Reviews;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<?= $form->field($model, 'id_customer')->dropDownList(Reviews::customersList())?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->fileInput()->label('Заменить') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
