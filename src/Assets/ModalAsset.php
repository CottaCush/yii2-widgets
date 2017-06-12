<?php

namespace CottaCush\Yii2\Assets;

class ModalAsset extends LocalAssetBundle
{
    public $js = [
        'modal.js',
        'remote-modal.js'
    ];

    public $depends = [
        'CottaCush\Yii2\Assets\FormAsset'
    ];
}
