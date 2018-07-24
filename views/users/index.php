<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if ((Yii::$app->user->identity->authority == 'admin')) {
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']);
            echo Yii::$app->session->get('user.password');;
        ?>




    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'username',
            'password',
            'name',
            'surname',
            //'email:email',
            //'authority',
            //'department',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php
}
 ?>
