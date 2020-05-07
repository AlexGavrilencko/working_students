<?php

//СТРАНИЦА Профиля
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Персональные данные';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin();  
      $user = Yii::$app->user->identity;
      //var_dump($user);die();
 ?>

 
<!-- Для свсех стандартно так как в таблице user храняться общие данные -->
        <div class="row d-flex text-dark flex-row justify-content-center m-2 p-1">
            <div class=" bd-highlight col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="border_search1 padding_search">
                    <div class="text-center">
                         <h2>Профиль</h2>
                         <p>Регистрационные данные:</p>
                    </div>
                        <div class="form">
                                <?= $form->field($model, 'login')->textInput()->label('Логин', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Тут вы можете изменить свой логин"]) ?>

                                <?= $form->field($model, 'e_mail')->textInput()->label('e_mail', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Тут вы можете изменить свой e_mail"]) ?>

                                <div class="group">
                                    <?= $form->field($model, 'password')->passwordInput(['class'=>'password'])->label('Пароль', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Тут вы можете изменить свой пароль"]) ?>
                                        <label>
                                            <input type="checkbox" class="show-password"> Показать пароль
                                        </label>
                                </div>

                                <?= $form->field($model, 'phone')->textInput()->label('Номер телефона', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Тут вы можете ввести или изменить номер телефона"]) ?>

                                <div class="row justify-content-center">
                                     <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen1 m-3', 'name' => 'Save submit']) ?>
                                </div>
                        </div>
                </div>
            </div>
        </div>
<?php 
ActiveForm::end(); 
?>