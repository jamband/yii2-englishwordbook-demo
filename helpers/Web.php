<?php

namespace app\helpers;

use Yii;
use yii\data\Pagination;

trait Web
{
    /**
     * Returns a pagination object and model
     * @param ActiveQuery $query
     * @param integer $pageSize per page
     * @return array
     */
    public function pages($query, $pageSize = 20)
    {
        $countQuery = clone $query;

        $pages = Yii::createObject([
            'class' => Pagination::className(),
            'totalCount' => $countQuery->count(),
            'pageSize' => $pageSize,
        ]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return [$pages, $models];
    }
}
