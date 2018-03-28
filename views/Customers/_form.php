<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vendor\landing\partner\models\Customers;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price_name')->dropDownList(Customers::priceList())?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'phone_digital')->widget(\yii\widgets\MaskedInput::className(), [
			'mask' => '+7(999) 999 99 99',
			'clientOptions' => [
			   'removeMaskOnSubmit' => true,
			]
        ]) ?>
	
	<?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'email')?>
	
	<?= $form->field($model, 'name_company')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'ava')->fileInput()->label('Заменить картинку')?>
	
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
