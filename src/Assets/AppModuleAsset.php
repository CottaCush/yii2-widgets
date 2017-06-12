<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class AppModuleAsset
 * @author Olajide Oye <jide@cottacush.com>
 * @package app\assets
 */
class AppModuleAsset extends LocalAssetBundle
{
    public $js = [
        'app.js'
    ];

    public $depends = [
        'CottaCush\Yii2\Assets\AppAsset'
    ];
}
