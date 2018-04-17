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

    <?= $form->field($model, 'price_name')->dropDownList(Customers::priceList(), Yii::$app->params['price_list'])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'phone_digital')->widget(\yii\widgets\MaskedInput::className(), [
			'mask' => '+7(999) 999 99 99',
			'clientOptions' => [
			   'removeMaskOnSubmit' => true,
			]
        ]) ?>
	
	
	<?= $form->field($model, 'email')?>
	
	
	<?= $form->field($model, 'status')->dropDownList([
	    Yii::t('modules/notifications', 'New') => Yii::t('modules/notifications', 'New'),
	    Yii::t('modules/notifications', 'On development stage') =>  Yii::t('modules/notifications', 'В процессе разработки'),
		Yii::t('modules/notifications', 'Under consideration') =>  Yii::t('modules/notifications', 'Under consideration'), 
	    Yii::t('modules/notifications', 'Finished') =>  Yii::t('modules/notifications', 'Finished'),
	], Yii::$app->params['status'])?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
