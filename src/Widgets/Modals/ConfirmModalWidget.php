<?php

namespace CottaCush\Yii2\Widgets\Modals;

use CottaCush\Yii2\Helpers\Html;
use CottaCush\Yii2\Widgets\BaseModalWidget;
use CottaCush\Yii2\Widgets\Bootstrap\Modal;

/**
 * Class ConfirmModalWidget
 * @package app\widgets
 * @author Olawale Lawal <wale@cottacush.com>
 */
class ConfirmModalWidget extends BaseModalWidget
{
    public $modalId;
    public $footerSubmit = 'Proceed';
    public $footerCancel = 'Cancel';
    public $route = '';
    public $formMethod = 'post';
    public $formOptions = ['class' => 'disable-submit-buttons'];

    public function beginModal()
    {
        Modal::begin([
            'header' => '<h4 class="modal-title"></h4>',
            'options' => [
                'id' => $this->modalId,
                'data-generic-modal' => 'true'
            ],
            'footer' => Html::button($this->footerCancel, ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) .
                Html::submitButton($this->footerSubmit, ['class' => 'btn btn-danger', 'data-submit-modal-form' => ''])
        ]);
    }

    public function renderContents()
    {
        echo Html::tag('p', null, ['class' => '', 'data-msg' => true]);
        echo Html::hiddenInput('id', null, ['data-id' => true]);
    }
}
