<?php

namespace CottaCush\Yii2\Widgets\Modals;

use CottaCush\Yii2\Widgets\BaseModalWidget;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;

/**
 * Class ActiveFormModalWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\widgets
 */
class ActiveFormModalWidget extends BaseModalWidget
{
    /** @var $model ActiveRecord */
    public $model;
    public $formMethod = 'post';
    /**
     * Populate model fields as specified in data attributes on the modal toggle button
     * @var bool
     */
    public $populateFields = false;

    public function beginForm()
    {
        $this->form = ActiveForm::begin(['action' => $this->route, 'method' => $this->formMethod]);
    }

    public function endForm()
    {
        ActiveForm::end();
    }

    public function endModal()
    {
        if ($this->populateFields) {
            $this->view->registerJs(
                "App.Components.Modal.populateModal('#" . $this->id . "','" . $this->model->formName() . "');"
            );
        }

        parent::endModal();
    }
}
