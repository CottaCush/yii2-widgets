<?php

namespace CottaCush\Yii2\Widgets\Bootstrap;


/**
 * Class Widget
 * @package app\widgets\bootstrap
 * @author Olajide Oye <jide@cottacush.com>
 */
class Widget extends \yii\base\Widget
{
    use BootstrapWidgetTrait;

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
}
