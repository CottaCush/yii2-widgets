<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\FontAwesomeAsset;

/**
 * Class FontAwesomeIcon
 * For Font Awesome icons
 * @author Olajide Oye <jide@cottacush.com>
 */
class FontAwesomeIcon extends BaseIcon
{
    public $prefix = 'fa fa-';
    public $tag = 'i';

    public function run()
    {
        FontAwesomeAsset::register($this->view);
        return parent::run();
    }
}
