<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\TbMKas */

$this->title = $model->no_kas;
$this->params['breadcrumbs'][] = ['label' => 'Kas Kecil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-mkas-view">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_kas',
            [
                 'label' =>'Tgl Kas',
                'value' =>Yii::$app->formatter
                          ->asDate($model->tgl_kas,"dd/MM/yyyy")
                
            ],
        ],
    ]) ?>
<?=
    GridView::widget([
        'dataProvider'=>new yii\data\ActiveDataProvider([
            'query'=>$model->getDetKases(),
            'pagination'=>false
        ]),
        'columns'=>[
            'ket',
            'debet_rp',
            'kredit_rp',
         
        ]
    ])
        ?>
</div>









