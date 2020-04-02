<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid d-flex flex-row bd-highlight flex-column">
    <div class="row "> <!-- Для поиска -->
        <div class="border_search_resume">
            <form class="search_resume">
                <div class="row">
                    <div class="col"> <!-- Выбор города -->
                        <?php
                            $city = Attributes::find()->where(['type'=>'city'])->all();  // получаем все города из таблицы атрибутов
                                $items = ArrayHelper::map($city,'id','name'); // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                    $params = [
                                        'prompt' => 'Город',
                                        'class' => 'dropDownList',
                                    ];
                                    echo Html::dropDownList('citty', 'null', $items, $params);
                        ?>
                        
                    </div>

                    <div class="col"> <!-- Выбор категории -->
                        <?php
                            // получаем все города из таблицы атрибутов
                            $category = Attributes::find()->where(['type'=>'category'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($category,'id','name');
                            $params = [
                                'prompt' => 'Категории',
                                'class' => 'dropDownList',
                            ];
                            echo Html::dropDownList('category_id', 'null', $items, $params);
                            
                        ?>
                    </div>

                   <!-- <div class="col-sm-2">  Для выбора стажа 

                    </div>-->

                    <div class="col"> <!-- Ввод зарплаты -->
                        <input class="form-control btn-none " type="search" placeholder="Зарплата от">
                    </div>

                    <div class="col"> <!-- Ввод должности или профессии -->
                        <input class="form-control btn-none " type="search" placeholder="Профессия">
                    </div>

                    <div class="col-sm-2"> <!-- Кнопка для поиска -->
                        <button type="submit" class="btn btn-secondary mb-1">Найти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row"> <!-- Для отображения информации -->

            <div class="col-sm-3"> 
                
            </div>

            <div class="col-sm-6">  
                <br>  

                <?php
                    foreach ($resume as $resum): 
                        if ($resum->ShowOrHide===0){
                ?>   
<!-- _______________________________________________________________________________________________ -->
        <div class="border_search3"> <!-- Фон для отображения -->
                
                <div class="row"> 

                        <div class="col-sm-4"> <!-- Отображение фотографии -->
                            <?php
                                if($resum->image): ?>
                                <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-sm-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                    <div class="col-sm-7">  <!-- Отображение названии вакансии -->
                                        <p><?= $vacan->name ?></p>
                                    </div>                  <!-- /Отображение названии вакансии -->

                                    <div class="col-sm-5"> <!-- Отображение зарплаты -->
                                        <p>Зарплата: 
                                            <?php
                                                $salary = $vacan->salary;
                                                    if ($salary == NULL){
                                                        echo 'не указано';
                                                    }
                                                    else echo $salary;
                                            ?>
                                        </p>
                                    </div>                  <!-- /Отображение зарплаты -->

                            </div>

                            <div class="row ml-1"> <!-- Отображение ФИО и города -->
                                <div class="col-sm-6">
                                    <p> <?= $resum->surname ?> <?= $resum->name ?> </p>
                                </div>    
                                
                                <div class="col-sm-5">
                                    <p> 
                                        <?php
                                            $c = $vacan->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            if ($city == NULL) 
                                            { 
                                                echo 'Город не указан'; 
                                            }
                                            else echo $city->name;
                                            ?>
                                    </p>
                                </div>  
                            </div>                 <!-- /Отображение ФИО и города-->

                            <div class="row ml-1"> 
                                    
                            </div>                 
                        </div>                 <!-- /Отображение информации правее фотографии -->
                </div>

                        <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                            <p>Последнее место работы:
                                
                            </p>
                        </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    
                    <div class="row ml-1"> <!-- кнопок действия и даты -->
        
                            <div class="col-sm-8">
                                <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                            </div>

                            

                            <div class="col">
                                <p>Дата<?= $vacan->dateAdd ?></p>       
                            </div>
                    </div>
            </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
                <?php  }; ?>
            <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
        </div>
    </div>
    
</div>