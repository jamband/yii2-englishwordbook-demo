<?php

namespace app\models;

use yii\base\Model;

/**
 * SignupForm class file.
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'ユーザ名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_repeat' => 'パスワードの再入力',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9\_]{4,20}$/', 'skipOnEmpty' => false,
                'message' => '{attribute}が正しくありません。',
            ],
            ['username', 'unique', 'targetClass' => 'app\models\User',
                'message' => 'その{attribute}はご利用になれません。',
            ],
            ['email', 'email', 'skipOnEmpty' => false],
            ['email', 'unique', 'targetClass' => 'app\models\User',
                'message' => 'その{attribute}はご利用になれません。',
            ],
            ['password', 'match', 'pattern' => '/^[a-zA-Z0-9\_]{8,60}$/', 'skipOnEmpty' => false,
                'message' => '{attribute}が正しくありません。',
            ],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Signs up user.
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();

            return $user;
        }
        return null;
    }
}
