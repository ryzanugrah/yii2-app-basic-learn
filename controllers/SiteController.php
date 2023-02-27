<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Comment;
use app\models\Employee;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays comment page.
     *
     * @return string
     */
    public function actionComment()
    {
        $model = new Comment();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());

            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'Your comment has been submitted');
            } else {
                Yii::$app->session->setFlash('error', 'Failed to submit comment');
            }
            return $this->render('comment_alert', ['model' => $model]);
        }

        return $this->render('comment', ['model' => $model]);
    }

    /**
     * Displays employee form page.
     *
     * @return string
     */
    public function actionEmployee()
    {
        $model = new Employee();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());

            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'Employee has been created');
            } else {
                Yii::$app->session->setFlash('error', 'Employee could not be created');
            }
            return $this->render('employee_alert', ['model' => $model]);
        }

        return $this->render('employee', ['model' => $model]);
    }
}
