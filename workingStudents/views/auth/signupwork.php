<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
//СТРАНИЦА Регистрации Работодателя
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Attributes;
use \yii\db\ActiveRecord;

$this->title = 'Регистрация организации';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">

        <?php $form = ActiveForm::begin(); ?>
            <h3 class="text-center">Регистрация пользователя</h3>
                <?php
               // $form->field($model, 'rang')->$rang;
                ?>
                <?= $form->field($model1, 'login')->textInput(['class'=>'form-control','placeholder'=>"Введите логин"])->label('Логин <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"Логин должен содержать минимум 8 символов, букв или цифр: gft564*dfhy"]); ?>

                <?= $form->field($model1, 'e_mail')->textInput(['class'=>'form-control', 'placeholder'=>"Введите email"])->label('e_mail <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"Электронная почта: primer@gmail.com"]); ?>

                <?= $form->field($model1, 'password')->passwordInput(['placeholder'=>"Введите пароль"])->label('Пароль <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"Пароль должен содержать минимум 8 символов, букв или цифр"]); ?>

                <?= $form->field($model1, 'password_repeat')->passwordInput(['placeholder'=>"Повторите пароль"]) ?>

                <h3 class="text-center">Данные об организации</h3>
                <?php   

                      //$user = Yii::$app->user->identity;
                     // var_dump($user);die();
                      //$model2->user_id=$user->id;
                      //$form->field($model2,'user_id');
                      //$model2 ->user_id

                      $user = Yii::$app->user->identity;
                      $model2->user_id=$user->id;
                      $form->field($model2,'user_id');
                      
                      
                ?>

                <?= $form->field($model2, 'name')->textInput(['class'=>'form-control','placeholder'=>"Наименование организации"]) ?>
                <?php
                // получаем все города из таблицы атрибутов
                $city = Attributes::find()->where(['type'=>'city'])->all();
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                $items = ArrayHelper::map($city,'id','name');
                $params = [
                    'prompt' => 'Укажите город'
                ];
                echo $form->field($model2, 'city_id')->dropDownList($items,$params);
                 ?>

                <?= $form->field($model2, 'adres')->textInput(['class'=>'form-control','placeholder'=>"Адрес организации"]) ?>

                <?= $form->field($model2, 'inn')->textInput(['class'=>'form-control','placeholder'=>"ИНН организации"])->label('ИНН <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"ИНН регистрируемой организации"]); ?>

                <?= $form->field($model2, 'ogrn')->textInput(['class'=>'form-control', 'placeholder'=>"ОГРН организации"])->label('ОГРН <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                        "data-placement"=>"top", "title"=>"ОГРН регистрируемой организации"]); ?>

                <?php echo $form->field($model1, 'personaldate')->checkbox(['class'=>'show-password']);
                    //echo '<a href="/site/personal_data_protection">Согласие на обработку персональных данных</a>'; 
                ?> 

                <div class="row justify-content-center">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                </div>

            
                <?php ActiveForm::end(); ?>   
           
        </div>
    </div>
</div>
<br>