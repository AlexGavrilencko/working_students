<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
          
<!-- резюме -->

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
                                    <p><?= $resum->name ?> <?= $resum->surname ?> <?= $resum->patronymic ?></p> <!-- ФИО подгрузка из базы -->
                                </div>

                                <div class="col-6 col-sm-4">
                                    <p><?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8">
                                <p><?= $resum->сareerObjective_id ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                </div>

                                <div class="col-6 col-sm-4">
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
                        </div> 
                    </div>


                    <div class="row"> 
                        <div class="col-sm-4">
                    
                        </div> 

                        <div class="col-sm-8">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col">
                                <p><?= $resum->skills ?></p> <!-- навыки подгрузка из базы -->
                                <p><?= $resum->personalQualities_id ?></p> <!-- персональные качества подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-12 col-md-8">
                                <p>В избранное</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата подгрузка из базы -->
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
              