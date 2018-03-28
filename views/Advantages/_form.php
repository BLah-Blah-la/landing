<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Advantages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advantages-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal col-lg-11']]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    
	<?= $form->field($model, 'img')->fileInput()->label('Заменить картинку')?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
