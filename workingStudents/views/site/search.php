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

<!-- Для вакансии -->
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
<div class="row">
        <div class="col-sm-3"> 
             <!-- расширенный поиск -->
        </div>
<!-- здесь начинается цикл для отображения -->

    <div class="col-sm-6"> 
    <?php
        //$org таблица организация
        //$atr таблица со всеми справочниками
        //$catvac все вакансии выбранной категории
        foreach ($catvac as $vacan)
        : 

	    //echo $tagg;
	    //$post=$vacan->article_id;
	    //foreach ($article as $articles)
		//: 
		//if ($post===$articles->id){ ?>
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
                                <p><?= $vacan->name ?></p> <!-- название вакансии подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">

                                <p>    <!-- цена $vacan->salary подгрузка из базы -->
                                    <?php
                                        $salary = $vacan->salary;
                                            if ($salary == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $salary;
                                    ?>
                                </p>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
                            <!-- $vacan->organization_id-->

                                <p>    <!-- Название организации подгрузка из базы -->
                                    <?php
                                        $organization = $vacan->organization_id;
                                            if ($organization == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $organization;
                                    ?>
                                </p>

                            </div>

                            <div class="col-6 col-sm-4">
                                <p>В избранное</p> <!-- кнопка для сохранения вакансии в избранное-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                
                                <p>    <!-- Город $vacan->city_id подгрузка из базы -->
                                    <?php
                                        $city = $vacan->city_id;
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
                                <!-- описание $vacan->duties подгрузка из базы -->
                                <p>
                                    <?php
                                        $duties = $vacan->duties;
                                            if ($duties == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $duties;
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                                <p>Подробнее</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->
                            </div>
                        </div>
                </div>
            </div>   
        </div>
        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
    </div>
</div> 
</div>
<br> 
