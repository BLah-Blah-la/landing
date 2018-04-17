<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vendor\landing\partner\models\Portfolio;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_company')->textInput()?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*']])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications','Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
