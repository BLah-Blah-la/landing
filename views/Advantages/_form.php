<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Advantages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advantages-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal col-lg-11']]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    
	<?= $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*']])?>
    
	<?php
	
	/* echo '<label class="control-label">Add Attachments</label>';
    echo FileInput::widget([
    'model' => $model,
    'attribute' => 'img',
    'options' => ['multiple' => true]]);
	 */
	?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('modules/notifications', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
