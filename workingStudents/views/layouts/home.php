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
            <a href="/site/index" class="navbar-brad"><img src="/public/img/logo1.png" alt="Logo"></a>  <!-- логотип в меню сайта --> 

                <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <?php  if (Yii::$app->user->isGuest){ ?>
                        <ul class="navbar-nav">  <!-- переходы в меню для гостя-->
                            <li class="nav-item">
                                <a class="nav-link menured h6 text-decoration" href="/site/index">Студентам</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link h6 menugreen" href="/site/indexwork">Работодателям</a>
                            </li> 
                        </ul>

                        <ul class="navbar-nav ml-auto">  <!-- переходы в меню для гостя ссылка на ВХОД -->
                            <li class="nav-item">
                                <a class=" nav-link menugreen_v h6" href="/auth/login" id="vxod">Вход</a>
                             </li>
                        </ul>

     <!-- удалить для других пользователей. оставить только для пользователя гость -->                   
                        <?php } else {?>
                            <?php $user = Yii::$app->user->identity;
                            if($user->rang===10){ ?>
                                <ul class="navbar-nav">  <!-- переходы в меню для студента ДОБАВЬ ССЫЛКУ НА ЛК-->
                                    <li class="nav-item">
                                        <a class="nav-link menured h6 text-decoration" href="/site/index">Студентам</a>
                                    </li>
                                </ul>
                            <?php }
                            if($user->rang===20){ ?>
                                <ul class="navbar-nav">  <!-- переходы в меню для работадателя ДОБАВЬ ССЫЛКУ НА ЛК-->
                                    <li class="nav-item">
                                        <a class="nav-link h6 menugreen" href="/site/indexwork">Работодателям</a>
                                    </li> 
                                </ul>
                            <?php }
                            ?>
                            <ul class="navbar-nav ml-auto">  <!-- переходы в меню ВЫХОД-->
                                <li class="nav-item">
                                    <a class=" nav-link menugreen_v h6" href="/auth/logout" id="vixod">Выход</a>
                                </li>
                            </ul>
                        <?php }?>   

                </div>
        </nav>
         
        <div class="container-fluid d-flex hh-100 flex-row bd-highlight flex-column">        
          <!--  <div class="row justify-content-between">   
                 
                <div class="col-4">
                </div>
                <div class="col-4">
                    <a href="/auth/login" class="btn-rounded btngreen btn btn-lg">Разместить резюме</a>
                </div>
            </div> --> 

            <nav class="navbar navbar-expand-lg"> <!-- стиль для меню сайта -->  

                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                        <ul class="navbar-nav ml-auto">  <!-- переходы в меню для гостя ссылка на ВХОД -->
                            <li class="nav-item">
                            <a href="/auth/login" class="btn-rounded btngreen btn btn-lg">Разместить резюме</a>
                             </li>
                        </ul>
                </div>
        </nav>

             
                <p class="h2 text-light margin-top">Работа для каждого</p>

 <!--           <div class="row no-gutters">
                <div class="col-8 col-md-6">
                    <input class="form-control btn-none" id="search" type="text" placeholder="Поиск..." aria-label="Search" style="width: 100%" >      
                </div>    

                <div class="col-4 col-md-2"> 
                    <button type="submit" class="btn-none btn btngreen">Найти</button>
                </div>

                <div class="col-4 col-md-2"> 
                </div> 
            </div>   
-->     
	                <div class="row">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="search">
                                <div class="row no-gutters align-items-center">

                                    <div class="col">
                                        <input class="form-control btn-none form-control-lg" type="search" placeholder="Поиск...">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn-none btn-lg btn btngreen">Найти</button>
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