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

    public function actionComplete_information($id)   /* Это для просмотра отдельной страницы */
    {
        $vac=Vacancy::find()->where(['id' => $id])->one();
        return $this->render('complete_information',[
            'vac'=>$vac,
            ]);
        
    }

    public function actionComplete_information_work($id)   /* Это для просмотра отдельной страницы */
    {
        $resume=Resume::find()->where(['id' => $id])->one();
        return $this->render('complete_information_work',[
            'resum'=>$resume,
            ]);
        
    }

    public function actionIndexwork()    /* Это для главной страницы работодателя */
    {
        $this->layout = 'homework';
        $resume=Resume::find()->all();
        return $this->render('indexwork',[
            'resume'=>$resume,
            ]);
       
    }

    public function actionPersonal_data_protection()    /* Это для документа защиты персональных даннх */
    {
        return $this->render('personal_data_protection');
    }

    public function actionSite_terms_of_use()    /* Это для документа защиты персональных даннх */
    {
        return $this->render('site_terms_of_use');
    }
    
    public function actionThe_agreement()    /* Это для документа защиты персональных даннх */
    {
        return $this->render('the_agreement');
    }
    
    public function actionRules_for_placement_of_vacancies()    /* Это для документа защиты персональных даннх */
    {
        return $this->render('rules_for_placement_of_vacancies');
    }

    public function actionSearch($id)      /* Страница поиска для студента */
    {
        
        $this->layout = 'site';
        if($id===0){
            $catvac=Vacancy::findAll();
        }
        else{
            $catvac=Vacancy::find()->where(['category_id' => $id])->all();
        }
       // var_dump($catvac);die();
        $atr=Attributes::find()->all();
        $org=Organization::find()->all();
        $vac=Vacancy::find()->all();
        $filter='';
        $idc=$id;
		return $this->render('search',[
		'catvac'=>$catvac,
		'cat'=>$cat,
        'vac'=>$vac,
        'org'=>$org,
        'idc'=>$idc,
		]);
    }
    public function actionSearch_work()      /* Страница поиска для компании */
    {
        $this->layout = 'site';
        $resume=Resume::find()->all();
        return $this->render('search_work', [
            'resume' => $resume,  /* Заменить на резюме */
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
