<?php

namespace CottaCush\Yii2\Widgets;

use yii\helpers\Html;

/**
 * Class RemoteModalWidget
 * @author Adegoke Obasa <goke@cottacush.com>
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\widgets
 */
class RemoteModalWidget extends BaseRemoteModalWidget
{
    public $titleText = '';
    public $contents = [];

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function run()
    {
        $this->renderModalHeader();
        $this->beginModalBody();
        $this->renderContents();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function renderContents()
    {
        echo implode('', $this->contents);
        $this->endModalBody();
        $this->renderFooter();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function renderFooter()
    {
        echo Html::beginTag('div', ['class' => 'modal-footer']);
        echo Html::button('Cancel', [
            'class' => 'btn btn-default', 'data-dismiss' => 'modal'
        ]);
        $this->endDiv();

    }
}
