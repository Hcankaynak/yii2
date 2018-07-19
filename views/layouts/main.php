<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\widgets\ActiveForm;
use yii\helpers\Url;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        //'brandLabel' => '<img src="hubbm_logo.png">My Company',

        'brandLabel' => '<img src="/images/huso.png" style="display:inline; vertical-align: center; height:32px;"> HUBBM',
        //'brandImage' => '<img src="<?= Yii::$app->request->baseUrl ../images/hubbm_logo.png"> ',

        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            #['label' => 'About', 'url' => ['/site/about']],
            #['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Announcement', 'url' => ['/announcements'], 'visible' => !(Yii::$app->user->isGuest)],
            ['label' => 'Users', 'url' => ['/users'], 'visible' => (!(Yii::$app->user->isGuest) && (Yii::$app->user->identity->authority=='admin')) ],
            ['label' => 'Adverts', 'url' => ['/advert'], 'visible' => !(Yii::$app->user->isGuest)],
            ['label' => 'Carrer Advice', 'url' => ['/site/carrer'], 'visible' => !(Yii::$app->user->isGuest)],
            ['label' => 'CV Pool', 'url' => ['/site/cvpool'], 'visible' => !(Yii::$app->user->isGuest)],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )



        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
      <p class="pull-left">&copy; hubbm <?= date('Y') ?> </p>
      <img src="hubbm_logo.png" alt="hubbm_logo">
      <?= Html::img('hubbm_logo.png');?>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
