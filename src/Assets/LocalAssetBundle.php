<?php

namespace CottaCush\Yii2\Assets;

/**
 * Class LocalAssetBundle
 * Provide a set of directories (present in this widget) to use as the $sourcePath
 *
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class LocalAssetBundle extends AssetBundle
{
    /**
     * The main public assets directory.
     */
    const ASSETS_PATH = __DIR__ . '/../public-assets';
    /**
     * The public js asset directory
     */
    const ASSETS_JS_PATH = self::ASSETS_PATH . '/js';
    /**
     * The public css asset directory
     */
    const ASSETS_CSS_PATH = self::ASSETS_PATH . '/css';

    /**
     * Set the sourcePath as self::ASSETS_PATH by default.
     * @inheritdoc
     */
    public $sourcePath = self::ASSETS_PATH;
}
