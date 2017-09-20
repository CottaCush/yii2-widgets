<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\ModalAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/**
 * Class RemoteModalPlaceholderWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class RemoteModalPlaceholderWidget extends BaseModalWidget
{
    public $id;
    public $ids;

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function init()
    {
        parent::init();

        if ($this->id) {
            $this->ids = [$this->id];
        }

        foreach ($this->ids as $id) {
            $this->id = $id;
            $this->beginModal();
            $this->endModal();
        }
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function renderContents()
    {
        Html::beginTag('div', ['class' => 'modal-dialog']);
        Html::beginTag('div', ['class' => 'modal-content loader-lg']);
        Html::endTag('div');
        Html::endTag('div');
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function beginModal()
    {
        Modal::begin([
            'options' => [
                'id' => $this->id,
                'class' => 'modal fade'
            ],
            'header' => null,
            'closeButton' => false
        ]);

        echo Html::beginTag('div', ['class' => 'text-center']);
        echo FontAwesomeIcon::widget(['name' => 'spinner fa-3x fa-spin']);
        echo '<br><br>';
        echo Html::tag('div', 'Loading...');
        echo Html::endTag('div');
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function endModal()
    {
        Modal::end();
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
