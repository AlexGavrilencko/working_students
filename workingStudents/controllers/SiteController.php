<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Resume;
use app\models\User;
use app\models\Vacancy;
use app\models\Attributes;
use app\models\Organization;

class SiteController extends Controller
{

   

    public $layout = 'site';


    /**
     * {@inheritdoc}
     */
    public function behaviors()   /* Это что? */
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
    public function actionIndex()   /* Это для главной страницы студента */
    {
        $this->layout = 'home';
        
        $category=Attributes::find()->where(['type'=>'category'])->all();
		return $this->render('index',[
			'category'=>$category,
		]);
    }

    public function actionComplete_information()   /* Это для просмотра отдельной страницы */
    {
        return $this->render('complete_information');
    }

    public function actionComplete_information_work()   /* Это для просмотра отдельной страницы */
    {
        return $this->render('complete_information_work');
    }

    public function actionIndexwork()    /* Это для главной страницы работодателя */
    {
        $this->layout = 'homework';
        return $this->render('indexwork');
    }


    public function actionSearch($id)      /* Страница поиска для студента */
    {
        $this->layout = 'site';
		$catvac=Vacancy::find()->where(['category_id' => $id])->all();
        $atr=Attributes::find()->all();
        $org=Organization::find()->all();
		$vac=Vacancy::find()->all();
		return $this->render('search',[
		'catvac'=>$catvac,
		'cat'=>$cat,
        'vac'=>$vac,
        'org'=>$org,	
        'pages' => $pages,
		]);
    }
    public function actionSearch_work()      /* Страница поиска для компании */
    {
        $this->layout = 'site';
        $resume=Resume::find()->all();
        return $this->render('search_work', [
            'resume' => $resume,  /* Заменить на резюме */
            'pages' => $pages,
       ]);
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
    public function actionLogout()    /* Это нужно удалить? */
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
    public function actionAbout()     /* Это нужно удалить? */
    {
        return $this->render('about');
    }

}
