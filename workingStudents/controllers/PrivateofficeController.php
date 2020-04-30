<?php


namespace app\controllers;

use app\models\ImageUpload;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
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
            if (Yii::$app->request->isPost)
            {
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
        $model = Resume::findOne(['user_id'=>Yii::$app->user->id]);
        if($model===null){
            $resum=new Resume();
            $resum->user_id=$user->id;
            if(Yii::$app->request->isPost)
            {
                $resum->load(Yii::$app->request->post());
                $resum->create(); 
            }
            return $this->render('resume', ['model'=>$resum,'model1'=>$model1]);
        }
        else{
            $model1 = Experience::find()->where(['resume_id'=>$model->id])->all();
            $proj= Project::find()->where(['user_id'=>$user->id])->all();
        
            if(Yii::$app->request->isPost)
            {
                $model->load(Yii::$app->request->post());
                $model->create(); 
            }
            return $this->render('resume', ['model'=>$model,'model1'=>$model1,'project'=>$proj]);
        }
        return $this->render('resume', ['model'=>$model,'model1'=>$model1,'project'=>$proj]);
    }

    //создание вакансии
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
            $vac->create();
            return $this->redirect(['privateoffice/my_vacancy']);
        }
        return $this->render('vacancy', ['model'=>$vac]);
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

    //отображение всех вакансий одной компании(пользователя)
    public function actionMy_vacancy(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        $vac = Vacancy::find()->where(['user_id'=>$user->id])->all();
        //var_dump($vac);
        return $this->render('my_vacancy',[
            'vac'=>$vac,
            'org'=>$org,
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

    //функция удаления вакансии
    public function actionVacancy_del($id)
    {
        $this->findModelVac($id)->delete();
        return $this->redirect(['privateoffice/my_vacancy']);
    }

    //функция удаления опыта
    public function actionExperience_del($id)
    {
        $this->findModelExp($id)->delete();
        return $this->redirect(['privateoffice/resume']);
    }

    //поиск модели вакансии
    protected function findModelVac($id)
    {
        if (($model = Vacancy::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
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
            if (Yii::$app->request->isPost)
            {
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
        //$imageUploadModel = new Project();
        $this->findModelProj($id)->deleteImage();
        $this->findModelProj($id)->delete();
        
        return $this->redirect(['privateoffice/resume']);
    }

    public function actionMy_select(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; 
        $select= Scanned::find()->where(['user_id'=>$user->id])->all();
        return $this->render('my_scanned',['select'=>$select]);
    }
}