<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\ModalAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * Class RemoteModalFormWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\widgets
 */
class RemoteModalFormWidget extends BaseWidget
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

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function init()
    {
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
        $this->renderFooter();
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
            'options' => ['id' => $this->formId],
            'enableClientValidation' => true,
            'enableAjaxValidation' => true
        ]);
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
        echo Html::button('', ['class' => 'close', 'data-dismiss' => 'modal']);
        echo Html::tag('h4', $this->titleText, ['class' => 'modal-title', 'data-dismiss' => 'modal']);
        echo Html::endTag('div');
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    public function renderFooter()
    {
        echo Html::beginTag('div', ['class' => 'modal-footer']);
        echo Html::button($this->negativeButtonText, [
            'class' => $this->negativeButtonClass, 'data-dismiss' => 'modal'
        ]);
        echo Html::button($this->positiveButtonText, [
            'type' => 'submit',
            'class' => $this->positiveButtonClass
        ]);
        $this->endDiv();

    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     */
    private function endDiv()
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
     * @return void
     */
    public function renderFormContents()
    {
        if (is_callable($this->formContents)) {
            $this->formContents = call_user_func($this->formContents, $this->form);
        }

        echo implode('', $this->formContents);
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
