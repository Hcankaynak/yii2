<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'intern' => 'Intern', 'job' => 'Job', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'passive' => 'Passive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'long_description')->textarea(['rows' => 12])?>

    <?= $form->field($model, 'expired_date')->textInput() ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_website')->textInput(['maxlength' => true]) ?>



    

    <?= $form->field($model, 'grade')->textInput() ?>

    <?= $form->field($model, 'gpa')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
