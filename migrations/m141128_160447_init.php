<?php

use yii\db\Schema;
use jamband\migrations\Migration;

class m141128_160447_init extends Migration
{
    public function safeUp()
    {
        // user
        $this->createTable('user', [
            'id' => Schema::TYPE_PK . " COMMENT '主キー'",
            'username' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'ユーザ名'",
            'email' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'メールアドレス'",
            'password' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'パスワード'",
            'auth_key' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '認証キー'",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL COMMENT '作成日時'",
            'updated_at' => Schema::TYPE_INTEGER . "(11) NOT NULL COMMENT '更新日時'",
        ], $this->tableOptions);

        $this->createIndex('user_username', 'user', 'username', true);
        $this->createIndex('user_email', 'user', 'email', true);

        // word
        $this->createTable('word', [
            'id' => Schema::TYPE_PK . " COMMENT '主キー'",
            'user_id' => Schema::TYPE_INTEGER . "(11) NOT NULL COMMENT 'ユーザID'",
            'en' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '英単語'",
            'ja' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '日本語訳'",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL COMMENT '作成日時'",
            'updated_at' => Schema::TYPE_INTEGER . "(11) NOT NULL COMMENT '更新日時'",
        ], $this->tableOptions);

        $this->createIndex('word_user_id_en', 'word', 'user_id, en', false);

        // fk: word
        $this->addForeignKey('fk_word_user_id', 'word', 'user_id', 'user', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropTable('word');
        $this->dropTable('user');
    }
}
