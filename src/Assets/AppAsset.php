<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class AppAsset
 * @author Olajide Oye <jide@cottacush.com>
 * @package app\assets
 */
class AppAsset extends LocalAssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
