<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdvertSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'type') ?>


    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'advert_date') ?>

    <?php  echo $form->field($model, 'expired_date') ?>

    <?php  echo $form->field($model, 'company_name') ?>

    <?php // echo $form->field($model, 'company_website') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'quota') ?>

    <?php  echo $form->field($model, 'grade') ?>

    <?php  echo $form->field($model, 'gpa') ?>

    <?php // echo $form->field($model, 'long_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
