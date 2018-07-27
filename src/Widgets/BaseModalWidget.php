<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\ModalAsset;
use CottaCush\Yii2\Helpers\Html;
use CottaCush\Yii2\Widgets\Bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * Class BaseModalWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class BaseModalWidget extends BaseWidget
{
    public $title;
    public $id;
    public $route;
    public $footerSubmit;
    public $footerCancel;
    public $formMethod;
    public $formOptions;
    public $modalHeaderClass;
    public $modalCancelFooterClass;
    public $modalSubmitFooterClass;
    /** @var  ActiveForm $form */
    protected $form;

    public function run()
    {
        $this->registerAssets();
        $this->beginModal();
        $this->beginForm();
        $this->renderContents();
        $this->endForm();
        $this->endModal();
    }

    public function beginModal()
    {
        Modal::begin([
            'header' => '<h4 class="modal-title">' . $this->title . '</h4>',
            'options' => [
                'id' => $this->id
            ],
            'footer' =>
                Html::button($this->footerCancel, ['class' => $this->modalCancelFooterClass, 'data-dismiss' => 'modal']) .
                Html::input(
                    'submit',
                    '',
                    $this->footerSubmit,
                    ['class' => $this->modalSubmitFooterClass, 'data-submit-modal-form' => '']
                )
        ]);
    }

    public function beginForm()
    {
        echo Html::beginForm(Url::toRoute($this->route), $this->formMethod, $this->formOptions);
    }

    public function renderContents()
    {
    }

    public function endForm()
    {
        echo Html::endForm();
    }

    public function endModal()
    {
        Modal::end();
    }

    public function registerAssets()
    {
        ModalAsset::register($this->getView());
    }
}
