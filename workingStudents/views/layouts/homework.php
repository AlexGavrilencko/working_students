<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PublicAsset;
use yii\helpers\Url;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>


    <header>
    <nav class="navbar navbar-expand-lg light"> <!-- стиль для меню сайта -->   
            <a href="/site/index" class="navbar-brad ml-2"><img src="/public/img/logo1.png" alt="Logo"></a>  <!-- логотип в меню сайта --> 

                <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse ml-4" id="collapsibleNavbar">
                  
                        <ul class="navbar-nav">  <!-- переходы в меню для гостя-->

                            <li class="nav-item">
                                <a class="nav-link menugreen h6" href="<?= Url::toRoute(['site/search','id'=>'0']) ?>">Вакансии</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link h6 menugreen" href="<?= Url::toRoute(['site/search_work','id'=>'0']) ?>">Резюме</a>
                            </li> 

                            <li class="nav-item">
                                <a class="nav-link h6 menugreen" href="/site/indexwork">Работодателю</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link h6 menugreen" href="/site/indexartic">Cтатьи</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto">  <!-- переходы в меню для гостя ссылка на ВХОД -->
                            <li class="nav-item mr-2">
                                <a class=" nav-link menugreen_v h6" href="/auth/login" id="vxod">Вход</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/auth/login" class="btn btn-secondary">Разместить резюме</a>
                            </li>
                        
                        </ul>
                </div>
        </nav>
    </header>

  
        <main class="content1"><?= $content ?></main>
  

        <footer class="dark">
             <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4">
                        <li class="nav-item dropdown" style="margin-left: 2%;">
                            <a class="nav-link dropdown-toggle text-light h6" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Документация
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item menugreen_v h6" href="/site/personal_data_protection">Защита персональных данных</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/site_terms_of_use">Условие использования сайта</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/the_agreement">Соглашение об оказании услуг</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/rules_for_placement_of_vacancies">Правила размещения вакансий на ws.ru</a>
                                </div>
                        </li>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="row justify-content-center">
                            <a href="/site/index" id="logofooter" class="navbar-brad"><img src="/public/img/logofooter1.png" alt="Logo"></a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4">
                        <div class="text-center text-light text_foot ml-5">
                            &copy; <?= date('Y') ?> WorkingStudents, V&A
                        </div>
                    </div>
                </div>
             </div>
        </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>