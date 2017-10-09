<?php

namespace CottaCush\Yii2\Widgets\Modals;

/**
 * Class BeneficiaryModalWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\widgets
 */
class LOVModalWidget extends ActiveFormModalWidget
{
    public $nameAttribute = 'name';
    public $idAttribute = 'id';

    public function renderContents()
    {
        echo $this->form->field($this->model, $this->nameAttribute);
        echo $this->form->field($this->model, $this->idAttribute)->hiddenInput()->label(false);
    }
}
