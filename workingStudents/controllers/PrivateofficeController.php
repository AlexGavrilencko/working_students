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



class PrivateofficeController extends Controller
{


    public function actionPersonal_account()   /* Это для личного кабинета пользователя */
    {
    $this->layout = 'site';
    $user = Yii::$app->user->identity; //определение текущего пользователя
    //var_dump($user);
    $model = User::find()->where(['id'=>$user])->one();//поиск данных этого пользователя из таблицы user
     if(Yii::$app->request->isPost)
     {
         $model->load(Yii::$app->request->post()); //загрузка данных
         $model->create(); //вызов функции на проверку существования
     }
     return $this->render('personal_account', ['model'=>$model]);
    }

    public function findModel($id)
    {
        if (($model = user::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetImage()
    {
        $this->layout = 'avtoriz';
        $model = new ImageUpload();
        $user = Yii::$app->user->identity;
        $id=$user->id;
        if (Yii::$app->request->isPost)
        {
            $user = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            $rg=$user->rang;
            if($user->saveImage($model->uploadFile($file, $user->image)))
            {
                //if($rg==10) {
               //     return $this->redirect(['privateoffice/p-o-student']); //студент переходит на модель своего ЛК
               // }
               // if($rg==20) {
             //       return $this->redirect(['privateoffice/p-o-work']); //компания переходит на модель своего ЛК
               // }
            }
        }

        return $this->render('img', ['model'=>$model]);
    }
    public function actionResume(){

        $this->layout = 'site';
        $res=new Resume();
        //$user = Yii::$app->user->identity; //наш текущий пользователь
        if(Yii::$app->request->isPost)
        {
            $res->load(Yii::$app->request->post());
            $res->create(); //адо проверить на всякий
        }

        return $this->render('resume', ['model'=>$res]);
    }
    public function actionVacancy(){
        $this->layout = 'site';
        $vac=new Vacancy();
        //$user = Yii::$app->user->identity; //наш текущий пользователь
        if(Yii::$app->request->isPost)
        {
            $vac->load(Yii::$app->request->post());
            $vac->create(); //адо проверить на всякий
        }
        return $this->render('vacancy', ['model'=>$vac]);

    }
    //
    //                   // $atr=Attributes::find()->where(['type'=>'experien']);
    //                       // foreach($atr as $name) {
    //                           // echo "<option value="$name->id">" . $name->name . "<option/>"
    //                        }
    //
}