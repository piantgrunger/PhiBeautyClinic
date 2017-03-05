<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Treatment */

$this->title = 'Treatment Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Treatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
