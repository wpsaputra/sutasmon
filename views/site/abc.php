<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

$this->title = 'Rincian Entri (By Tanggal)';
$this->params['breadcrumbs'][] = $this->title;

$provider->pagination->pageParam = 'l1-page';
$provider->sort->sortParam = 'l1-sort';

// $provider2->pagination->pageParam = 'spw-page';
// $provider2->sort->sortParam = 'spw-sort';

// $provider3->pagination->pageParam = 'spd-page';
// $provider3->sort->sortParam = 'spd-sort';

$script = <<< JS
    $(function() {
        // save the latest tab (http://stackoverflow.com/a/18845441)
        // https://github.com/yiisoft/yii2/issues/4890
        $('a[data-toggle="tab"]').on('click', function (e) {
            localStorage.setItem('lastTababc', $(e.target).attr('href'));
        });

        //go to the latest tab, if it exists:
        var lastTab = localStorage.getItem('lastTababc');

        if (lastTab) {
            $('a[href="'+lastTab+'"]').click();
        }
    });
JS;
$this->registerJs($script, yii\web\View::POS_END);

function printGridView($data_provider){
    echo GridView::widget([
            'dataProvider' => $data_provider,
            'layout' => "{items}\n{summary}\n{pager}",
            'summaryOptions' => ['class' => 'summary pull-right'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'kode_operator',
                // 'realname',
                [
                    'attribute' => 'realname',
                    'label' => 'Nama Operator',
                ],
                // 'start_entry',
                [
                    'attribute' => 'start_entry',
                    'label' => 'Tanggal Entri',
                ],

                // 'count',
                [
                    'attribute' => 'count',
                    'label' => 'Jumlah Entrian',
                ],
            ],
            // 'pagerOptions'=>['class' => 'pull-right']
        ]);
}

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p> 
        Tabel berikut merupakan jumlah dokumen yang telah di entri oleh Operator pada tanggal  
        <?php 
            // $date = 'Jul 5, 2017';
            // echo date('d/m/Y', strtotime($date));
            echo $tanggal;
        ?>
    </p>
    

    <?= $this->render('_search', [
        'model' => $model,
    ]) ?>



    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Dokumen L1</a></li>
        <li><a data-toggle="tab" href="#menu1">Dokumen L2</a></li>
        <li><a data-toggle="tab" href="#menu2">Total</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Dokumen L1</h3>
                    <?php printGridView($provider); ?>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Dokumen L2</h3>
                    <?php printGridView($provider2); ?>
                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Total</h3>
                    <?php printGridView($provider3); ?>
                </div>
            </div>
        </div>
    </div>
</div>
