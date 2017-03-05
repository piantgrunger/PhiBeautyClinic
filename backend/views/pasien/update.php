<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */

$this->title = 'Update Pasien: '. $model->Kode_Pasien .' - '. $model->Nama_Pasien;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Kode_Pasien, 'url' => ['view', 'id' => $model->ID_Pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pasien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
