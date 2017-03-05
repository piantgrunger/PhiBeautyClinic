<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
          'assetManager' => [
        'bundles' => [
            'dmstr\web\AdminLteAsset' => [
                'skin' => 'skin-red',
            ],
        ],
    ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
