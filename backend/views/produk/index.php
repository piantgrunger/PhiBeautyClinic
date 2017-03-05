<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $gridColumns= [
 
             'kode_produk',
            'nama_produk',
            'Satuan',
            'Harga_Rp',
        
            'Keterangan',

    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    ?>
    
    <p>
        <?= Html::a('Produk Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
      'exportConfig' => [
                GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'kode_produk',
            'nama_produk',
            'Satuan',
            'Harga_Rp',
            'Keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
