<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Главная';

?>

        <div class="row">
            <h1 class="text_indexwork"><strong>Разместить</strong></h1>
        </div>
        <div class="row">
            <h1 class="btn_iw" style="font-size: 7vw;"><strong>первую вакансию</strong></h1>
        </div>
            <div class="row">
                <a href="/auth/login" class="btn btn-secondary btn-lg btn_iw">Разместить вакансию</a>
            </div>
            
                <div class="row" style="margin-left: 13%; margin-top: 15%; margin-right: 3%">
                    <div class="col-sm">
                        <img class="img_iw img-fluid img-thumbnail" src="/public/img/Work_1.jpg" alt="">
                    </div>
                    <div class="col-sm">
                        <p style="font-size: 2.5vw; margin-top: 15%;"><strong>Вам будут доступны<br> резюме</strong></p>
                    </div>
                </div>


                <div class="row" style="margin-left: 13%; margin-right: 3%">
                    <div class="col-sm">
                        <p style="font-size: 2.5vw; margin-top: 15%;"><strong>Ваша вакансия будет<br> видна всем 
                        пользователям</strong></p>
                    </div>
                    <div class="col-sm">
                        <img class="img_iw img-fluid img-thumbnail" src="/public/img/Work_2.jpg" alt="">
                    </div>
                </div>


                <div class="row" style="margin-left: 13%; margin-bottom: 5%; margin-right: 3%">
                    <div class="col-sm">
                        <img class="img_iw img-fluid img-thumbnail" src="/public/img/Work_3_1.jpg" alt="">
                    </div>
                    <div class="col-sm">
                        <p style="font-size: 2.5vw; margin-top: 15%;"><strong>На Workind Students<br> могут 
                        зарегистрироваться <br>как крупные, так и<br> маленькие компании</strong></p>
                    </div>
                </div>

                    <div class="row justify-content-center" style=" margin-bottom: 5%;">
                        <a href="/auth/login" class="btn btn-secondary btn-lg">Разместить вакансию</a>
                    </div>
                
        



