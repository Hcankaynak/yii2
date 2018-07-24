<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Announcements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announcements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
