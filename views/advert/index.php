<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adverts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php
if (!(Yii::$app->user->identity->authority == 'Student')) {
?>
    <p>
        <?= Html::a('Create Advert', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php
}
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'type',
            //'person',
            'status',
            //'description',
            //'department',
            //'advert_date',
            'expired_date',
            'company_name',
            //'company_website',
            //'comment',
            //'quota',
            'grade',
            'gpa',
            //'long_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
