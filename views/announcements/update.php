<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Announcements */

if (!(Yii::$app->user->identity->authority == 'Student')) {
  $this->title = 'Update Announcements: ' . $model->header;
  $this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
  $this->params['breadcrumbs'][] = ['label' => $model->header, 'url' => ['view', 'header' => $model->header]];
  $this->params['breadcrumbs'][] = 'Update';
  ?>
  <div class="announcements-update">

      <h1><?= Html::encode($this->title) ?></h1>

      <?= $this->render('_form', [
          'model' => $model,
      ]) ?>

  </div>
<?php
}
