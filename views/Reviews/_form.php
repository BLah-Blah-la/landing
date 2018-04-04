<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vendor\landing\partner\models\Reviews;
use yii\helpers\Url;
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

    <?= $form->field($model, 'img')->fileInput()->label('Заменить') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
