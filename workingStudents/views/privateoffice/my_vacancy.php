<?php


use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Мои вакансии';
?>
          
<br>

          <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
<div class="row">
    
        <div class="col-sm-2"> 
             <!-- расширенный поиск -->
        </div>


    <div class="col-sm-8">  
     <!-- здесь начинается цикл для отображения -->
     <?php
       ?>
        <div class="border_search">    
            <!-- результаты поиска -->
            <div class="row">
                <div class="col-sm-3">
                    <!-- для изображения -->
                     
                     <img class="searchavatar" src="/public/img/nofoto.png" alt="">
                   
                </div>
                <div class="col-sm-9 ">
                    <!-- для описания -->
                        <div class="row">
                            <div class="col-12 col-md-8">
                            <!-- ФИО -->
                                <p>название</p> <!-- имя и фамилия подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="open_eye" src="/public/img/open_eye.png" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="pencil" src="/public/img/pencil.png" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="trashcan" src="/public/img/trashcan.png" alt="">
                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>    <!-- Город $resum->city_id подгрузка из базы -->
                                    город
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>опыт</p> <!-- дата рождения подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>должность</p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                <p>тип занятости</p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>график работы</p> <!-- навыки skills подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                            <a href="#">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p>дата</p> <!-- дата подгрузка из базы -->
                            </div>
                        </div>
                </div>
            </div>   
        </div>
         <!-- здесь заканчивается цикл для отображения -->
    </div>
</div> 
</div> 
<br>