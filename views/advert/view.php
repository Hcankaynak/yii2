<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-view">

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
            'type',
            //'person',
            'status',
            'company_name',
            'company_website',
            'long_description',
            //'description',
            //'department',
            'advert_date',
            'expired_date',
            //'comment',
            //'quota',
            'grade',
            'gpa',

        ],
    ]) ?>

</div>
