<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About - ' . Yii::$app->name;
?>
<h1>このサイトについて</h1>

<?= Html::encode(Yii::$app->name) ?> は PHP のフレームワーク Yii 2 Framework
を使った英単語を貯めこむための簡単なデモアプリです。詳しくは
<a href="https://github.com/jamband/yii2-englishwordbook-demo" target="_blank">GitHub: jamband/yii2-englishwordbook-demo</a>
をご覧ください。

<h2 class="page-header">操作方法</h2>
<ul>
    <li>右上の <?= Html::icon('list-ul', 'fa') ?> マークにカーソルを合わせると英単語の作成、編集、削除などができます</li>
    <li>英単語の上にカーソルを合わせると日本語訳が表示されます</li>
    <li>英単語の少し右にカーソルを合わせると登録した英単語の編集ができます</li>
    <li>そこからもう少し右にカーソルを合わせると英単語の削除ができます</li>
    <li>ページ上部の a b c ... をクリックすると英単語の並び替え、絞り込みなどができます</li>
</ul>
