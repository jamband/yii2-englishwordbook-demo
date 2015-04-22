<?php

namespace app\assets\bundles;

/**
 * CommonAsset class file.
 */
class CommonAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@app/assets/public';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/common.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'js/common.js',
    ];
}
