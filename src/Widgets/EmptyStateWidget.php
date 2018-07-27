<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\EmptyStateAsset;
use CottaCush\Yii2\Assets\FontAwesomeAsset;
use CottaCush\Yii2\Helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Class EmptyStateWidget
 * @package CottaCush\Yii2\Widgets
 * @author Olajide Oye <jide@cottacush.com>
 * @author Olawale Lawal <wale@cottacush.com>
 */
class EmptyStateWidget extends BaseContentHeaderButton
{
    public $icon;
    public $title;
    public $description;
    public $buttonClass = 'btn btn-primary';
    public $showContentHeader = true;
    public $showContentHeaderButton = true;
    public $showButton = true;

    public function init()
    {
        parent::init();
        $view = $this->view;

        $view->params['show-content-header'] = $this->showContentHeader;
        $view->params['show-content-header-button'] = $this->showContentHeaderButton;

        if (is_null($this->button)) {
            $this->button = ArrayHelper::getValue($view->params, 'content-header-button', true);
        }

        if ($this->showButton) {
            $this->setButton();
        }

        FontAwesomeAsset::register($this->view);
    }

    public function run()
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
    }
}
