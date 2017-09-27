<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class DependentDropdownAsset
 * @package CottaCush\Yii2\Assets
 * @author Kehinde Ladipo <ladipokenny@gmail.com>
 */
class DependentDropdownAsset extends LocalAssetBundle
{
    public $js = [
        'js/dependent-dropdown.js'
    ];
    public $css = [
        'css/dependent-dropdown.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
