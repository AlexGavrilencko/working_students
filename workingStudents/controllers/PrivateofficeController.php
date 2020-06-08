<?php


namespace app\controllers;

use app\models\ImageUpload;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Response;
use yii\filters\VerbFilter;
use app\models\Vacancy;
use app\models\Resume;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Project;
use app\models\Scanned;
use app\models\Attributes;
use app\models\Organization;
use app\models\Experience;
use app\models\ExperienceSearch;
use yii\web\NotFoundHttpException;
use yii\helpers\FileHelper;
use app\models\ArtCategory;
use app\models\Article;
use app\models\ArticleTag;


class PrivateofficeController extends Controller
{

    /* Профиль пользователя */
    public function actionPersonal_account()   
    {
        $this->layout = 'site';
        $user = Yii::$app->user->identity;
        if(Yii::$app->request->isPost)
        {
            $model = User::findOne(Yii::$app->user->id);
            $model->load(Yii::$app->request->post()); 
            $model->save(); 
            return $this->render('personal_account', ['model'=>$model]);
        }
        return $this->render('personal_account', ['model'=>$user]);
    }








    public function findModel($id)
    {
        $user = Yii::$app->user->identity;
        if($user->rang=='10')
        {
            if (($model = Resume::findOne($id)) !== null) {
                return $model;
            }
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        if($user->rang=='20')
        {
            if (($model = Organization::findOne($id)) !== null) {
                return $model;
            }
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }












    /* Загрузка фотографий длч резюме и логотип организаций */
    public function actionSetImage()
    {
        $this->layout = 'avtoriz';
        $model = new ImageUpload();
        $user = Yii::$app->user->identity;
        $id=$user->id;
        if($user->rang=='10')
        {
            $res=Resume::find()->where(['user_id'=>$id])->one();
            $resume = $this->findModel($res->id);
            if (Yii::$app->request->isPost){
                $file = UploadedFile::getInstance($model, 'image');
                if($resume->saveImage($model->uploadFile($file, $resume->image)))
                {
                    return $this->redirect(['privateoffice/resume']);
                }
            }
        }
        if($user->rang=='20')
        {
            $org=Organization::find()->where(['user_id'=>$id])->one();
            $organiz = $this->findModel($org->id);
            if (Yii::$app->request->isPost)
            {
            $file = UploadedFile::getInstance($model, 'image');
                if($organiz->saveImage($model->uploadFile($file, $organiz->image)))
                {
                    return $this->redirect(['privateoffice/organiz']); //надо создать
                }
            }
        }
        return $this->render('img', ['model'=>$model]);
    }








    public function actionResume(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $resume = Resume::findOne(['user_id'=>Yii::$app->user->id]);
        if($resume===null){
            $res=new Resume();
            $res->user_id=$user->id;
            $proj= Project::find()->where(['user_id'=>$user->id])->all();
            $exp1=new Experience();$exp3=new Experience();
            $exp2=new Experience();$exp4=new Experience();
            if ($res->load(Yii::$app->request->post()) && $res->create()) { //
                $exp1->StudyOrWork=0;$exp3->StudyOrWork=1;
                $exp1->resume_id=$res->id;$exp3->resume_id=$res->id;
                if(($exp1->nameOrganiz!=null) || ($exp1->years!=null) || ($exp1->speciality_id!=null)){
                    if ($exp1->load(Yii::$app->request->post()) && $exp1->create()) {
                        $exp2->resume_id=$res->id;$exp2->StudyOrWork=0;
                        if ($exp2->load(Yii::$app->request->post())) {
                            $exp2->create();
                        }
                    }
                }
                if ($exp3->load(Yii::$app->request->post()) && $exp3->create()) {
                    $exp4->resume_id=$res->id;$exp4->StudyOrWork=1;
                    if ($exp4->load(Yii::$app->request->post())) {
                        $exp4->create();
                    }
                }
                return $this->render('resume', ['model'=>$res,'exp1'=>$exp1,'exp2'=>$exp2,'exp3'=>$exp3,'exp4'=>$exp4,'project'=>$proj]);
            }
            
            
        }
        else{
            $experience = Experience::find()->where(['resume_id'=>$resume->id])->all();
            $proj= Project::find()->where(['user_id'=>$user->id])->all();
            $exp1=new Experience();$exp3=new Experience();
            $exp2=new Experience();$exp4=new Experience();
            if ($resume->load(Yii::$app->request->post()) && $resume->create()) { //
                //var_dump($resume);
                $exp1->resume_id=$resume->id;$exp3->resume_id=$resume->id;
                $exp1->StudyOrWork=0;$exp3->StudyOrWork=1;
                if(($exp1->nameOrganiz!=null) || ($exp1->years!=null) || ($exp1->speciality_id!=null)){
                    if ($exp1->load(Yii::$app->request->post()) && $exp1->create()) {
                        $exp2->resume_id=$res->id;$exp2->StudyOrWork=0;
                        if ($exp2->load(Yii::$app->request->post())) {
                            $exp2->create();
                        }
                    }
                }
                if(($exp1->nameOrganiz!=null) || ($exp1->years!=null) || ($exp1->position_id!=null)){
                    if ($exp3->load(Yii::$app->request->post())) {
                        $exp3->create();
                        $exp4->resume_id=$resume->id;$exp4->StudyOrWork=1;
                        if ($exp4->load(Yii::$app->request->post())) {
                            $exp4->create();
                        }
                    }
                }
                $experience = Experience::find()->where(['resume_id'=>$resume->id])->all();
            }
            return $this->render('resume', ['model'=>$resume,'model1'=>$experience,'exp1'=>$exp1,'exp2'=>$exp2,'exp3'=>$exp3,'exp4'=>$exp4,'project'=>$proj]); 
        }
        return $this->render('resume', ['model'=>$resume,'model1'=>$experience,'exp1'=>$exp1,'exp2'=>$exp2,'exp3'=>$exp3,'exp4'=>$exp4,'project'=>$proj]);
    }
    //функция удаления опыта
    public function actionExp1($id)
    {
        $user = Yii::$app->user->identity;
        
        return $this->redirect(['privateoffice/resume']);
    }
    //поиск модели таблицы опыт
    protected function findModelExp($id)
    {
        if (($model = Experience::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //поиск модели таблицы опыт
    protected function findModelProj($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //создание опыта работы для резюме
    public function actionExperience_cr($res_id,$or){
        $this->layout = 'site';
        $exp=new Experience();
        $user = Yii::$app->user->identity; 
        $exp->resume_id=$res_id;
        $exp->StudyOrWork=$or;
        if(Yii::$app->request->isPost)
        {
            $exp->load(Yii::$app->request->post());
            $exp->create();
            return $this->redirect(['privateoffice/resume']);
        }
        return $this->render('experience', ['model'=>$exp,'or'=>$or]);
    }

    //редактирование опыта работы для резюме
    public function actionExperience_up($id){
        $this->layout = 'site';
        $exp=Experience::findOne(['id'=>$id]);
        $user = Yii::$app->user->identity; 
        if(Yii::$app->request->isPost)
        {
            $exp->load(Yii::$app->request->post());
            $exp->create();
            return $this->redirect(['privateoffice/resume']);
        }
        return $this->render('experience', ['model'=>$exp]);
    }
    
    public function actionSetProject()
    {
        $this->layout = 'avtoriz';
        $model = new ImageUpload();
        $user = Yii::$app->user->identity;
        $id=$user->id;
        $project = new Project();
        $project->user_id=$id;
            if (Yii::$app->request->isPost){
                $file = UploadedFile::getInstance($model, 'image');
                if($project->saveImage($model->uploadFile($file, $project->image)))
                {
                    return $this->redirect(['privateoffice/resume']);
                }
            }
        return $this->render('img', ['model'=>$model]);
    }
    //функция удаления достижений
    public function actionProject_del($id)
    { 
        $this->findModelProj($id)->deleteImage();
        $this->findModelProj($id)->delete();       
        return $this->redirect(['privateoffice/resume']);
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
    //создание вакансии
    public function actionPractic(){
        $this->layout = 'site';
        $vac=new Vacancy();
        $user = Yii::$app->user->identity; 
        $vac->user_id = $user->id;
        $vac->ShowOrHide=0;
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        $vac->organization_id = $org->id;
        if(Yii::$app->request->isPost)
        {
            // $category_id = Yii::$app->request->get('category_id');
            // $categprof_id = Yii::$app->request->get('categprof_id');
            $vac->load(Yii::$app->request->post());
            $vac->WorkOrPractice=1;
            // $vac->category_id=$category_id;
            // $vac->categprof_id=$categprof_id;
            $vac->create();
            return $this->redirect(['privateoffice/my_practic']);
        }
        return $this->render('practic', ['model'=>$vac]);
    }

    //функция для просмотра, редактирования данных об организации
    public function actionOrganiz(){
        $this->layout = 'site';
        $org=new Organization();
        $user = Yii::$app->user->identity;
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        if(Yii::$app->request->isPost)
        {
            $org->load(Yii::$app->request->post());
            $org->create(); 
        }
        return $this->render('organiz', ['model'=>$org]);
    }

    //создание практики
    public function actionVacancy(){
        $this->layout = 'site';
        $vac=new Vacancy();
        $user = Yii::$app->user->identity; 
        $vac->user_id = $user->id;
        $vac->ShowOrHide=0;
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        $vac->organization_id = $org->id;
        if(Yii::$app->request->isPost)
        {
            
            $vac->load(Yii::$app->request->post());
            // $category_id = Yii::$app->request->get('category_id');
            // $categprof_id = Yii::$app->request->get('categprof_id');
            // $position_id = Yii::$app->request->get('position_id');
            $vac->WorkOrPractice=0;
            // $vac->category_id=$category_id;
            // $vac->categprof_id=$categprof_id;
            // $vac->position_id=$position_id;
            //var_dump($vac);
            $vac->create();
            return $this->redirect(['privateoffice/my_vacancy']);
        }
        return $this->render('vacancy', ['model'=>$vac]);
    }

    //отображение всех вакансий одной компании(пользователя)
    public function actionMy_vacancy(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        $vac = Vacancy::find()->where(['user_id'=>$user->id,'WorkOrPractice'=>0]);
        $data = Vacancy::getSearch($vac);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('my_vacancy',[
            'vac'=>$vac,
            'org'=>$org,
            'pagination'=>$data['pagination'],
            'vacancy'=>$data['vacancy'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
        ]);
    }

    //отображение всех вакансий одной компании(пользователя)
    public function actionMy_practic(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        $vac = Vacancy::find()->where(['user_id'=>$user->id,'WorkOrPractice'=>1]);
        $data = Vacancy::getSearch($vac);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('my_practic',[
            'vac'=>$vac,
            'org'=>$org,
            'pagination'=>$data['pagination'],
            'vacancy'=>$data['vacancy'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
        ]);
    }
    //функция обновления вакансии
    public function actionVacancy_up($id){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $vac = Vacancy::findOne(['id'=>$id]);
        if(Yii::$app->request->isPost)
        {
            $vac->load(Yii::$app->request->post());
            $vac->create();
            return $this->redirect(['privateoffice/my_vacancy']);
        }
        return $this->render('vacancy', ['model'=>$vac]);
    }
    //функция обновления вакансии
    public function actionPractic_up($id){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $vac = Vacancy::findOne(['id'=>$id]);
        if(Yii::$app->request->isPost)
        {
            $vac->load(Yii::$app->request->post());
            $vac->create();
            return $this->redirect(['privateoffice/my_practic']);
        }
        return $this->render('practic', ['model'=>$vac]);
    }
    //функция удаления вакансии
    public function actionVacancy_del($id)
    {
        $this->findModelVac($id)->delete();
        return $this->redirect(['privateoffice/my_vacancy']);
    }
    //функция удаления вакансии
    public function actionPractic_del($id)
    {
        $this->findModelVac($id)->delete();
        return $this->redirect(['privateoffice/my_practic']);
    }
    //поиск модели вакансии
    protected function findModelVac($id)
    {
        if (($model = Vacancy::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
    
    














    //общие функции
    public function actionMy_select(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity;
        //var_dump($user);
        $vs=1; 
        $select= Scanned::find()->where(['user_id'=>$user->id,'ViewOrSelect'=>$vs])->all();
        $resume=Resume::find()->all();
        $vac=Vacancy::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('my_select',[
            'select'=>$select,
            'vs'=>$vs,
            'resume'=>$resume,
            'vac'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            ]);
    }

    public function actionMy_scan(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity;
        $vs=0; 
        $select= Scanned::find()->where(['user_id'=>$user->id,'ViewOrSelect'=>$vs])->all();
        $resume=Resume::find()->all();
        $vac=Vacancy::find()->all();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = ArtCategory::getAll();
        return $this->render('my_scanned',[
            'select'=>$select,
            'vs'=>$vs,
            'resume'=>$resume,
            'vac'=>$vac,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            ]);
    }

    public function actionResponse(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity;
        if($user->rang===10){
            $r=Resume::find()->where(['user_id'=>$user->id])->one();
            $response= Response::find()->where(['resume_id'=>$r->id])->all();
        }
        if($user->rang===20){
            $v=Vacancy::find()->where(['user_id'=>$user->id])->all();
            $response= Response::find()->all();
        }
        return $this->render('response',['response'=>$response]);
    }

    public function actionRespdelete($id){
        $this->layout = 'site';
        $sc=Scanned::find()->where(['id'=>$id])->one();
        $sc->delete();
        $user = Yii::$app->user->identity;
        if($user->rang===10){
            $r=Resume::find()->where(['user_id'=>$user->id])->one();
            $response= Response::find()->where(['resume_id'=>$r->id])->all();
        }
        if($user->rang===20){
            $v=Vacancy::find()->where(['user_id'=>$user->id])->all();
            $response= Response::find()->all();
        }
        return $this->redirect('response',['response'=>$response]);
    }




}