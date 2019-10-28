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
                // Yii::$app->user->login($user); // <-- вот так логиним пользователя 
                // $identity = Yii::$app->user->identity;
                // var_dump($user);
                // $id = Yii::$app->user->identity;
                // // echo '<br>' . $id;
                // var_dump($id);

                // exit();
                // return $this->redirect(['site/']);
               // $user = Yii::$app->user->identity;
                //var_dump($user->rang);
                //if($user->rang=10) {
                //    return $this->redirect(['privateoffice/p-o-student']); //студент переходит на модель своего ЛК
               // }
               // if($user->rang=20) {
              //      return $this->redirect(['privateoffice/p-o-work']); //компания переходит на модель своего ЛК
              //  }
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionSignup()
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
                    return $this->redirect(['privateoffice/p-o-work']); //компания переходит на модель своего ЛК
                }
            }
        }

        return $this->render('signup', ['model'=>$model]);
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
}