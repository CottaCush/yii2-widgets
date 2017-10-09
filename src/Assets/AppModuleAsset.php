<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class AppModuleAsset
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\assets
 */
class AppModuleAsset extends LocalAssetBundle
{
    public $js = [
        'js/app.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
