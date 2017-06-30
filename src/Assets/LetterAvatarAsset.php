<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class LetterAvatarAsset
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class LetterAvatarAsset extends LocalAssetBundle
{
    public $sourcePath = self::ASSETS_JS_PATH;

    public $js = ['letter-avatar.js'];
}