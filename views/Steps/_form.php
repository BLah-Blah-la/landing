<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Steps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="steps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*']])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
