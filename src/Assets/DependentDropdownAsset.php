<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class DependentDropdownAsset
 * @package CottaCush\Yii2\Assets
 * @author Kehinde Ladipo <ladipokenny@gmail.com>
 */
class DependentDropdownAsset extends AssetBundle
{
    public $js = [
        'dropdown.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
