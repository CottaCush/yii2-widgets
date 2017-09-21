<?php

namespace CottaCush\Yii2\Assets;

class ModalAsset extends LocalAssetBundle
{
    public $js = [
        'js/modal.js',
        'js/remote-modal.js'
    ];

    public $depends = [
        'CottaCush\Yii2\Assets\FormAsset'
    ];
}
