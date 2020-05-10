<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Ошибка";
?>



<div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
<div class="site-error pole">
 
    <div class="row justify-content-center">
        <img src="/public/img/404.png" alt="404" class="A404">
    </div>

    <div class="alert alert-danger">
        <h4 style="margin-left:18%;">Извините, но данной страницы не существует</h4>
    </div>

    <h6 class="text-center">
        Вышеуказанная ошибка произошла, когда веб-сервер обрабатывал ваш запрос.
    </h6>
    <h6 class="text-center">
        Пожалуйста, свяжитесь с нами, если считаете, что это ошибка сервера. Спасибо.
    </h6>
    <div class="row justify-content-center">
        <a href="/site/contact" class="btn btn-danger mr-5 mt-3 btn-sm btn_iw">Связаться с нами</a>
    </div>

</div>
</div>
</div>