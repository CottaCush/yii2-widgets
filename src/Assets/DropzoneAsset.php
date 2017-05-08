<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class DropzoneAsset
 * Dropzone asset with the default Dropzone.js css styles
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class DropzoneAsset extends DropzoneBaseAsset
{
    public $css = [
        'dropzone.min.css'
    ];

    public $productionCss = [
        'https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css'
    ];
}
