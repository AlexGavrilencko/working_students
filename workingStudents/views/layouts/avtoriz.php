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
    <body class="fonbody">
    <?php $this->beginBody() ?>

    <header class="header1">
    <nav class="navbar navbar-expand-lg light"> <!-- стиль для меню сайта -->
               
               <a href="#" class="navbar-brad"><img src="/public/img/logo.jpg" alt="Logo"></a>  <!-- логотип в меню сайта -->
                          
                  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  
                      <div class="collapse navbar-collapse " id="collapsibleNavbar">
  
                          <ul class="navbar-nav">  <!-- переходы в меню -->
                      
                              <li class="nav-item">
                                  <a class="nav-link text-dark h5" href="/site/index">Студентам</a>
                              </li>
                      
                              <li class="nav-item">
                                  <a class="nav-link text-dark h5" href="/site/indexwork">Работодателям</a>
                              </li> 
                          </ul>
  
                          <ul class="navbar-nav ml-auto">  <!-- переходы в меню -->
  
                              <li class="nav-item">
                                  <a class=" nav-link text-dark h5 popup" href="/site/index" id="vxod">Главная</a>
                               </li>
  
                          </ul>
                      </div>
          </nav>

          <div class="container-fluid">
        <?= $content ?>
    </div>

    </header>

   
    
    <footer>
        <div class="container-fluid d-flex align-items-center justify-content-center grey">
            <img id="logofooter" src="/public/img/logo2.png" alt="Logo">
            <!-- <p>@все права защищены</p> -->
        </div>
    </footer>


    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>