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
               
               <a href="/site/index" class="navbar-brad"><img src="/public/img/logo1.png" alt="Logo"></a>  <!-- логотип в меню сайта -->
                          
               <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                  
                      <div class="collapse navbar-collapse " id="collapsibleNavbar">
  
                          <ul class="navbar-nav">  <!-- переходы в меню -->
                      
                              <li class="nav-item">
                                  <a class="nav-link menugreen h6" href="/site/index">Студентам</a>
                              </li>
                      
                              <li class="nav-item">
                                  <a class="nav-link menugreen h6" href="/site/indexwork">Работодателям</a>
                              </li> 
                          </ul>
                      </div>
          </nav>

  
        <?= $content ?>
    

    </header>

   
    
        <footer class="dark">
             <div class="container">      
                
                 <div class="row justify-content-center">
                    <div class="col-6 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                        <a href="/site/index" id="logofooter" class="navbar-brad"><img src="/public/img/logofooter1.png" alt="Logo"></a>
                    </div>
                 </div>
                 
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="text-center text-light">
                            &copy; 2019 WorkingStudents, Build with by V&A
                        </div>
                    </div>
                </div>

             </div>
        </footer>

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>