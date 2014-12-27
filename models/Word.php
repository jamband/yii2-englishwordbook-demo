<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\helpers\TextCleaner;

/**
 * Word class file.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $en
 * @property string $ja
 * @property integer $created_at
 * @property integer $updated_at
 */
class Word extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'word';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // en
            ['en', 'required'],
            ['en', 'string', 'max' => 50],

            // ja
            ['ja', 'required'],
            ['ja', 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主キー',
            'user_id' => 'ユーザID',
            'en' => '英単語',
            'ja' => '日本語訳',
            'created_at' => '作成日時',
            'updated_at' => '更新日時',
        ];
    }

    /**
     * @inheritdoc
     * @return WordQuery
     */
    public static function find()
    {
        return new WordQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function beforeValidate()
    {
        $this->en = TextCleaner::trim($this->en);
        $this->ja = TextCleaner::trim($this->ja);

        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
}