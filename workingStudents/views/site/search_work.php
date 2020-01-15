<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Поиск';
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


    <div class="col-sm-6">  
     <!-- здесь начинается цикл для отображения -->
     <?php
        //$org таблица организация
        //$atr таблица со всеми справочниками
        //$catvac все вакансии выбранной категории
        foreach ($resume as $resum)
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
                    <?php
                     if($resum->image): ?>
                                <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                    <?php endif; ?>
                   
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
                                        $c = $resum->city_id;
                                        $city = Attributes::find()->where(['id'=>$c])->one();
                                        $obj=$resum->CareerObjective_id;
                                        $object = Attributes::find()->where(['id'=>$obj])->one();
                                            if ($city == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $city->name;
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
                                <p><?= $object->name ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $resum->skills ?></p> <!-- навыки skills подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                            <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $resum->dateAdd ?></p> <!-- дата подгрузка из базы -->
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