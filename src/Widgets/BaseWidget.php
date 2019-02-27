<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Helpers\Html;
use yii\base\Widget;

/**
 * Class BaseWidget
 * Base Class to carry further customizations across all CottaCush Yii2 widgets
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class BaseWidget extends Widget
{
    /**
     * @param array|string $classNames
     * @param array $options
     * @return string
     */
    public function beginDiv($classNames = [], $options = [])
    {
        return Html::beginDiv($classNames, $options);
    }

    /**
     * @return string
     */
    public function endDiv()
    {
        return Html::endDiv();
    }
}
