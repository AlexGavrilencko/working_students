<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
    <div class="row">
        <div class="col-sm-3 text-center"> 
             <!-- расширенный поиск -->
             <h3>Расширенный поиск</h3>
        </div>

        <div class="col-sm-6 text-center"> 
            <h3>Результаты поиска</h3>
        </div>
    </div>
</div>

<!-- Для резюме -->
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
                                <p>ФИО</p> <!-- подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">
                            <p>В избранное</p> <!-- кнопка для сохранения вакансии в избранное-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>Город</p> <!-- подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Дата рождения</p> <!-- подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Желаемая должность</p> <!-- подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Навыки</p> <!-- подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                                <p>Подробнее</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p>Дата</p> <!-- подгрузка из базы -->
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