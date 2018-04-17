<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vendor\landing\partner\models\Reviews;
use yii\helpers\Url;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'name')->textInput() ?>
	
	<?= $form->field($model, 'surname')->textInput() ?>
	
	<?= $form->field($model, 'status')->textInput() ?>
    
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*']])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
