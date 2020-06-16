<?php

//СТРАНИЦА для составления данных Организации

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Организация';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
   <!-- <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
        <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="border_search padding_search">-->
                <br>
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
    <div class="site-registration">
        <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="pole border_search31 padding_search">
                <div class="form">
                    <div class="text-center">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Пожалуйста, заполните все поля:</p>
                    </div>
                        
                            <div class="row justify-content-center">
                                <a href="/privateoffice/set-image" class="btn btn-rounded btnorange">Загрузите логотип</a>
                            </div>
                        <br>
                            <div class="row justify-content-center">
                            
                                <?php   
                                    $user = Yii::$app->user->identity;
                                        if($model->image): ?>
                                            <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $model->image?>" alt="">
                                        <?php endif; 
                                ?>
                          
                            </div>
                        <br>
                        
                        <!--<div class="block">  контейнер -->
                          <!--   <div class="hover"></div> видимый элемент -->
                            <!-- <span class="hidden">В данном поле нужно ввести наименование вашей организации</span> скрытый элемент <img src="/public/img/w.png" class="question" alt="?"> </div>-->
                        
                        <?= $form->field($model, 'name')->textInput() ?>

                          <!--  <span class='support' tabindex="1" data-title='Текст подсказки'>
                                <em><img src="/public/img/w.png" class="question" alt="?"></em>
                            </span> -->

                    <?php
                        // получаем все города из таблицы атрибутов
                        $city = Attributes::find()->where(['type'=>'city'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($city,'id','name');
                                $params = [
                                    'prompt' => $city->name
                                ];
                            echo $form->field($model, 'city_id')->dropDownList($items,$params);
                    ?>

                    

                    <?= $form->field($model, 'adres')->textInput(['placeholder'=>"Введите адрес"]) ?>

                    <?= $form->field($model, 'inn')->textInput(['placeholder'=>"Введите ИНН вашей организации"]) ?>

                    <?= $form->field($model, 'ogrn')->textInput(['placeholder'=>"Введите ОГРН вашей организации"]) ?>

                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btnorange', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<br>