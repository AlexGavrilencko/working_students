<?php
namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\SignupForm;
use app\models\LoginForm;
use app\models\User;
use app\models\OrganizationForm;
use app\models\Organization;



class AuthController extends Controller
{
   public $login;
   public $e_mail;
   

    public function actionLogin(){

        $this->layout = 'avtoriz';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::find()->where(['login' => $model->login, 'password' => $model->password])->one();
            if($user) {
                Yii::$app->user->login($user); // <-- вот так логиним пользователя 
                return $this->redirect(['privateoffice/personal_account']); //студент переходит на модель своего ЛК
                } 
        }
        
        return $this->render('login',['model' => $model,]);
    }

    public function actionSignup($rang)
    {
        $this->layout = 'avtoriz';
        $model = new SignupForm();
        $model->rang=$rang;
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                if($model->rang=='10') {
                    return $this->redirect(['auth/login']); //студент переходит на модель своего ЛК
                }
               
            }
        }
       // var_dump($model);
        return $this->render('signup', [
            'model'=>$model,
        ]);
    }
    

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTest()
    {
        $user = User::findOne(1);

        Yii::$app->user->logout();

        if(Yii::$app->user->isGuest)
        {
            echo 'Пользователь гость';
        }
        else
        {
            echo 'Пользователь Авторизован';
        }
    }

    public function actionSignupwork($rang)
    {
      
        $this->layout = 'avtoriz';
        $model1= new SignupForm();
        $model2 = new Organization();
        $model1->rang=$rang;
        if(Yii::$app->request->isPost)
        {
           //var_dump(Yii::$app->request->post()); die();
            $model1->load(Yii::$app->request->post());
            $user=$model1->signup(); //адо проверить на всякий
            $model2->load(Yii::$app->request->post());
            $model2->user_id=$user->id;
            $model2->create(); //адо проверить на всякий
            
            return $this->redirect(['auth/login']); //компания переходит на регистрацию организацию
        }
        
        return $this->render('signupwork', ['model1'=>$model1,'model2'=>$model2]);
    }
}