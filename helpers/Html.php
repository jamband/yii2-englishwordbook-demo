<?php

namespace yii\helpers;

/**
 * Html class file.
 */
class Html extends \yii\helpers\BaseHtml
{
    /**
     * Generates a icon.
     *
     * For example,
     *
     * ```php
     * <?= Html::icon('search') ?>
     * // <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
     *
     * <?= Html::icon('search', 'fa', 'fa-lg') ?>
     * // <span class="fa fa-search fa-lg" aria-hidden="true"></span>
     * ```
     *
     * @param string $name the icon name
     * @param string $type the icon type (e.g. twbs, fa)
     * @param string $append insert the other classes (e.g. fa-lg, fa-fw)
     * @return string the generated icon
     */
    public static function icon($name, $type = 'twbs', $append = '')
    {
        $options['class'] = 'glyphicon glyphicon-';

        if ($type === 'fa') {
            $options['class'] = 'fa fa-';
        }
        $options['class'] .= (string) $name;

        if ($append !== '') {
            static::addCssClass($options, (string) $append);
        }
        $options['aria-hidden'] = 'true';

        return static::tag('span', '', $options);
    }
}
