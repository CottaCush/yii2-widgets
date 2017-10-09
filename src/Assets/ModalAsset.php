<?php

namespace CottaCush\Yii2\Assets;

class ModalAsset extends LocalAssetBundle
{
    public $js = [
        'js/components/modal.js'
    ];

    public $depends = [
        'CottaCush\Yii2\Assets\FormAsset'
    ];
}
