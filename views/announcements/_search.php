<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnnouncementsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announcements-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'summary') ?>

    <?= $form->field($model, 'Description') ?>



    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'related_user_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
