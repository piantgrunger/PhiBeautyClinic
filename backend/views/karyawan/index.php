<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <?php
    $gridColumns= [
 
            'kode_karyawan',
            'nama_karyawan',
            'alamat_karyawan',
            'telp_karyawan',
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    ?>
    <p>
        <?= Html::a('Karyawan Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
      'exportConfig' => [
          
    GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'kode_karyawan',
            'nama_karyawan',
            'alamat_karyawan',
            'telp_karyawan',
            // 'tgl_lahir',
            // 'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
