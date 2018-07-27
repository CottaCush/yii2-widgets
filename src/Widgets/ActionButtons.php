<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Class ActionButtons
 * @author Olawale Lawal <wale@cottacush.com>
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class ActionButtons extends BaseWidget
{
    /**
     * @var array $actions an array of actions to be displayed. Each action looks like the following:
     * [
     *      'label' => '', // {string} The label to be shown on the link. The label property name can be overridden. @see $actionLabelProperty
     *      'url' => '', // {null|array|string} the url to link to. A null value removes the href attribute. This property name can be overridden like above. @see $actionUrlProperty
     *      'options' => [], // {array} options to be added to the link. The property name can also be overridden. @see $actionOptionsProperty
     *      'visible' => true // {bool} determine if the property should be shown. This property
     * ]
     */
    public $actions = [];
    /**
     * @var int $maxNoOfLinks the maximum number of buttons before generating an actions button dropdown
     */
    public $maxNoOfLinks = 1;
    /**
     * @var bool $groupLinks group action links in a .btn-group
     */
    public $groupLinks = false;
    /**
     * @var array $linkClasses classes to apply to each action link, and the action button
     */
    public $linkClasses = ['base' => 'btn', 'size' => 'btn-sm', 'modifier' => 'btn-default'];
    /**
     * @var string the actions button dropdown label
     */
    public $actionsButtonLabel = 'Actions ';
    /**
     * @var string caret html for the action button
     */
    public $caretHtml = '<span class="caret"></span>';
    /**
     * @var string $actionLabelProperty configure the action property to use as a label
     */
    protected $actionLabelProperty = 'label';
    /**
     * @var string $actionUrlProperty configure the action property to use as the link's url
     */
    protected $actionUrlProperty = 'url';
    /**
     * @var string $actionOptionsProperty configure the action property to use as options
     */
    protected $actionOptionsProperty = 'options';
    /**
     * @var array $actionButtonOptions options for the action button
     */
    protected $actionButtonOptions = [
        'class' => ['widget' => 'dropdown-toggle'],
        'data-toggle' => 'dropdown',
        'aria-haspopup' => 'true',
        'aria-expanded' => 'false',
    ];
    /**
     * @var array $visibleActions actions that have been marked as visible
     */
    private $visibleActions = [];
    /**
     * @var bool $shouldRenderActionDropdown render the action button dropdown if set to true
     */
    private $shouldRenderActionDropdown;

    public function init()
    {
        parent::init();
        $this->initProperties();
    }

    public function run()
    {
        if ($this->shouldRenderActionDropdown) {
            $this->renderActionButton();
        } else {
            $this->renderActions();
        }
    }

    private function initProperties()
    {
        foreach ($this->actions as $action) {
            if (ArrayHelper::getValue($action, 'visible', true)) {
                $this->visibleActions[] = $action;
            }
        };

        // Action dropdown should be rendered if the no of actions are more than the maximum number of links
        $this->shouldRenderActionDropdown = (count($this->visibleActions) > $this->maxNoOfLinks);

        // Override the value of $this->groupLinks if the action dropdown should be rendered
        $this->groupLinks = ($this->shouldRenderActionDropdown) ? true : $this->groupLinks;
    }

    /**
     * Render the actions as separate links
     */
    private function renderActions()
    {
        $this->beginButtonGroup();
        foreach ($this->visibleActions as $action) {
            $label = ArrayHelper::getValue($action, $this->actionLabelProperty, '');
            $url = ArrayHelper::getValue($action, $this->actionUrlProperty, null);
            $options = ArrayHelper::getValue($action, $this->actionOptionsProperty, []);

            // Use $this->buttonClasses as base classes, then override with any classes specified in options
            $actionClasses = ArrayHelper::getValue($options, 'class', []);
            $options['class'] = $this->linkClasses;
            Html::addCssClass($options, $actionClasses);

            echo Html::a($label, $url, $options);
        }
        $this->endButtonGroup();
    }

    /**
     * Render the action button dropdown
     */
    private function renderActionButton()
    {
        $actionButtonOptions = $this->actionButtonOptions;
        Html::addCssClass($actionButtonOptions, $this->linkClasses);

        $this->beginButtonGroup();

        echo Html::button($this->actionsButtonLabel . $this->caretHtml, $actionButtonOptions);

        echo Html::beginTag('ul', ['class' => 'dropdown-menu dropdown-menu-right']);
        foreach ($this->visibleActions as $action) {
            $label = ArrayHelper::getValue($action, $this->actionLabelProperty, '');
            $url = ArrayHelper::getValue($action, $this->actionUrlProperty, null);
            $options = ArrayHelper::getValue($action, $this->actionOptionsProperty, []);

            echo Html::tag('li', Html::a($label, $url, $options));
        }
        echo Html::endTag('ul');

        $this->endButtonGroup();
    }

    private function beginButtonGroup()
    {
        if ($this->groupLinks) {
            echo $this->beginDiv('btn-group');
        }
    }

    private function endButtonGroup()
    {
        if ($this->groupLinks) {
            echo $this->endDiv();
        }
    }
}
