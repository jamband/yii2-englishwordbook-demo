<?php

namespace app\assets;

/**
 * ToastrAsset class file.
 * @link https://github.com/CodeSeven/toastr
 */
class ToastrAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/toastr';
    public $css = ['toastr.css'];
    public $js = ['toastr.js'];
    public $depends = ['yii\web\JqueryAsset'];
}
