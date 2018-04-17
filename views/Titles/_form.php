<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Titles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titles-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3']]); ?>
	
	<?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['cols'=> 20, 'rows' => 3, 'wrap' => 'hard', 'maxlength' => 14500]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
