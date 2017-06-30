<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\LetterAvatarAsset;
use CottaCush\Yii2\Helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Class BaseUserAvatar
 * Base UserAvatar widget. It's not meant to be used directly. Instead, extend it and set the protected properties as required.
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Widgets
 */
class BaseUserAvatar extends BaseWidget
{
    /**
     * @var array $user the user model
     */
    public $user = [];
    /**
     * @var int $size the size of the image (in pixels)
     */
    public $size;
    /**
     * @var array $options
     */
    public $options = [];
    /**
     * @var string|array $baseClass the base class to use for the avatar
     */
    protected $baseClass = [];
    /**
     * @var string $fallbackImage a fallback image to use if the avatar doesn't load
     */
    protected $fallbackImage;
    /**
     * @var string $nameProperty the property name to use to access the user's name from the user model.
     */
    protected $nameProperty = 'fullName';
    /**
     * @var string $avatarProperty the property name to use to access the user's avatar from the user model.
     */
    protected $avatarProperty = 'avatar';
    /**
     * @var string $name the user's name.
     */
    private $name;
    /**
     * @var string the user avatar image
     */
    private $image;
    /**
     * @var int $id the user id
     */
    private $id;

    public function init()
    {
        parent::init();

        $this->name = ArrayHelper::getValue($this->user, $this->nameProperty, '');
        $this->image = ArrayHelper::getValue($this->user, $this->avatarProperty, '');
        $this->id = ArrayHelper::getValue($this->user, 'id', 0);

        if (empty($this->image) && !empty($this->user)) {
            LetterAvatarAsset::register($this->view);
            $this->options['data-avatar'] = $this->name;
        }

        $this->options["data-avatar-{$this->id}"] = true;

        // Add the base class
        Html::addCssClass($this->options, $this->baseClass);

        // Set fallback avatar as onerror attribute
        if (!empty($this->fallbackImage)) {
            $this->options['onerror'] = "this.src='{$this->fallbackImage}'";
        }

        // Add size attributes to the image
        if (!empty($this->size)) {
            $this->options['width'] = $this->size;
            $this->options['height'] = $this->size;
        }
    }

    public function run()
    {
        return Html::img($this->image, $this->options);
    }
}
