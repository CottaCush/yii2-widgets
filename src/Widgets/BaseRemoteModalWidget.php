<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\ModalAsset;
use yii\base\Widget;
use yii\bootstrap\Html;

class BaseRemoteModalWidget extends Widget
{
    public $titleText = '';

    public function init()
    {
        $this->registerAssets();
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function beginModalBody()
    {
        echo Html::beginTag('div', ['class' => 'modal-body']);
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function renderModalHeader()
    {
        echo Html::beginTag('div', ['class' => 'modal-header']);
        echo Html::button('&times;', ['class' => 'close', 'data-dismiss' => 'modal']);
        echo Html::tag('h4', $this->titleText, ['class' => 'modal-title', 'data-dismiss' => 'modal']);
        echo Html::endTag('div');
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function endDiv()
    {
        echo Html::endTag('div');
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function endModalBody()
    {
        $this->endDiv();
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @return mixed
     */
    public function registerAssets()
    {
        ModalAsset::register($this->getView());
    }
}
