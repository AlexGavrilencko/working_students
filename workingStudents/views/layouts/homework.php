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

<div class="header2">

        <nav class="navbar navbar-expand-lg light"> <!-- стиль для меню сайта -->
               
             <a href="/site/indexwork" class="navbar-brad"><img src="/public/img/logo1.png" alt="Logo"></a>  <!-- логотип в меню сайта -->
                        
                <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                    <div class="collapse navbar-collapse " id="collapsibleNavbar">

                        <ul class="navbar-nav">  <!-- переходы в меню -->
                    
                            <li class="nav-item">
                                <a class="nav-link menugreen h6" href="/site/index">Студентам</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link menured h6 text-decoration" href="/site/indexwork">Работодателям</a>
                            </li> 
                        </ul>

                        <ul class="navbar-nav ml-auto">  <!-- переходы в меню -->

                            <li class="nav-item">
                                <a class=" nav-link menugreen_v h6" href="/auth/login" id="vxod">Вход</a>
                             </li>

                        </ul>
                    </div>
        </nav>

        <div class="container-fluid d-flex hh-100 flex-row bd-highlight flex-column">        
           <!-- <div class="row">
                <div class="col">
                </div>

                <div class="col">
                    <a href="/auth/login" class="btn-rounded btngreen btn btn-lg m-4">Разместить вакансию</a>
                </div>
            </div>--> 

            <nav class="navbar navbar-expand-lg"> <!-- стиль для меню сайта -->  
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">  <!-- переходы в меню для гостя ссылка на ВХОД -->
                        <li class="nav-item">
                            <a href="/auth/login" class="btn-rounded btnwite btn btn-lg">Разместить вакансию</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
                <p class="h2 text-light margin-top">Найдите сотрудника на вашу вакансию</p>

                <div class="row">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="search">
                                <div class="row no-gutters align-items-center">

                                    <div class="col-8">
                                        <input class="form-control btn-none form-control-lg" type="search" placeholder="Профессия или должность">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn-none btn-lg btn btnwite">Найти</button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>            
        </div>

  
        <main class="content"><?= $content ?></main>
  

        <footer class="dark">
             <div class="container">
                 <div class="row justify-content-center">
                    <a href="/site/index" id="logofooter" class="navbar-brad"><img src="/public/img/logofooter1.png" alt="Logo"></a>
                 </div>
                <div class="row">
                    
                    <div class="col-md-3">
                
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light h6" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Документация
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item menugreen_v h6" href="/site/personal_data_protection">Согласие на обработку персональных данных</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/site_terms_of_use">Условие использования сайта</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/the_agreement">Соглашение об оказании услуг по содействию в трудоустройстве</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/rules_for_placement_of_vacancies">Правила размещения вакансий на ws.ru</a>
                                </div>
                        </li>

                    </div>

                    <div class="col-md-6">
                        <div class="text-center text-light text_foot">
                            &copy; 2019 WorkingStudents, Build with by V&A
                        </div>
                    </div>

                    <div class="col-md-3">
                    </div>
                    
                </div>
             </div>
        </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>