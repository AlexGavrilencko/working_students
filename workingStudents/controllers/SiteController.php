<?php

namespace app\controllers;

use app\models\CategoryProfstand;
use app\models\Position;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Resume;
use app\models\User;
use app\models\Vacancy;
use app\models\Attributes;
use app\models\Organization;
use app\models\Scanned;
use app\models\Project;
use app\models\Experience;
use app\models\ArtCategory;
use app\models\Article;
use app\models\ArticleTag;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use app\models\Profstand;

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

    public function actionPersonal_data_protection()    /* Это для документа защиты персональных даннх */
    {
        return $this->render('personal_data_protection');
    }

    public function actionSite_terms_of_use()    /*  */
    {
        return $this->render('site_terms_of_use');
    }
    
    public function actionThe_agreement()    /*  */
    {
        return $this->render('the_agreement');
    }
    
    public function actionRules_for_placement_of_vacancies()    /*  */
    {
        return $this->render('rules_for_placement_of_vacancies');
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

    public function actionIndexwork()    /* Это для главной страницы работодателя */
    {
        $this->layout = 'homework';
        $resume=Resume::find()->all();
        $organizations = Organization::find()->orderBy('RAND()')->limit(8)->all();
        return $this->render('indexwork',[
            'resume'=>$resume,
            'organizations' => $organizations
            ]);
    }











    public function actionComplete_information($id)   /* Это для просмотра отдельной страницы вакансии*/
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
        $vac=Vacancy::find()->where(['id'=>$id])->one();
        $vac->viewedCounter();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information',[
            'vacan'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionComplete_information_work($id)   /* Это для просмотра отдельной страницы резюме*/
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
        $userID=$resume->user_id;
        $exp=Experience::find()->where(['resume_id' => $id,'StudyOrWork'=>1])->all();//опыт работы
        $educ=Experience::find()->where(['resume_id' => $id,'StudyOrWork'=>0])->all();//образование
        $project=Project::find()->where(['user_id'=>$userID])->all();
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
            'project'=>$project,
        ]);
    }

    public function actionComplete_information_practic($id)   /* Это для просмотра отдельной страницы  практики*/
    {
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        $vac=Vacancy::find()->where(['id'=>$id])->one();
        $vac->viewedCounter();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information_practic',[
            'vacan'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    










    

    public function actionSearch($id)      /* Страница поиска для студента */
    {
        $this->layout = 'site'; 
        $query =Vacancy::find()->where(['WorkOrPractice' => 0]);
        $data = Vacancy::getSearch($query);   
        $count=$query->count();
        $atr=Attributes::find()->all();
        $org=Organization::find()->all();
        $vac=Vacancy::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
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
            'count'=>$count,
            ]);
    }

    public function actionSearchcat($id)      /* Страница поиска для студента по категориям с главной*/
    {
        $this->layout = 'site';
        if($id!=null){
            $query =Vacancy::find()->where(['category_id'=>$id,'WorkOrPractice' => 0]);
            $data = Vacancy::getSearch($query);
            $count=$query->count();
        }
        $atr=Attributes::find()->all();
        $org=Organization::find()->all();
        $vac=Vacancy::find()->all();
        $idc=$id;
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
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
            'count'=>$count,
            
        ]);
    }

    public function actionSearchws(){  /* Страница поиска для студента по слову с главной*/
        $this->layout = 'site';
        $search = Yii::$app->request->get('search');
        // Обрезаем пробелы
        $search1 = str_replace(' ', '', $search);
        // Поисковый запрос с поиском и обрезанием пробелов
        $query = Vacancy::find()->filterWhere(['like','name', $search1])->andWhere(['WorkOrPractice' => 0]);
        $data = Vacancy::getSearch($query);
        $count=$query->count();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('search',[
            'vacancy'=>$query,
            'vall'=>$vall,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'pagination'=>$data['pagination'],
            'vacancy'=>$data['vacancy'],
            'count'=>$count,
        ]);
    }

    public function actionGetCategoryProfstand()
    {
        $res = CategoryProfstand::find()->where(['profstand_id' => Yii::$app->request->get('q')])->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $res;
    }

    public function actionGetPosition()
    {
        $res = Position::find()->where(['categprofst_id' => Yii::$app->request->get('q')])->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $res;
    }



    public function actionSearchfilt(){ /* Страница поиска для студента по фильтрам*/
        $this->layout = 'site';
        // Разбераем запрос
        $city = Yii::$app->request->get('city');
        $categ = Yii::$app->request->get('categ');
        $positt = Yii::$app->request->get('posit');
        $salaro = Yii::$app->request->get('salaro');
        $salard = Yii::$app->request->get('salard');
        $schelude = Yii::$app->request->get('schelude');
        $color = $_GET['schelude'];
        //var_dump($color);
        $exper = Yii::$app->request->get('exper');
        $posit = str_replace(' ', '', $positt);
        if($salaro===""){
            $salaro=0;
        }
        if($salard===""){
            $salard=2147483648;
        }
        if($city==="Город"){
            $city=null;
        }
        if($categ==="Категория"){
            $categ=null;
        }
        
        if($city!=null){
            if($categ!=null){
                if($posit!=null){
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['city_id' => $city,'category_id' => $categ,'WorkOrPractice' => 0])->andFilterWhere(['like','name', $posit]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $city,'category_id' => $categ,'WorkOrPractice' => 0])->andFilterWhere(['like','name', $posit]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
                else{
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['city_id' => $city,'category_id' => $categ,'WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $city,'category_id' => $categ,'WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
            }
            else{
                if($posit!=null){
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['city_id' => $city,'WorkOrPractice' => 0])->andFilterWhere(['like','name', $posit]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $city,'WorkOrPractice' => 0])->andFilterWhere(['like','name', $posit]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
                else{
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['city_id' => $city,'WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['city_id' => $city,'WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        //var_dump($query);
                        $count=$query->count();
                    }
                }
            }
        }
        else{
            if($categ!=null){
                if($posit!=null){
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['category_id' => $categ,'WorkOrPractice' => 0])->andFilterWhere(['like','name', $posit]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['category_id' => $categ,'WorkOrPractice' => 0])->andFilterWhere(['like','name', $posit]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
                else{
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['category_id' => $categ,'WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['category_id' => $categ,'WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
            }
            else{
                if($posit!=null){
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andFilterWhere(['like','name', $posit])->andWhere(['WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->filterWhere(['like','name', $posit])->andWhere(['WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
                else{
                    if(($salaro!=null)||($salard!=null)){
                        $query=Vacancy::find()->filterWhere(['between', 'salary', $salaro, $salard])->andWhere(['WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                    else{
                        $query=Vacancy::find()->where(['WorkOrPractice' => 0]);
                        $data = Vacancy::getSearch($query);
                        $count=$query->count();
                    }
                }
            }
        }
        if($city!=null){
            $city=Attributes::findOne($city);
        }
        if($categ!=null){
            $categ=Profstand::findOne($categ);
        }
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('search',[
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'pagination'=>$data['pagination'],
            'vacancy'=>$data['vacancy'],
            'count'=>$count,
            'categ'=>$categ,
            'cityr'=>$city,
            'posname'=>$positt,
        ]);
    }














    public function actionSearch_practic()      /* Страница поиска для практики */
    {
        $this->layout = 'site';
        $query =Vacancy::find()->where(['WorkOrPractice' => 1]);
        $data = Vacancy::getSearch($query);     
        $atr=Attributes::find()->all();
        $org=Organization::find()->all();
        $vac=Vacancy::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
            return $this->render('search_practic',[
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

    public function actionSelected_r($id){ /* Добавление в избранное у работодателя */
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        if($user->id!=null){
            $scanned=new Scanned();
            $scanned->user_id=$user_id;
            $scanned->resume_id=$id;
            $scanned->ViewOrSelect=1;
            $sc=Scanned::find()->where(['user_id' => $user_id,'resume_id' => $id,'ViewOrSelect' => 1])->all();
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








    public function actionResponse($id){ /* Отклик компании */
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        if($user_id!=null){
            $response=new Response();
            $response->user_id=$user_id;
            $response->resume_id=$id;
            $rs=Response::find()->where(['user_id' =>$user_id,'resume_id' => $id])->all();
            if($rs==null){
                $response->create();
            }
        }
        $resume=Resume::find()->where(['id' => $id])->one();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information_work',[
            'resum'=>$resume,
            'id'=>$id,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }
    public function actionResponsest($id){  /* Отклик студента */
        $user=Yii::$app->user->identity;
        $user_id=$user->id;
        if($user_id!=null){
            $response=new Response();
            $response->user_id=$user_id;
            $response->vacancy_id=$id;
            $rs=Response::find()->where(['user_id' =>$user_id,'vacancy_id' => $id])->all();
            if($rs==null){
                $response->create();
            }
        }
        $vac=Vacancy::find()->where(['id' => $id])->one();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('complete_information',[
            'id'=>$id,
            'vac'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    

    




    public function actionIndexartic() /* Весь функционал статей */
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
            'categories'=>$categories,
            
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
    public function actionTagview($id)
	{
        $this->layout = 'article';
		$tagarticles=ArticleTag::find()->where(['tag_id' => $id])->all();
		$data = Article::getAll(5);
        $data1=Article::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
		return $this->render('tag',[
		'art'=>$tagarticles,
        'article'=>$data1,
        'popular'=>$popular,
        'recent'=>$recent,
        'categories'=>$categories,	
        'id'=>$id
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
            'categories'=>$categories,
            'id'=>$id,
        ]);
    }








    //отображение всех вакансий одной компании(пользователя)
    public function actionOrg_vacancy($id){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $org = Organization::find()->where(['id'=>$id])->one();
        $query=Vacancy::find()->where(['organization_id'=>$org->id]);
        $data = Vacancy::getSearch($query);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        //var_dump($vac);
        return $this->render('org_vacancy',[
            'org'=>$org,
            'pagination'=>$data['pagination'],
            'vacancy'=>$data['vacancy'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
        ]);
    }



}
