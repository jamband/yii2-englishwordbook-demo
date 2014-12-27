<?php

namespace app\helpers;

use Yii;
use yii\base\InvalidValueException;

class TextCleaner
{
    /**
     * Strip whitespace (or other characters) from the beginning and end of a string.
     * @link http://php.net/manual/en/function.mb-convert-kana.php
     * @param string $text the string that will be trimmed
     * @return string the trimmed string
     */
    public static function trim($text)
    {
        if (!is_string($text)) {
            throw new InvalidValueException('The value must be a string.');
        }

        return trim(mb_convert_kana($text, 's', Yii::$app->charset));
    }
}
