# English Wordbook with Yii 2 Framework
これは Yii 2 Framework を使った英単語帳アプリのデモです。

## 必要条件
- PHP 5.5.0 以上
- MySQL 5.x 以上

## 動作確認
以下の順にコマンドを実行して下さい。  
Composer などがグローバルにインストールされている場合は上手く修正して行ってください。

```
cd path/to/project
git clone https://github.com/jamband/yii2-englishwordbook-demo.git .
curl -sS https://getcomposer.org/installer | php
./composer.phar update
chmod 777 runtime web/assets
```

[Composer Asset Plugin](https://github.com/francoispluchino/composer-asset-plugin) は使用していません。  
 グローバルにインストールしている場合は、削除する必要があります。詳しくは [Yii 2.0.x で Composer Asset Plugin を使わないでアプリを作っていく方法](http://qiita.com/livejam_db/items/70d674d0d735038ef93f) を参考してみて下さい。

## データベースの設定
まず最初に yii2_englishwordbook_demo というデータベースを作成します。今のところ MySQL のみに対応しています。username, password などは config/db.php にて上手く調整してください。完了したら以下を実行します (動作テスト用のデータが migrations/ にありますので良かったら使ってみてください ) 。

```
./yii migrate
```

仕上げに MySQL サーバと PHP ビルトインサーバを起動して http://localhost:8080 にアクセスします。
これもサーバ起動コマンド、ポートやパスなどはお好みで調整してください。

```
mysql.server start
php -S localhost:8080 -t /path/to/project/web
