<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Announcements */

$this->title = $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcements-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if (!(Yii::$app->user->identity->authority == 'Student')) {
    ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'header',
            'summary',
            'Description:ntext',
            //'person',
            'date',
            //'type',
            //'related_user_type',
        ],
    ]) ?>

</div>
