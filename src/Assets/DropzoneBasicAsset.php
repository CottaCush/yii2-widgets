<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class DropzoneBasicAsset
 * Dropzone asset with the basic Dropzone.js css styles
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class DropzoneBasicAsset extends DropzoneBaseAsset
{
    public $css = [
        'basic.min.css'
    ];

    public $productionCss = [
        'https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/basic.min.css'
    ];
}
