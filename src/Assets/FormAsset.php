<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class FormAsset
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @author Olawale Lawal <wale@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class FormAsset extends LocalAssetBundle
{
    public $js = [
        'js/components/form.js',
    ];

    public $depends = [
        'CottaCush\Yii2\Assets\AppModuleAsset'
    ];
}
