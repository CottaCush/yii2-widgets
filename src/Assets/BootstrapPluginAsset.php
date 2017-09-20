<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class BootstrapPluginAsset
 * Asset bundle for the Twitter bootstrap javascript files.
 * @package CottaCush\Yii2\Assets
 * @author Olajide Oye <jide@cottacush.com>
 */
class BootstrapPluginAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';
    public $js = [
        'js/bootstrap.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
