<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <div class="container-fluid padding_search d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row justify-content-md-center">

            <div class="col-sm-8"> 
                <div class="border_search">    
                     <!-- результаты поиска -->
                    <div class="row justify-content-md-center">
                        <div class="col-sm-6">
                        <!-- для изображения -->
                            <img src="/public/img/nofoto.png" alt="Avatar" class="compsearchavatar">
                        </div> 
                    </div>


                    <div class="col-sm-12 ml-4">
                    <!-- для описания -->
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>Должность</p> <!-- подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p>Цена</p>     <!-- подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>Организация</p> <!-- подгрузка из базы -->
                            </div>
                            <div class="col-6 col-sm-4">
                                <p>Город</p> <!-- подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Остальная информация</p> <!-- подгрузка из базы -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-8">
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
                       