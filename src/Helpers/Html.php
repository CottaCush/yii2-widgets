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

    /**
     * Add an SVG image with the option of providing a fallback image. This is useful when you want to use SVG images,
     * but still provide fallback support for browsers that don't support SVG, like IE8 and below.
     * @param array|string $src the source of the element. To be processed by [[Url::to()]]
     * @param array $options options to be passed into the image tag, including two special properties:
     *   - 'fallback': bool|string the fallback image to use. If set to true, replace the image url extension with fallbackExt.
     *   - 'fallbackExt' string the fallback extension, default is 'png'.
     * @return string
     * @see YiiHtml::img()
     */
    public static function svgImg($src, $options = [])
    {
        $fallback = ArrayHelper::getValue($options, 'fallback', true);
        $fallbackExt = ArrayHelper::getValue($options, 'fallbackExt', 'png');

        if ($fallback) {
            if (is_bool($fallback) && is_string($src)) {
                $fallback = rtrim($src, 'svg') . $fallbackExt;
                $options['onerror'] = "this.src = '$fallback'; this.onerror = '';";
            } else if (is_string($fallback)) {
                $options['onerror'] = "this.src = '$fallback'; this.onerror = '';";
            }
        }

        return self::img($src, $options);
    }

    /**
     * @param array|string $classNames
     * @param array $options
     * @return string
     */
    public static function beginDiv($classNames = [], $options = [])
    {
        self::addCssClass($options, $classNames);
        return self::beginTag('div', $options) . "\n";
    }

    /**
     * @return string
     */
    public static function endDiv()
    {
        return self::endTag('div') . "\n";
    }
}
