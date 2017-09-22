<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Helpers\Html;
use yii\widgets\ActiveForm;

/**
 * Class RemoteModalFormWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\widgets
 */
class RemoteModalFormWidget extends BaseRemoteModalWidget
{
    /** @var  ActiveForm */
    public $form;
    public $action;
    public $formId = '';
    public $negativeButtonText = 'Cancel';
    public $negativeButtonClass = 'btn btn-default';
    public $positiveButtonText = 'Submit';
    public $positiveButtonClass = 'btn btn-primary';
    public $titleText = '';
    public $formContents = [];
    public $showFooterButtons = true;
    public $showFooter = true;

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function init()
    {
        parent::init();
        $this->beginForm();
        $this->renderModalHeader();
        $this->beginModalBody();
        $this->renderContents();
    }


    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function renderContents()
    {
        $this->renderFormContents();
        $this->endModalBody();
        if ($this->showFooter) {
            $this->renderFooter();
        }
        ActiveForm::end();
    }


    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function beginForm()
    {
        $this->form = ActiveForm::begin([
            'action' => $this->action,
            'method' => 'post',
            'options' => ['id' => $this->formId]
        ]);
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function renderFooter()
    {
        echo Html::beginTag('div', ['class' => 'modal-footer']);

        if ($this->showFooterButtons) {
            echo Html::button($this->negativeButtonText, [
                'class' => $this->negativeButtonClass, 'data-dismiss' => 'modal'
            ]);
            echo Html::button($this->positiveButtonText, [
                'type' => 'submit',
                'class' => $this->positiveButtonClass,
                'data-submit-modal-form' => ''
            ]);
        }
        $this->endDiv();

    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @return void
     */
    public function renderFormContents()
    {
        if (is_callable($this->formContents)) {
            $this->formContents = call_user_func($this->formContents, $this->form);
        }

        echo implode('', $this->formContents);
    }
}
