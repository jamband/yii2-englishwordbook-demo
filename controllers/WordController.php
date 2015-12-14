<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Word;

/**
 * WordController class file.
 */
class WordController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
        $query = Word::find()
            ->userId(Yii::$app->user->id);

        if ($search === null) {
            $query->sort($sort);
        } else {
            $query->search($search);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
            'pagination' => [
                'pageSize' => Yii::$app->params['wordPerPage'],
            ],
        ]);
        $provider->prepare(true);

        return $this->render('index', [
            'provider' => $provider,
            'search' => $search,
        ]);
    }

    /**
     * Creates a new word.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Word();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '英単語の追加が完了いたしました。');
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates a particular word.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '英単語の更新が完了いたしました。');
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
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
        $model = Word::find()->userId(Yii::$app->user->id)
            ->andWhere(['id' => $id])
            ->limit(1)
            ->one();

        if ($model === null) {
            throw new NotFoundHttpException('データがありません。');
        }
        return $model;
    }
}
