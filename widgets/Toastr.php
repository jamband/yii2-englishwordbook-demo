<?php

namespace app\widgets;

use yii\base\InvalidParamException;
use yii\base\Widget;
use yii\helpers\Json;
use app\assets\ToastrAsset;

/**
 * Toastr class file.
 * @link https://github.com/CodeSeven/toastr
 */
class Toastr extends Widget
{
    /**
     * @var string
     */
    public $type = 'success';

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $message;

    /**
     * @var array
     */
    public $options = [];

    private $_allowedTypes = [
        'info',
        'warning',
        'success',
        'error',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->options = Json::htmlEncode($this->options);
    }

    /**
     * @inheritdoc
     * @throw InvalidConfigException
     */
    public function run()
    {
        if (!in_array($this->type, $this->_allowedTypes, true)) {
            throw new InvalidParamException(get_class($this).'::type property must be either '.implode('|', $this->_allowedTypes));
        }
        $this->registerClientScript();
    }

    public function registerClientScript()
    {
        $view = $this->getView();
        ToastrAsset::register($view);
        $view->registerJs("toastr.options = $this->options;");
        $view->registerJs("toastr.$this->type('$this->message', '$this->title');");
    }
}
