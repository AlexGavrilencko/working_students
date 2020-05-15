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
use app\models\Experience;
use app\models\ArtCategory;
use app\models\Article;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    public $layout = 'site';

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
        if($user->id!=null){
            $scanned=new Scanned();
            $scanned->user_id=$user_id;
            $scanned->vacancy_id=$id;
            $scanned->ViewOrSelect=0;
            $sc=Scanned::find()->where(['user_id' => $user_id,'vacancy_id' => $id,'ViewOrSelect' => 0])->all();
            if($sc==null){
                $scanned->create();
            }
        }
        $vac=Vacancy::find()->where(['id' => $id])->one();
        $vac->viewedCounter();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information',[
            'vac'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionComplete_information_work($id)   /* Это для просмотра отдельной страницы */
    {
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        if($user->id!=null){
            $scanned=new Scanned();
            $scanned->user_id=$user_id;
            $scanned->resume_id=$id;
            $scanned->ViewOrSelect=0;
            $sc=Scanned::find()->where(['user_id' => $user_id,'resume_id' => $id,'ViewOrSelect' => 0])->all();
            if($sc==null){
                $scanned->create();
            }
        }
        $resume=Resume::find()->where(['id' => $id])->one();
        $exp=Experience::find()->where(['resume_id' => $id,'StudyOrWork'=>1])->all();//опыт работы
        $educ=Experience::find()->where(['resume_id' => $id,'StudyOrWork'=>0])->all();//образование
        //var_dump($resume);
        $resume->viewedCounter();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information_work',[
            'resum'=>$resume,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'exp'=>$exp,
            'educ'=>$educ,
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
        $idc=$id;
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        $data = Vacancy::getAll(5);
            return $this->render('search',[
            'catvac'=>$catvac,
            'cat'=>$cat,
            'vac'=>$vac,
            'org'=>$org,
            'idc'=>$idc,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'pagination'=>$data['pagination'],
            'vacancy'=>$data['vacancy'],
            ]);
    }

    public function actionSearch_work()      /* Страница поиска для компании */
    {
        $this->layout = 'site';
        $resume=Resume::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        $data = Resume::getAll(5);
        return $this->render('search_work',[
            'resume' => $resume,   /* Заменить на резюме */
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'pagination'=>$data['pagination'],
            'resump'=>$data['resume'],
       ]);
    }

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

    public function actionAbout()     /* Это нужно удалить? */
    {
        return $this->render('about');
    }

    public function actionSelected($id){  /* Добавление в избранное у студента */
         $user=Yii::$app->user->identity;
         $user_id=$user->id;
         if($user->id!=null){
            $sc=Scanned::find()->where(['user_id' => $user_id,'vacancy_id' => $id,'ViewOrSelect' => 1])->one();
            if($sc==null){
                $scanned=new Scanned();
                $scanned->user_id=$user_id;
                $scanned->vacancy_id=$id;
                $scanned->ViewOrSelect=1;
                $scanned->create();
            }
           
        };
        $vac=Vacancy::find()->where(['id' => $id])->one();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        
        return $this->render('complete_information',[
            'vac'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]); 
    }

     public function actionSelected_r($id){
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        if($user->id!=null){
            $scanned=new Scanned();
            $scanned->user_id=$user_id;
            $scanned->resume_id=$id;
            $scanned->ViewOrSelect=1;
            $sc=Scanned::find()->where(['user_id' => $user_id,'resume_id' => $id,'ViewOrSelect' => 1])->all();
           // if($sc!=null){
            //    $scanned->delete();
            //}
            if($sc==null){
                $scanned->create();
            }
        }
        $resume=Resume::find()->where(['id' => $id])->one();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information_work',[
            'resum'=>$resume,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionSearchws(){
        $this->layout = 'site';
        // Разбераем запрос
        $search = Yii::$app->request->get('search');
        ///var_dump($search);
        // Обрезаем пробелы
        $search1 = str_replace(' ', '', $search);
        // Поисковый запрос с поиском и обрезанием пробелов
        $query = Vacancy::find()->filterWhere(['like','name', $search1])->all();
        $vall=Vacancy::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('search',[
            'vac'=>$query,
            'vall'=>$vall,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionSearchfilt(){
        $this->layout = 'site';
        // Разбераем запрос
        $city = Yii::$app->request->get('city');
        $categ = Yii::$app->request->get('categ');
        $posit = Yii::$app->request->get('posit');
        $salaro = Yii::$app->request->get('salaro');
        $salard = Yii::$app->request->get('salard');
        var_dump($city,$salaro,$salard,$schelude);
        if($citty!=null){
            if($categ!=null){
                if($posit!=null){
                    if($salar!=null){
                        $query=Vacancy::find()->where(['city_id' => $citty,'posit' => $posit,'salary' => $salar,'categ' => $categ])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $citty,'posit' => $posit,'categ' => $categ])->all();
                    }
                }
                else{
                    if($salar!=null){
                        $query=Vacancy::find()->where(['city_id' => $citty,'salary' => $salar,'categ' => $categ])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $citty,'categ' => $categ])->all();
                    }
                }
            }
            else{
                if($posit!=null){
                    if($salar!=null){
                        $query=Vacancy::find()->where(['city_id' => $citty,'posit' => $posit,'salary' => $salar])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $citty,'posit' => $posit])->all();
                    }
                }
                else{
                    if($salar!=null){
                        $query=Vacancy::find()->where(['city_id' => $citty,'salary' => $salar])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $citty])->all();
                    }
                }
            }
        }
        else{
            if($categ!=null){
                if($posit!=null){
                    if($salar!=null){
                        $query=Vacancy::find()->where(['posit' => $posit,'salary' => $salar,'categ' => $categ])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['posit' => $posit,'categ' => $categ])->all();
                    }
                }
                else{
                    if($salar!=null){
                        $query=Vacancy::find()->where(['salary' => $salar,'categ' => $categ])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['categ' => $categ])->all();
                    }
                }
            }
            else{
                if($posit!=null){
                    if($salar!=null){
                        $query=Vacancy::find()->where(['posit' => $posit,'salary' => $salar])->all();
                    }
                    else{
                        $query=Vacancy::find()->where(['posit' => $posit])->all();
                    }
                }
                else{
                    if($salar!=null){
                        $query=Vacancy::find()->where(['salary' => $salar])->all();
                    }
                    else{
                        $query=Vacancy::find()->all();
                    }
                }
            }
        }
        //var_dump($search);
        // Обрезаем пробелы
        //$search1 = str_replace(' ', '', $search);
        // Поисковый запрос с поиском и обрезанием пробелов
        //$query = Vacancy::find()->filterWhere(['like','name', $search1])->all();
       
        $vall=Vacancy::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        $data = Vacancy::getAll(5);
        return $this->render('search',[
            'vacancy'=>$query,
            'vall'=>$vall,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'pagination'=>$data['pagination'],
            'vacanc'=>$data['vacancy'],
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

//отображение всех вакансий одной компании(пользователя)
public function actionOrg_vacancy(){
    $this->layout = 'site';
    $user = Yii::$app->user->identity; 
    $org = Organization::find()->where(['user_id'=>$user->id])->one();
    $vac = Vacancy::find()->where(['user_id'=>$user->id])->all();
    $data = Vacancy::getAll(5);
    //var_dump($vac);
    return $this->render('org_vacancy',[
        'vac'=>$vac,
        'org'=>$org,
        'pagination'=>$data['pagination'],
        'vacancy'=>$data['vacancy'],
    ]);
}



}
