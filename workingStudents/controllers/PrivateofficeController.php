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
use app\models\Attributes;
use app\models\Organization;
use yii\web\NotFoundHttpException;



class PrivateofficeController extends Controller
{


    public function actionPersonal_account()   /* Это для личного кабинета пользователя */
    {
        $this->layout = 'site';
        $user = Yii::$app->user->identity; //определение текущего пользователя
        if(Yii::$app->request->isPost)
        {
            $model = User::findOne(Yii::$app->user->id);//поиск данных этого пользователя из таблицы user
            $model->load(Yii::$app->request->post()); //загрузка данных
            $model->save(); //вызов функции на сохранение
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
        //var_dump($model);die();
        if($model===null){
           // var_dump($model===null);die();
            $resum=new Resume();
            $resum->user_id=$user->id;
            if(Yii::$app->request->isPost)
            {
                $resum->load(Yii::$app->request->post());
                $resum->create(); //адо проверить на всякий
            }
            return $this->render('resume', ['model'=>$resum]);
        }
        else{
            //$model->user_id=$user->id;
            
            if(Yii::$app->request->isPost)
            {
                $model->load(Yii::$app->request->post());
                //var_dump($model->create());die();
                $model->create(); //адо проверить на всякий
            }
            return $this->render('resume', ['model'=>$model]);
        }
        
        return $this->render('resume', ['model'=>$model]);
    }


    public function actionVacancy(){
        $this->layout = 'site';
        $vac=new Vacancy();
        $user = Yii::$app->user->identity; //наш текущий пользователь
       // $vac = Vacancy::find()->where(['user_id'=>$user->id])->one();
        //var_dump($vac);die();
        if(Yii::$app->request->isPost)
        {
            $vac->load(Yii::$app->request->post());
            $vac->create();
        }
        return $this->render('vacancy', ['model'=>$vac]);
    }

    public function actionOrganiz(){
        $this->layout = 'site';
        $org=new Organization();
        $user = Yii::$app->user->identity; //наш текущий пользователь
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        if(Yii::$app->request->isPost)
        {
            $org->load(Yii::$app->request->post());
            $org->create(); //адо проверить на всякий
        }
        return $this->render('organiz', ['model'=>$org]);
    }


    public function actionMy_vacancy(){
        $this->layout = 'site';
        $user = Yii::$app->user->identity; //наш текущий пользователь
        $org = Organization::find()->where(['user_id'=>$user->id])->one();
        if(Yii::$app->request->isPost)
        {
            $org->load(Yii::$app->request->post());
            $org->create(); //адо проверить на всякий
        }
        return $this->render('my_vacancy');
        //$vac=new Vacancy();
        //$user = Yii::$app->user->identity; //наш текущий пользователь
       // $vac = Vacancy::find()->where(['user_id'=>$user->id])->one();
        //var_dump($vac);die();
        //if(Yii::$app->request->isPost)
        //{
        //    $vac->load(Yii::$app->request->post());
        //    $vac->create();
        //}
        //return $this->render('vacancy', ['model'=>$vac]);
    }

}