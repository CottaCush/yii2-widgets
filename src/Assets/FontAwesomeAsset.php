<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class FontAwesomeAsset
 *
 * @package CottaCush\Yii2\Assets
 * @author Olajide Oye <jide@cottacush.com>
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@npm/font-awesome';
    public $css = [
        'css/font-awesome.min.css'
    ];

    public array $productionCss = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
    ];
}
