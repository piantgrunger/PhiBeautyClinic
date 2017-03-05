
<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SesiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Sesi treatment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesitreatment-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php
    $gridColumns= [
 
            'tgl_sesitreatment',
            'idDNotatreatment.idNotaTreatment.iDPasien.Nama_Pasien:text:Pasien',
            'idDNotatreatment.idNotaTreatment.No_NotaTreatment:text:No. Nota Treatment',
            'idDNotatreatment.idTreatment.nama_treatment:text:Treatment',
            'idKaryawan.nama_karyawan:text:Terapis',
            'jam_mulai',
            'jam_selesai',

    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
?>
    <p>
        <?= Html::a('Sesi treatment Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
      'exportConfig' => [
          
    GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
[
                            'attribute' => 'tgl_sesitreatment',
                            'format' => ['date', 'php:d/m/Y']
                        ],           'idDNotatreatment.idNotaTreatment.iDPasien.Nama_Pasien:text:Pasien',
            'idDNotatreatment.idNotaTreatment.No_NotaTreatment:text:No. Nota Treatment',
            'idDNotatreatment.idTreatment.nama_treatment:text:Treatment',
            'idKaryawan.nama_karyawan:text:Terapis',
            'jam_mulai',
            'jam_selesai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
