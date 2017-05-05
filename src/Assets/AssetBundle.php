<?php

namespace CottaCush\Yii2\Assets;

use yii\web\AssetBundle as YiiAssetBundle;

/**
 * Class AssetBundle
 * Specify a list of css and js assets to use in production-only environments
 *
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Assets
 */
class AssetBundle extends YiiAssetBundle
{
    /**
     * @var array list of JavaScript files to be used for production.
     * This list will override [[js]] in production environments and follows the same format
     */
    public $productionJs = [];
    /**
     * @var array list of CSS files to be used for production.
     * This list overrides [[css]] in production environments and follows the same format
     */
    public $productionCss = [];
    /**
     * Registers the CSS and JS files with the given view.
     * In production environments, make use of the production asset files if they are provided
     * @param \yii\web\View $view the view that the asset files are to be registered with.
     */
    public function registerAssetFiles($view)
    {
        if (YII_ENV_PROD) {
            if (!empty($this->productionJs)) {
                $this->js = $this->productionJs;
            }
            if (!empty($this->productionCss)) {
                $this->css = $this->productionCss;
            }
        }
        parent::registerAssetFiles($view);
    }
}
