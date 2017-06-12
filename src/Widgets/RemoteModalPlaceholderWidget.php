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
class RemoteModalPlaceholderWidget extends BaseWidget
{
    public $id;

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function init()
    {
        $this->beginModal();
        $this->renderContents();
        $this->endModal();
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
            ]
        ]);
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
