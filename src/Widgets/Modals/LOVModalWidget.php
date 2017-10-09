<?php

namespace CottaCush\Yii2\Widgets\Modals;

/**
 * Class BeneficiaryModalWidget
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package app\widgets
 */
class LOVModalWidget extends ActiveFormModalWidget
{
    public function renderContents()
    {
        echo $this->form->field($this->model, 'name');
        echo $this->form->field($this->model, 'id')->hiddenInput()->label(false);
    }
}
