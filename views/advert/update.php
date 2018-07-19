<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
if (!(Yii::$app->user->identity->authority == 'Student')) {


$this->title = 'Update Advert: ' . $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_name, 'url' => ['view', 'id' => $model->company_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php
}
