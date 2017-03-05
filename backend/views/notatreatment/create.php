<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Notatreatment */

$this->title = 'Create Notatreatment';
$this->params['breadcrumbs'][] = ['label' => ' Daftar Nota treatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notatreatment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'dataTreatment' => $dataTreatment,
        'dataProduk' => $dataProduk,
      
    ]) ?>

</div>
