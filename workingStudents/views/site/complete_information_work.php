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
                                    <p>Дата рождения</p>     <!-- подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p>Желаемая должность</p> <!-- подгрузка из базы -->
                                </div>

                                <div class="col-6 col-sm-4">
                                    <p>Город</p> <!-- подгрузка из базы -->
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
                                    <p>Остальная информация</p> <!-- подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-12 col-md-8">
                                <p>В избранное</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p>Дата</p> <!-- подгрузка из базы -->
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
              