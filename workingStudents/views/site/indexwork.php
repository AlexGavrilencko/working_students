<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;


$this->title = 'Главная';

?>
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
    <div class="row">
        <div class="col-sm-3 text-center"> 
        </div>

        <div class="col-sm-6 text-center"> 
            <h3>Резюме соискателей</h3>
        </div>
    </div>
</div>

<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
<div class="row">
        <div class="col-sm-3"> 
             <!-- расширенный поиск -->
        </div>

 <!-- здесь начинается цикл для отображения -->
    <div class="col-sm-6">  
        <div class="border_search">    
            <!-- результаты поиска -->
            <div class="row">
                <div class="col-sm-3">
                    <!-- для изображения -->
                    <img src="/public/img/nofoto.png" alt="Avatar" class="searchavatar">
                </div>
                <div class="col-sm-9 ">
                    <!-- для описания -->
                        <div class="row">
                            <div class="col-12 col-md-8">
                            <!-- ФИО -->
                                <p><?= $resum->name ?> <?= $resum->surname ?></p> <!-- имя и фамилия подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">
                            <p>В избранное</p> <!-- кнопка для сохранения вакансии в избранное-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>    <!-- Город $resum->city_id подгрузка из базы -->
                                    <?php
                                        $city = $resum->city_id;
                                            if ($city == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $city;
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $resum->сareerObjective_id ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $resum->skills ?></p> <!-- навыки skills подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                                <p>Подробнее</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата подгрузка из базы -->
                            </div>
                        </div>
                </div>
            </div>   
        </div>
    </div>
<!-- здесь заканчивается цикл для отображения -->
</div> 
</div> 
<br>
        



