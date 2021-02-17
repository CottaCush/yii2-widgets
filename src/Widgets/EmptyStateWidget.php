<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\EmptyStateAsset;
use CottaCush\Yii2\Assets\FontAwesomeAsset;
use CottaCush\Yii2\Helpers\Html;

/**
 * Class EmptyStateWidget
 * @package CottaCush\Yii2\Widgets
 * @author Olajide Oye <jide@cottacush.com>
 * @author Olawale Lawal <wale@cottacush.com>
 */
class EmptyStateWidget extends BaseWidget
{
    public string $icon;
    public string $title;
    public string $description;
    public string $buttonClass = 'btn btn-primary';

    public bool $showButton = true;
    public mixed $button;

    public function run(): string
    {
        echo Html::beginTag('section', ['class' => 'empty-state']);

        echo Html::faIcon($this->icon, ['class' => 'empty-state__icon']);
        echo Html::tag('h2', $this->title, ['class' => 'empty-state__title']);
        echo Html::tag('p', $this->description, ['class' => 'empty-state__description']);

        if ($this->showButton) {
            echo Html::tag('div', $this->button, ['class' => 'empty-state__btn']);
        }

        echo Html::endTag('section');

        EmptyStateAsset::register($this->getView());
        FontAwesomeAsset::register($this->view);
    }
}
