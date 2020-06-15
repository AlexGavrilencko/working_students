<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;
use app\helper\ClassHelper;


$this->title = 'Работодателю';

?>
    <div class="container">
                        <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения категорий -->
                            <div class="row">
                                <h1 class="text_indexwork"><strong>Почему следует разместить<br> свои предложения по работе<br> или практике именно на нашем сайте?</strong></h1>
                            </div>

                                <div class="row">
                                    <a href="/auth/login" class="btn btn-secondary btn-lg ">Разместить вакансию</a>
                                </div>
            
                

                            <div class="row justify-content-center" style=" margin-top: 7%; margin-right: 3%">
                                <div class="col-sm">
                                    <img class="img_iw img-fluid " src="/public/img/Work_2.jpg" alt="" style="width: 300px; object-fit: cover;  display: block;  height: 250px;">
                                </div>
                                <div class="col-sm">
                                    <p style="font-size: 2.3vw; line-height: initial;">Размещенеие вакансий и предложений по практике абсолютно бесплатно. Опубликованные вакансии и предложения по практике будут видны всем пользователям</p>
                                </div>
                            </div>

                            <div class="row justify-content-center" style=" margin-top: 1%; margin-right: 3%">
                                <div class="col-sm-8">
                                    <p style="font-size: 2.3vw; margin-top: 5%; line-height: initial;">Мы первый сайт, который <br>нацелен на трудоустройство <br>молодых специалистов. Вам <br>будет доступна база резюме <br>молодых специалистов.</p>
                                </div>
                                <div class="col-sm">
                                    <img class="img_iw img-fluid " src="/public/img/Work_1.jpg" alt="" style="width: 300px; object-fit: cover;  display: block;  height: 250px;">
                                </div>
                            </div>

                            <div class="row justify-content-center" style=" margin-top: 1%; margin-right: 3%">
                                <div class="col-sm">
                                    <img class="img_iw img-fluid " src="/public/img/Work_3_1.jpg" alt="" style="width: 300px; object-fit: cover;  display: block;  height: 250px;">
                                </div>
                                <div class="col-sm">
                                    <p style="font-size: 2.3vw; margin-top: 15%; line-height: initial;">На "Working Students" могут зарегистрироваться как крупные, так и маленькие компании</p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <p style="font-size: 2.5vw; margin-top: 5%; line-height: initial;" class="text_name_vacancy"><strong>На нашем сайте вы никогда не увидете рекламу, которая мешают просмотр страниц.</strong></p>
                            </div>
                           
                                <div class="row justify-content-center" style=" margin-bottom: 5%;">
                                    <a href="/auth/login" class="btn btn-secondary btn-lg">Разместить вакансию</a>
                                </div>
                        </div>
                    </div>