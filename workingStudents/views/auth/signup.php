<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
//СТРАНИЦА Регистрации Соискателя
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="site-registration">
    <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">

                <?php $form = ActiveForm::begin(); ?>
            <h3 class="text-center">Регистрация</h3>
                <?php
               // $form->field($model, 'rang')->$rang;
                ?>

<?= $form->field($model, 'login')->textInput(['class'=>'form-control','placeholder'=>"Введите логин"])->label('Логин <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"Логин должен содержать минимум 8 символов, букв или цифр: gft564*dfhy"]); ?>
                

                <?= $form->field($model, 'e_mail')->textInput(['class'=>'form-control', 'placeholder'=>"Введите email"])->label('e_mail <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"Электронная почта: primer@gmail.com"]); ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"Введите пароль"])->label('Пароль <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"Пароль должен содержать минимум 8 символов, букв или цифр"]); ?>

                <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder'=>"Повторите пароль"]) ?>

                <?php echo $form->field($model, 'personaldate')->checkbox(['class'=>'show-password']);
                  //  echo '<a href="/site/personal_data_protection">Согласие на обработку персональных данных</a>';
                    
                ?>          
                    <div class="row justify-content-center">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-rounded btnorange', 'name' => 'login-button']) ?>
                    </div>
              
                    
                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br>