<?php

return array_merge(require Yii::getAlias('@yii').'/messages/ja/yii.php', [
    '{attribute} cannot be blank.' => '{attribute}が入力されていません。',
    '{attribute} should contain at most {max, number} {max, plural, one{character} other{characters}}.' => '{attribute}は{max}文字以内で入力してください。',
]);
