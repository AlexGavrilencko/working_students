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

<div class="header" style="height: 480px;">

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
         
        <div class="container-fluid d-flex hh-100 d-flex flex-row bd-highlight flex-column">        
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>

                <div class="col">
                    <a href="/auth/login" class="btn-rounded btngreen btn btn-lg m-4">Разместить вакансию</a>
                </div>
            </div>
        
                <p class="h2 text-light margin-top">Найдите сотрудника на вашу вакансию</p>

            <div class="row no-gutters">
                <div class="col-8 col-md-6">
                    <input class="form-control btn-none" id="search" type="text" placeholder="Поиск..." aria-label="Search" style="width: 100%" >      
                </div>    

                <div class="col-4 col-md-2"> 
                    <button type="submit" class="btn-none btn btngreen">Найти</button>
                </div>

                <div class="col-4 col-md-2"> 
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
                    <div class="col-md-12">
                        <div class="text-center text-light">
                            &copy; 2019 WorkingStudents, Build with by V&A
                        </div>
                    </div>
                </div>
             </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>