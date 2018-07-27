<?php

namespace CottaCush\Yii2\Widgets;

use yii\grid\GridView;
use yii\helpers\Html;

/**
 * Class GridViewWidget
 * @author Damilola Olaleye <damilola@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class GridViewWidget extends GridView
{
    public $actionButtonLabel;
    public $actionButtonModalId;
    public $actionButtonModalHref;
    public $actionButton;

    /**
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->setupDefaultConfigs();
    }

    /**
     * Set up default configs for Grid View
     * @author Olajide Oye <jide@cottacush.com>
     */
    private function setupDefaultConfigs()
    {
        $this->setLayout();
        $this->setSummary();

        if (!$this->isEmpty()) {
            $this->setActionBar();
        }

        $this->showOnEmpty = false;
    }

    /**
     * set the layout
     * @author Olajide Oye <jide@cottacush.com>
     */
    private function setLayout()
    {
        $this->layout = Html::tag('div', "{items}", ['class' => 'table-responsive']) .
            Html::tag(
                'div',
                Html::tag('div', "{summary}", ['class' => 'pagination-summary']) .
                Html::tag('div', "{pager}", ['class' => 'pagination-wrap']),
                ['class' => 'pagination-box']
            );
    }

    /**
     * set the summary
     * @author Olajide Oye <jide@cottacush.com>
     */
    private function setSummary()
    {
        if ($this->dataProvider->getTotalCount() > 2) {
            $this->summary = 'Showing {begin} &ndash; {end} of {totalCount} items';
        } else {
            $this->summary = '';
        }
    }

    /**
     * set the Action bar
     * @author Damilola Olaleye <damilola@cottacush.com>
     */
    public function setActionBar()
    {
        if (is_null($this->actionButtonLabel) && is_null($this->actionButtonModalId)) {
            return;
        }

        $this->getView()->params['content-header-button'] = [
            'label' => $this->actionButtonLabel,
            'options' => [
                'data-toggle' => 'modal',
                'data-target' => $this->actionButtonModalId,
                'href' => $this->actionButtonModalHref ?: '#'
            ]
        ];
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @return bool
     */
    public function isEmpty()
    {
        return $this->dataProvider->getTotalCount() == 0;
    }
}
