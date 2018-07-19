<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        'brandLabel' => 'SUTAS 2018',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'Rincian Entri', 'url' => ['/site/about']],
            [
                'label' => 'Rincian Validasi ' . Html::tag('span', 'New', ['class' => 'badge']),
                'items' => [
                    ['label' => 'Total', 'url' => ['/site/retotal']],
                    '<li class="divider"></li>',
                    ['label' => 'Berdasarkan Tanggal', 'url' => ['/site/retanggal']],
                ],
            ],
            
            [
                'label' => 'Rincian Entri',
                'items' => [
                    ['label' => 'Total', 'url' => ['/site/about']],
                    '<li class="divider"></li>',
                    ['label' => 'Berdasarkan Tanggal', 'url' => ['/site/abc']],
                ],
            ],
            
            // ['label' => 'Rincian Inkonsistensi', 'url' => ['/site/contact']],
            
            // [
            //     'label' => 'Rincian Inkonsistensi',
            //     'items' => [
            //         ['label' => 'Tampilkan Semua', 'url' => ['/site/contact']],
            //         '<li class="divider"></li>',
            //         ['label' => 'Tampilkan Inkonsistensi Saja', 'url' => ['/site/xyz']],
            //     ],
            // ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; BPS SULTRA <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
