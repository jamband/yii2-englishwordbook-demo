<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use tests\codeception\unit\fixtures\WordFixture;
use app\models\Word;

class WordTest extends TestCase
{
    public function fixtures()
    {
        return [
            'words' => WordFixture::className(),
        ];
    }

    public function testEnRule()
    {
        $word = new Word;

        // required
        $word->en = '';
        $word->ja = '';
        $this->assertFalse($word->validate(['en']));

        $word->en = 'a';
        $this->assertTrue($word->validate(['en']));

        // string: max
        $word->en = str_repeat('a', 51);
        $this->assertFalse($word->validate(['en']));

        $word->en = str_repeat('a', 50);
        $this->assertTrue($word->validate(['en']));
    }

    public function testJaRule()
    {
        $word = new Word;

        // required
        $word->en = '';
        $word->ja = '';
        $this->assertFalse($word->validate(['ja']));

        $word->ja = 'あ';
        $this->assertTrue($word->validate(['ja']));

        // string: max
        $word->ja = str_repeat('あ', 51);
        $this->assertFalse($word->validate(['ja']));

        $word->ja = str_repeat('あ', 50);
        $this->assertTrue($word->validate(['ja']));
    }

    public function testUserId()
    {
        $this->assertSame('5', Word::find()->userId(1)->count());
        $this->assertSame('2', Word::find()->userId(2)->count());
    }

    /**
     * @dataProvider sortQueryProvider
     */
    public function testSortQuery($sort, $count, $id)
    {
        $word = Word::find()->userId(1)->sort($sort);
        $this->assertSame($count, $word->count());
        $this->assertSame($id, $word->all()[0]->id);
    }

    public function sortQueryProvider()
    {
        return [
            [null, '5', 5],
            ['new', '5', 5],
            ['xxxxx', '5', 5],
            ['az', '5', 3],
            ['za', '5', 4],
            ['old', '5', 1],
            ['a', '1', 3],
            ['b', '1', 1],
        ];
    }

    /**
     * @dataProvider searchQueryProvider
     */
    public function testSearchQuery($search, $count, $id)
    {
        $word = Word::find()->userId(1)->search($search);
        $this->assertSame($count, $word->count());
        $this->assertSame($id, $word->all()[0]->id);
    }

    public function searchQueryProvider()
    {
        return [
            ['', '5', 3],
            ['er', '1', 1],
            ['ール', '1', 1],
            ['at', '2', 2],
            ['べる', '1', 4],
        ];
    }

    public function testBeforeValidate()
    {
        $word = new Word([
            'en' => ' a ',
            'ja' => '　あ　',
        ]);
        $this->assertTrue($word->validate());
        $this->assertSame('a', $word->en);
        $this->assertSame('あ', $word->ja);
    }
}
