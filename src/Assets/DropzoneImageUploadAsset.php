<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class DropzoneImageUploadAsset
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\assets
 */
class DropzoneImageUploadAsset extends LocalAssetBundle
{
    public $js = [
        'js/dropzone-image-upload.js',
    ];

    public $css = [
        'css/dropzone-image-upload.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'CottaCush\Yii2\Assets\DropzoneAsset',
        'CottaCush\Yii2\Assets\ToastrNotificationAsset',

    ];
}
