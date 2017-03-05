<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TreatmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Treatment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $gridColumns= [
 
            'kode_treatment',
            'nama_treatment',
            'Harga_Rp',
            'keterangan',
            'komisi_treatment',

    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    ?>

    <p>
        <?= Html::a('Treatment Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       'exportConfig' => [
                GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'kode_treatment',
            'nama_treatment',
            'Harga_Rp',
            'keterangan',
            'komisi_treatment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
