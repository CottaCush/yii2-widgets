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
    public $sourcePath = '@npm/toastr/build';
    public $css = [
        'toastr.min.css'
    ];
    public $js = [
        'toastr.min.js'
    ];
    public array $productionCss = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css'
    ];
    public array $productionJs = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
