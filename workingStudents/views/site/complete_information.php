<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<!-- вакансии -->
    <div class="container-fluid padding_search d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row justify-content-md-center">

            <div class="col-sm-8"> 
                <div class="border_search">    
                     <!-- результаты поиска -->
                    <div class="row"> 
                        <div class="col-sm-4">
                        <!-- для изображения -->
                            <img src="/public/img/nofoto.png" alt="Avatar" class="compsearchavatar">
                        </div> 

                        <div class="col-sm-8">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p><?= $vacan->position_id ?></p> <!-- должность вакансии подгрузка из базы -->
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
                        </div> 
                    </div>


                    <div class="row"> 
                        <div class="col-sm-4">
                    
                        </div> 

                        <div class="col-sm-8">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col">
                                    <p>Опыт: <?= $vacan->experience_id ?></p> <!-- опыт подгрузка из базы -->
                                    <p>График: <?= $vacan->employment_id ?></p> <!-- график работы подгрузка из базы -->
                                    <p>Обязанности: <?= $vacan->duties ?></p> <!-- обязанности подгрузка из базы -->
                                    <p>Требование: <?= $vacan->requirement ?></p> <!-- требование  подгрузка из базы -->
                                    <p>Условия: <?= $vacan->conditions ?></p> <!-- условия подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-12 col-md-8">
                                <p>В избранное</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
                       
              