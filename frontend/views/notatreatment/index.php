<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NotatreatmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Nota treatment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notatreatment-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php
    $gridColumns= [
 
            'No_NotaTreatment',
            'Tgl_NotaTreatment',
            'total_Rp',
            'Nama_Pasien',
            // 'ID_Pasien',

    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    ?>

    <p>
        <?= Html::a('Nota treatment Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
     'exportConfig' => [
          
    GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'No_NotaTreatment',
              [
                            'attribute' => 'Tgl_NotaTreatment',
                            'format' => ['date', 'php:d/m/Y']
                        ],    
            'total_Rp',
            'disc_rp',
            'totalAfterDisc_Rp',
            'bayar_rp',
            'Nama_Pasien',
            ['class' => ActionColumn::className(),'template'=>'{view}' ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
