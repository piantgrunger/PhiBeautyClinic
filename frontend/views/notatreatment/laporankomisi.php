<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use yii\bootstrap\ActiveForm;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NotatreatmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Komisi Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notatreatment-index">
    <h1><?= Html::encode($this->title) ?></h1>

  <div class="row">    
            <div class="col-md-4">
        <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($filter, 'tgl_aw')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>true,
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
     ])->label('Tanggal Awal');
        
//        ?>
            </div>
            <div class="col-md-4">
    <?= $form->field($filter, 'tgl_ak')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>true,
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
     ])->label('Tanggal Akhir');

        ?>
            </div>
           
        </div>
        
        <?= Html::submitButton( 'Cari', ['class' => 'btn btn-success' ]) ?>
           
    <br>
   <br> 
            
    <?php ActiveForm::end(); ?>
    

    <?php
$gridColumns= [
          

            'nama_karyawan',
            'komisi_treatment'
        ];
    
    
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);     
// echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?><?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    'exportConfig' => [
                GridView::EXCEL => ['label' => 'Export to Excel'],
                  
            ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_karyawan',
            'komisi_treatment'
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
