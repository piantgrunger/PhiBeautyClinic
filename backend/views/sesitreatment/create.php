<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sesitreatment */

$this->title = 'Sesi treatment Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Sesi treatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesitreatment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'dataNotaTreatment'=>$dataNotaTreatment,
        'dataKaryawan' => $dataKaryawan,
        

    ]) ?>

</div>
