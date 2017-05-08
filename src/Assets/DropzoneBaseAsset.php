<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class DropzoneBaseAsset
 * Base asset for Dropzone.js with just the JavaScript file. Don't use this asset directly, please use the DropzoneAsset
 * or DropzoneBasicAsset instead.
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class DropzoneBaseAsset extends AssetBundle
{
    public $sourcePath = '@bower/dropzone/dist/min/';

    public $js = [
        'dropzone.min.js'
    ];

    public $productionJs = [
        'https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js'
    ];
}
