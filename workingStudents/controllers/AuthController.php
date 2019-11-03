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
   public $users;

    public function actionLogin(){

        $this->layout = 'avtoriz';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::find()->where(['login' => $model->login, 'password' => $model->password])->one();
            
            if($user) {
               // var_dump($user->rang);
                Yii::$app->user->login($user); // <-- вот так логиним пользователя 
                
                if($user->rang=='10') {
                    return $this->redirect(['privateoffice/personal_account']); //студент переходит на модель своего ЛК
                }
                if($user->rang=='20') {
                    return $this->redirect(['auth/signupwork']); //компания переходит на регистрацию организацию
                } 
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|Response
     */
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
                if($model->rang=='20') {
                    return $this->redirect(['auth/login']); //компания переходит на регистрацию организацию
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

    public function actionSignupwork()
    {
        $this->layout = 'avtoriz';
        $model = new OrganizationForm();
        $user = Yii::$app->user->identity;
        $model->user_id=$user->id;
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            
            if($model->organization())
            {
                var_dump($model);
                return $this->redirect(['privateoffice/personal_account']); //компания переходит на регистрацию организацию
            }
        }

        return $this->render('signupwork', ['model'=>$model]);
    }
}