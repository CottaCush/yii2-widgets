<?php

namespace CottaCush\Yii2\Widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class BaseIcon
 * @author Olajide Oye <jide@cottacush.com>
 */
class BaseIcon extends Widget
{
    public $tag;
    public $name;
    public $prefix;
    public $options = [];

    public function init()
    {
        parent::init();
        $this->options['class'] = $this->getIconClass() . ' ' . ArrayHelper::getValue($this->options, 'class', '');
    }

    public function run()
    {
        return Html::tag($this->tag, '', $this->options);
    }

    /**
     * Concatenate the icon's class prefix and name
     * @return string
     */
    private function getIconClass()
    {
        return $this->prefix . $this->name;
    }
}
