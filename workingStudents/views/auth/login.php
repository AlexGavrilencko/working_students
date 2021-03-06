<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
//СТРАНИЦА Авторизации
use app\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
<br>
<div class="site-registration">
    <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">

           

                <?php $form = ActiveForm::begin(); ?>
                    <h3 class="text-center" style="font-family: 'Montserrat', sans-serif;">Авторизация</h3>

                    <?= $form->field($model, 'login')->textInput(['autofocus' => true, 'placeholder'=>"Логин", "style"=>"font-family: 'Montserrat', sans-serif;"]) ?> 

                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"Пароль", "style"=>"font-family: 'Montserrat', sans-serif;"]) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-1 col-lg-3 btn-rounded btnorange\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>

                   <div class=" row justify-content-center ">   
                        <?= Html::submitButton('Вход', ['class' => ' btn-rounded btnorange btn btn-lg mt-2', 'name' => 'login-button']) ?>
                    </div>
                    
                <?php ActiveForm::end(); ?>

       

                     <br>
                <h3 class="text-center" style="font-family: 'Montserrat', sans-serif;">Регистрация</h3>
                
                    <div class="container">
                         <div class="row justify-content-md-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                 <a href="<?= Url::toRoute(['/auth/signup', 'rang'=>'10']); ?>" class="btn-rounded btnorange btn btn-block m-1">Соискателя</a>
                            </div>


                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <a href="<?= Url::toRoute(['/auth/signupwork', 'rang'=>'20']); ?>" class="btn-rounded btnorange btn btn-block m-1">Работодателя</a>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<br>