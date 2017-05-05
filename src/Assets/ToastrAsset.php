<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class ToastrAsset
 * Asset for Toastr.js
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class ToastrAsset extends AssetBundle
{
    public $sourcePath = '@bower/toastr';
    public $css = [
        'toastr.min.css'
    ];
    public $js = [
        'toastr.min.js'
    ];
    public $productionCss = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css'
    ];
    public $productionJs = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
