<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;

/**
 * SiteController class file.
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'about';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function () {
                    return $this->goHome();
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * User login.
     * @return mixed
     */
    public function actionLogin()
    {
        $loginForm = new LoginForm();

        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {
            return $this->goBack();
        }
        return $this->render('login', compact('loginForm'));
    }

    /**
     * User logout.
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * About page.
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * User signup.
     * @return mixed
     */
    public function actionSignup()
    {
        $signupForm = new SignupForm;

        if ($signupForm->load(Yii::$app->request->post())) {
            $user = $signupForm->signup();

            if ($user !== null) {
                if (Yii::$app->user->login($user)) {
                    Yii::$app->session->setFlash('success', 'ユーザ登録が完了いたしました。');
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', compact('signupForm'));
    }
}