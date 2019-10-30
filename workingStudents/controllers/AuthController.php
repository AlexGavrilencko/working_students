<?php
namespace app\controllers;

use app\models\POStydent;
use app\models\POWork;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\SignupForm;
use app\models\Organizaton;
use app\models\LoginForm;
use app\models\User;


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
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                //var_dump($model->rang);
                if($model->rang=10) {
                    return $this->redirect(['privateoffice/p-o-student']); //студент переходит на модель своего ЛК
                }
                if($model->rang=20) {
                    return $this->redirect(['auth/signupwork']); //компания переходит на регистрацию организацию
                }
            }
        }

        return $this->render('signup', [
            'model'=>$model,
           // 'rang'=>$rang,
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
        $model = new Organization();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['privateoffice/p-o-student']); //компания переходит на регистрацию организацию
            }
        }

        return $this->render('signupwork', ['model'=>$model]);
    }
}