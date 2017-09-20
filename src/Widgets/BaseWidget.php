<?php

namespace CottaCush\Yii2\Widgets;

use yii\base\Widget;

/**
 * Class BaseWidget
 * Base Class to carry further customizations across all CottaCush Yii2 widgets
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
abstract class BaseWidget extends Widget
{
    public function init()
    {
        $this->registerAssets();
        parent::init();
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @return mixed
     */
    abstract public function registerAssets();
}
