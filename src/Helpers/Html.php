<?php

namespace CottaCush\Yii2\Helpers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html as YiiHtml;

/**
 * Class Html
 * Useful functions added to the default Yii2 Html helper class
 * @author Olajide Oye <jide@cottacush.com>
 * @package CottaCush\Yii2\Helpers
 */
class Html extends YiiHtml
{

    /**
     * Generate the HTML for an icon
     * @param string $name icon short name, eg. user.
     * @param array $options extra options to pass into the tag. These will be rendered as
     * the attributes of the resulting tag. There are also a special options:
     *
     * - tag: string, tag to be rendered, by default 'span' is used.
     * - prefix: string, prefix which should be used to compose tag class. An example could be 'fa fa-' for FontAwesome
     *
     * @return string the generated HTML for the icon.
     */
    public static function baseIcon($name = '', $options = [])
    {
        $tag = ArrayHelper::remove($options, 'tag', 'span');
        $classPrefix = ArrayHelper::remove($options, 'prefix', '');

        static::addCssClass($options, $classPrefix . $name);
        return static::tag($tag, '', $options);
    }

    /**
     * Generate the HTML for FontAwesome icons
     * @param string $name
     * @param array $options
     * @return string the generated HTML for the FontAwesome icon
     * @see Html::baseIcon()
     */
    public static function fontAwesomeIcon($name = '', $options = [])
    {
        $options['prefix'] = 'fa fa-';
        return static::baseIcon($name, $options);
    }

    /**
     * Proxy function to generate HTML for FontAwesome icons
     * @see Html::fontAwesomeIcon()
     * @param string $name
     * @param array $options
     * @return string
     */
    public static function faIcon($name = '', $options = [])
    {
        return static::fontAwesomeIcon($name, $options);
    }

    /**
     * Generate the HTML for IonIcons icons
     * @param string $name
     * @param array $options
     * @return string the generated HTML for the IonIcons icon
     * @see Html::baseIcon()
     */
    public static function ionIcon($name = '', $options = [])
    {
        $options['prefix'] = 'ion ion-';
        return static::baseIcon($name, $options);
    }

    /**
     * Generate the HTML for glyphIcon icons
     * @param string $name
     * @param array $options
     * @return string the generated HTML for the glyphIcon icon
     * @see Html::baseIcon()
     */
    public static function glyphIcon($name = '', $options = [])
    {
        $options['prefix'] = 'glyphicon glyphicon-';
        return static::baseIcon($name, $options);
    }
}
