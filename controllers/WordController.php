<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\helpers\Web;
use app\models\Word;

/**
 * WordController class file.
 */
class WordController extends Controller
{
    use Web;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all words.
     * @param string $sort
     * @param string $search
     * @return mixed
     */
    public function actionIndex($sort = null, $search = null)
    {
        $query = Word::find()->userId(Yii::$app->user->id);

        if ($search === null) {
            $query->sort($sort);
        } else {
            $query->search($search);
        }
        list($pagination, $words) = $this->pages($query, Yii::$app->params['wordPerPage']);

        return $this->render('index', compact('search', 'pagination', 'words'));
    }

    /**
     * Creates a new word.
     * @return mixed
     */
    public function actionCreate()
    {
        $word = new Word;

        if ($word->load(Yii::$app->request->post()) && $word->save()) {
            Yii::$app->session->setFlash('success', '英単語の追加が完了いたしました。');
            return $this->redirect(['index']);
        }
        return $this->render('create', compact('word'));
    }

    /**
     * Updates a particular word.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $word = $this->findModel($id);

        if ($word->load(Yii::$app->request->post()) && $word->save()) {
            Yii::$app->session->setFlash('success', '英単語の更新が完了いたしました。');
            return $this->redirect(['index']);
        }
        return $this->render('update', compact('word'));
    }

    /**
     * Deletes a particular word.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', '英単語の削除が完了いたしました。');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Word model based on its primary key value.
     * @param string $id
     * @return Word the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    private function findModel($id)
    {
        $word = Word::find()->userId(Yii::$app->user->id)
            ->andWhere(['id' => $id])
            ->limit(1)
            ->one();

        if ($word === null) {
            throw new NotFoundHttpException('データがありません。');
        }
        return $word;
    }
}
