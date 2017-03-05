<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Produk */

$this->title = 'Produk Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
