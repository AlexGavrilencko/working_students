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
use app\models\Scanned;
use app\models\ArtCategory;
use app\models\Article;

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

        $organizations = Organization::find()->orderBy('RAND()')->limit(8)->all();

		return $this->render('index',[
			'category'=>$category,
            'organizations' => $organizations
		]);
    }

    public function actionComplete_information($id)   /* Это для просмотра отдельной страницы */
    {
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        $scanned=new Scanned();
        $scanned->user_id=$user_id;
        $scanned->vacancy_id=$id;
        $scanned->ViewOrSelect=0;
        $scanned->create();
        $vac=Vacancy::find()->where(['id' => $id])->one();
        return $this->render('complete_information',[
            'vac'=>$vac,
        ]);
        
    }

    public function actionComplete_information_work($id)   /* Это для просмотра отдельной страницы */
    {
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        $scanned=new Scanned();
        $scanned->user_id=$user_id;
        $scanned->resume_id=$id;
        $scanned->ViewOrSelect=0;
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
       
        $atr=Attributes::find()->all();
        $org=Organization::find()->all();
        $vac=Vacancy::find()->all();
        //$filter='';
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
        
        return $this->render('search_work',[
            'resume' => $resume,   /* Заменить на резюме */
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
     public function actionSelected($id){
         $user=Yii::$app->user->identity;
         $user_id=$user->id;
         $scanned=new Scanned();
         $scanned->user_id=$user_id;
         $scanned->vacancy_id=$id;
         $scanned->ViewOrSelect=1;
         $scanned->create();
         return $this->redirect(Yii::$app->user->returnUrl); 
     }

     public function actionSelected_r($id){
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        $scanned=new Scanned();
        $scanned->user_id=$user_id;
        $scanned->resume_id=$id;
        $scanned->ViewOrSelect=1;
        $scanned->create();
        return $this->render('search_work');
    }

    public function actionSearchWordSt(){
        // Разбераем запрос
        $search = Yii::$app->request->get('search');
        var_dump($search);
        // Обрезаем пробелы
        $search1 = str_replace(' ', '', $search);
        // Поисковый запрос с поиском и обрезанием пробелов
        $query = Vacancy::find()->where(['like', 'replace(name, " ", "")', $search1]);
        $this->setMeta('Поиск', 'blog', 'workstud.ru');
        //Строим ActiveDataProvider
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>[
                'pageSize' => 3,
            ],
        ]);
        var_dump($query);
        // Передаём в вид index
        return $this->render('search',[
            'dataProvider' => $dataProvider,
            'search1'=>$search
        ]);

        
    }


    public function actionIndexartic()
    {
        $this->layout = 'article';
        $data = Article::getAll(5);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        
        return $this->render('indexart',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }
    
    public function actionView($id)
    {
        $this->layout = 'article';
        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        

        $article->viewedCounter();
        
        return $this->render('single',[
            'article'=>$article,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            
        ]);
    }
    
    public function actionCategory($id)
    {
        $this->layout = 'article';
        $data = ArtCategory::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        
        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

}
