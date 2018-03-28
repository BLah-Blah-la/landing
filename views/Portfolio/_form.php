<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vendor\landing\partner\models\Portfolio;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_customer')->dropDownList(Portfolio::customersList())?>

     <?= $form->field($model, 'image')->fileInput()->label('Заменить') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
