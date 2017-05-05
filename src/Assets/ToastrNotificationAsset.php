<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class ToastrNotificationAsset
 * A Notification component to be used with Toastr.js
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class ToastrNotificationAsset extends LocalAssetBundle
{
    public $sourcePath = self::ASSETS_JS_PATH;

    public $js = ['notification-toastr.js'];

    public $depends = [
        'CottaCush\Yii2\Assets\ToastrAsset'
    ];
}
