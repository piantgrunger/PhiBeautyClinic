<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbMKas */

$this->title = 'Kas Kecil Baru';
$this->params['breadcrumbs'][] = ['label' => 'Kas Kecil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-mkas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
