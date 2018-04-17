<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use phpnt\cropper\ImageLoadWidget;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Logo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logo-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'img')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*']])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications','Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
