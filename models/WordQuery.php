<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * WordQuery class file.
 */
class WordQuery extends ActiveQuery
{
    /**
     * By user_id attribute query.
     * @param integer $userId
     * @return WordQuery
     */
    public function userId($userId)
    {
        return $this->andWhere(['user_id' => $userId]);
    }

    /**
     * By sort string query.
     * @param string $sort
     * @return WordQuery
     */
    public function sort($sort)
    {
        $this->orderBy(['id' => SORT_DESC]);

        if ($sort === 'az') {
            $this->orderBy(['en' => SORT_ASC]);
        }
        if ($sort === 'za') {
            $this->orderBy(['en' => SORT_DESC]);
        }
        if ($sort === 'old') {
            $this->orderBy(['id' => SORT_ASC]);
        }
        if ($sort === 'rnd') {
            $this->orderBy('RAND()');
        }
        if (strlen($sort) === 1) {
            $this->andFilterWhere(['like', 'en', "$sort%", false])
                ->orderBy(['en' => SORT_ASC]);
        }

        return $this;
    }

    /**
     * By search string query.
     * @param string $search
     * @return WordQuery
     */
    public function search($search)
    {
        return $this->andFilterWhere(['or', ['like', 'en', $search], ['like', 'ja', $search]])
            ->orderBy(['en' => SORT_ASC]);
    }
}
