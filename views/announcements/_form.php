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

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Urgent' => 'Urgent', 'Casual' => 'Casual', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'related_user_type')->dropDownList([ 'intern' => 'Intern', 'teacher' => 'Teacher', 'all' => 'All', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
