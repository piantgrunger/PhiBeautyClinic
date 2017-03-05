<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="<?= \dmstr\helpers\AdminLteHelper::skinClass() ?>">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Zahra Beauty Center',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
     if  (!Yii::$app->user->isGuest) {
        $menuItems1[] =  [
            'label' => 'Master',
            'items' => [
                 ['label' => 'Pasien', 'url' => ['/pasien/index']],
                 ['label' => 'Treatment', 'url' => ['/treatment/index']],
                 ['label' => 'Produk', 'url' => ['/produk/index']],
                 ['label' => 'Karyawan', 'url' => ['/karyawan/index']],
            
            ],
        ];
        $menuItems1[] =  [
            'label' => 'Transaksi',
            'items' => [
                 ['label' => 'Nota Treatment', 'url' => ['/notatreatment/index']],
                 ['label' => 'Sesi Treatment', 'url' => ['/sesitreatment/index']],
                 ['label' => 'Kas Kecil', 'url' => ['/kas/index']],
            
            ],
            ];
          $menuItems1[] =  [
            'label' => 'Laporan',
            'items' => [
                 ['label' => 'Laporan Realisasi', 'url' => ['/notatreatment/laporanrealisasi']],
                 ['label' => 'Laporan Komisi', 'url' => ['/notatreatment/laporankomisi']],
            
            ],
   
        ];
        
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems1,
    ]);
 
     }
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
       
        
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        
           

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"> </p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
