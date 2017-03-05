<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Karyawan */

$this->title = 'Karyawan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
