<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/**
 * Class ContentHeaderWidget
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class ContentHeaderWidget extends BaseContentHeaderButton
{
    public $title;
    public $breadcrumbs;
    public $buttonClass = 'btn btn-sm content-header-btn';
    public $contentRight;
    public $icon;

    public function init()
    {
        parent::init();

        $view = $this->view;

        if (is_null($this->title)) {
            $this->title = ArrayHelper::getValue($view, 'params.pageTitle', $view->title);
        }
        if (is_null($this->breadcrumbs)) {
            $this->breadcrumbs = ArrayHelper::getValue($view, 'params.breadcrumbs', $this->title);
        }
        if (is_null($this->contentRight)) {
            $this->contentRight = ArrayHelper::getValue($view, 'params.contentHeaderRight', '');
        }

        $this->setButton();
    }

    public function run()
    {
        echo Html::beginTag('section', ['class' => 'content-header']);
        echo $this->beginDiv(' clearfix');
        echo $this->beginDiv(' content-header__left');
        echo Html::beginTag('h1', ['class' => 'content-header-title']);

        echo ($this->icon) ? Html::faIcon($this->icon) . ' ' . $this->title : $this->title;

        echo Html::endTag('h1');

        echo $this->endDiv();
        echo Html::tag('div', $this->contentRight, ['class' => 'content-header__right']);
        if (ArrayHelper::getValue($this->view->params, 'show-content-header-button', true)) {
            echo $this->button;
        }
        echo $this->endDiv();
        echo Breadcrumbs::widget([
            'tag' => 'ol',
            'homeLink' => [
                'label' => 'Home',
                'url' => Url::toRoute('/')
            ],
            'links' => $this->breadcrumbs
        ]);
        echo Html::endTag('section');
    }
}
