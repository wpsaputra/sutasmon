<?php

/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;

$this->title = 'Monitoring SOUT';
$clean_total = 0;
$error_total = 0;
$blm_entri_total = 0;


// L2
$sql = "SELECT [status_dok] FROM [SUTAS2018].[dbo].[L2_rt] where [status_dok]='C'";
$clean_l2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();

$sql2 = "SELECT [status_dok] FROM [SUTAS2018].[dbo].[L2_rt] where [status_dok]='E'";
$error_l2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (' . $sql2 . ') as count_alias')->queryScalar();
$total_l2 = 110904;
$blm_entri_l2 = $total_l2 - $clean_l2 - $error_l2;

$clean_total = $clean_total + $clean_l2;
$error_total = $error_total + $error_l2;
$blm_entri_total = $blm_entri_total + $blm_entri_l2;

$clean_l2 = $clean_l2 / $total_l2;
$error_l2 = $error_l2 / $total_l2;
$blm_entri_l2 = $blm_entri_l2 / $total_l2;

// L1
$sql = "SELECT [status_dok] FROM [SUTAS2018].[dbo].[m_bs] where [status_dok]='C'";
$clean_l1 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();

$sql2 = "SELECT [status_dok] FROM [SUTAS2018].[dbo].[m_bs] where [status_dok]='E'";
$error_l1 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (' . $sql2 . ') as count_alias')->queryScalar();
$total_l1 = 1725;
$blm_entri_l1 = $total_l1 - $clean_l1 - $error_l1;

$clean_total = $clean_total + $clean_l1;
$error_total = $error_total + $error_l1;
$blm_entri_total = $blm_entri_total + $blm_entri_l1;

$clean_l1 = $clean_l1 / $total_l1;
$error_l1 = $error_l1 / $total_l1;
$blm_entri_l1 = $blm_entri_l1 / $total_l1;

// Total
$total_total = $total_l1 + $total_l2;
$clean_total = $clean_total / $total_total;
$error_total = $error_total / $total_total;
$blm_entri_total = $blm_entri_total / $total_total;

$current_date = new DateTime();
$deadline_date = new DateTime('08/31/2018');
$diff = $current_date->diff($deadline_date);



function printPie($judul, $clean, $error, $blm_entri)
{
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' => $judul],
            'credits' => ['enabled' => false],
            'tooltip' => [
                'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b>'
            ],
            'colors' => [
                // '#7cb5ec',

                '#90ed7d',
                '#f7a35c',
                '#3A3A4F',
                // '#434348',
            ],

            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                    'dataLabels' => [
                        'enabled' => true,
                        'format' => '<b>{point.name}</b>: {point.percentage:.1f} %',
                    ]
                ],
            ],
            'series' => [
                [ // new opening bracket


                    'type' => 'pie',
                    'name' => 'Elements',
                    'data' => [
                        ['Clean', $clean],
                        ['Error', $error],
                        ['Blm Entri', $blm_entri],
                    ],
                                        // 'dataLabels' => [
                                        //     'enabled' => false
                                        // ],
                                        // 'showInLegend' => true
                ] // new closing bracket
            ],
        ],
    ]);

}
?>
<div class="site-index">
    <div class="body-content">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><strong>Warning!</strong> Pengolahan SUTAS 2018 akan berakhir <?php print_r($diff->days); ?> hari lagi</p>
            <p>- Jumlah Entrian Total <?php echo '<strong>'.($clean_total+$error_total)*$total_total.'</strong>'.' dari '.'<strong>'.$total_total.'</strong>'.' dokumen' ?></p>
            <p>- Jumlah Clean Total <?php echo '<strong>'.($clean_total)*$total_total.'</strong>'.' dari '.'<strong>'.$total_total.'</strong>'.' dokumen' ?></p>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <?php printPie('Progress Entri L1', $clean_l1, $error_l1, $blm_entri_l1); ?>
            </div>
            <div class="col-lg-4">
                <?php printPie('Progress Entri L2', $clean_l2, $error_l2, $blm_entri_l2); ?>
            </div>
            <div class="col-lg-4">
                <?php printPie('Progress Entri Total', $clean_total, $error_total, $blm_entri_total); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <!-- <?php //printPie('Progress Entri Total', $clean_total, $error_total, $blm_entri_total); ?> -->
            </div>
        </div>
    </div>
</div>
