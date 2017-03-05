<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sesitreatment */

$this->title = $model->id_sesitreatment;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Sesitreatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesitreatment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sesitreatment], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sesitreatment], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tgl_sesitreatment',
            'idDNotatreatment.idNotaTreatment.iDPasien.Nama_Pasien:text:Pasien',
            'idDNotatreatment.idNotaTreatment.No_NotaTreatment:text:No. Nota Treatment',
            'idDNotatreatment.idTreatment.nama_treatment:text:Treatment',
            'idKaryawan.nama_karyawan:text:Terapis',
            'jam_mulai',
            'jam_selesai',
        ],
    ]) ?>

</div>
