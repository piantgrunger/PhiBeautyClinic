<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Notatreatment */

$this->title = 'Update Nota treatment: ' . $model->No_NotaTreatment;
$this->params['breadcrumbs'][] = ['label' =>  'Daftar Nota treatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No_NotaTreatment, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notatreatment-update">

    <h1><?= Html::encode($this->title) ?></h1>

     <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'dataTreatment' => $dataTreatment,
        'dataProduk' => $dataProduk,
      
    ]) ?>

</div>
