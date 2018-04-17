<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Callback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="callback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_digital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
	'Новый' => 'Новый',
	'Не обновлен' => 'На рассмотрении',
	'Отказ' => 'Отказ',
	], Yii::$app->params['status'])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
