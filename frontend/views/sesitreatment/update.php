<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sesitreatment */

$this->title = 'Ubah Sesi treatment: ' . $model->id_sesitreatment;
$this->params['breadcrumbs'][] = ['label' => 'Sesitreatments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sesitreatment, 'url' => ['view', 'id' => $model->id_sesitreatment]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesitreatment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'dataNotaTreatment'=>$dataNotaTreatment,
        'dataKaryawan' => $dataKaryawan,
        
    ]) ?>

</div>
