<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Работодателю';

?>

        <div class="row">
            <h1 class="text_indexwork"><strong>Почему следует разместить свои предложения по работе или практике именно на нашем сайте?</strong></h1>
        </div>

            <div class="row mr-5">
                <a href="/auth/login" class="btn btn-secondary btn-lg btn_iw">Разместить вакансию</a>
            </div>
            
                <div class="row justify-content-center" style="margin-left: 14%; margin-top: 7%; margin-right: 3%">
                    <div class="col-sm">
                        <div class="row">
                            <img class="img_iw img-fluid " src="/public/img/Work_2.jpg" alt="" style="width: 300px; object-fit: cover;  display: block;  height: 250px;">
                        </div>

                        <div class="row">
                            <img class="img_iw img-fluid " src="/public/img/Work_1.jpg" alt="" style="width: 300px; object-fit: cover;  display: block;  height: 250px;">
                        </div>

                        <div class="row">
                            <img class="img_iw img-fluid " src="/public/img/Work_3_1.jpg" alt="" style="width: 300px; object-fit: cover;  display: block;  height: 250px;">
                        </div>
                    </div>

                    <div class="col-sm">
                        <p style="font-size: 2.5vw; margin-top: 15%;"><strong>1. Мы первый сайт, который нацелен на трудоустройство молодых специалистов.</strong></p>
                        <p style="font-size: 2.5vw; margin-top: 15%;"><strong>2. Размещенеие вакансий и предложений по практике абсолютно бесплатно.</strong></p>
                        <p style="font-size: 2.5vw; margin-top: 15%;"><strong>3. На нашем сайте вы никогда не увидете рекламу, которая мешают просмотр страниц.</strong></p>
                    </div>
                </div>

                    <div class="row justify-content-center" style=" margin-bottom: 5%;">
                        <a href="/auth/login" class="btn btn-secondary btn-lg">Разместить вакансию</a>
                    </div>
                
        



