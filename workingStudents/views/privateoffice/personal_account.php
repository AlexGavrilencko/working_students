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

<style>

    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
    .max-width-100{
        max-width: 100%;
    }
a{
        color: #00a4b9dc;
        font-size: 15px;
    }
    a:hover{
        color: #003941dc;
    }

  </style>  
<!-- Для свсех стандартно так как в таблице user храняться общие данные -->
        <div class="row d-flex text-dark flex-row justify-content-center m-2 p-1">
            <div class=" bd-highlight col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <div class="border_search31 padding_search">
                    <div class="text-center">   
                        <h2>Регистрационные данные</h2>
                    </div>
                    
                        <div class="form">
                                <?= $form->field($model, 'login')->textInput()->label('Логин <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Изменение логина"]) ?>

                                <?= $form->field($model, 'e_mail')->textInput()->label('e_mail <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Изменение e_mail"]) ?>

                                <div class="group">
                                    <?= $form->field($model, 'password')->passwordInput(['class'=>'password'])->label('Пароль <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Изменение пароля"]) ?>
                                        <label>
                                            <input type="checkbox" class="show-password"> Показать пароль
                                        </label>
                                </div>

                                <?= $form->field($model, 'phone')->textInput()->label('Номер телефона <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Изменение номера телефона"]) ?>

                                <div class="row justify-content-center">
                                     <?= Html::submitButton('Сохранить', ['class' => 'btn  btn-rounded btnorange m-3', 'name' => 'Save submit']) ?>
                                </div>
                        </div>
                </div>
            </div>
        </div>
<?php 
ActiveForm::end(); 
?>