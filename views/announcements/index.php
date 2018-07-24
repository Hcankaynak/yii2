<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use yii\widgets\LinkSorter;

#use default;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnnouncementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Announcements' ;
$this->params['breadcrumbs'][] = $this->title;

//$query = app\models\Announcements::find()->all();

#echo $query[0][0];


?>
<div class="announcements-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?php
        if (!(Yii::$app->user->identity->authority == 'Student')) {
        ?>
             <?= Html::a('Create Announcements', ['create'], ['class' => 'btn btn-success']); ?>
        <?php
        } ?>

    </p>

    <?=
    GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],


            //'id',

            'header',
            'summary',


            //'Description:ntext',
            //'person',
            'attribute' => 'date',
            //'date',
            //'type',
            //'related_user_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
         ?>
</div>
