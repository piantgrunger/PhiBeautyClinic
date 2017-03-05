<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $gridColumns= [
 
            'Kode_Pasien',
            'Nama_Pasien',
            'Alamat_Pasien',
            'Telp_Pasien',
];
    
    
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
// echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Pasien Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
     'exportConfig' => [
                GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Kode_Pasien',
            'Nama_Pasien',
            'Alamat_Pasien',
            'Telp_Pasien',
            //'Pin_BB',
            // 'Email:email',
            // 'Tgl_Lahir',
            // 'Jenis_Kelamin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
