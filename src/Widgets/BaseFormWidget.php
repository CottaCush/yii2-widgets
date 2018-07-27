<?php

namespace CottaCush\Yii2\Widgets;

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Class BaseFormWidget
 * @author Damilola Olaleye <damilola@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class BaseFormWidget extends BaseWidget
{
    public $formRoute;
    public $formOptions = [];
    public $formMethod = 'post';

    public function run()
    {
        $this->beginForm();
        $this->renderContents();
        $this->endForm();
    }

    public function beginForm()
    {
        echo Html::beginForm(Url::toRoute($this->formRoute), $this->formMethod, $this->formOptions);
    }

    public function renderContents()
    {
    }

    public function endForm()
    {
        echo Html::endForm();
    }
}
