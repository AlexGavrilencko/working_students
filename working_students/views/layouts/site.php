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

    <header>
            
         <nav class="navbar navbar-expand-lg light"> <!-- стиль для меню сайта -->

            <a href="#" class="navbar-brad"><img src="/public/img/logo.jpg" alt="Logo"></a>  <!-- логотип в меню сайта -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                 <div class="collapse navbar-collapse " id="collapsibleNavbar">

                        <ul class="navbar-nav">  <!-- переходы в меню -->


                        <?php  if (Yii::$app->user->isGuest){ ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark h5" href="/site/index">Студентам</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link text-dark h5" href="/site/indexwork">Работодателям</a>
                            </li> 
                        </ul>

                        <ul class="navbar-nav ml-auto">  <!-- переходы в меню -->

                            <li class="nav-item">
                                <a class=" nav-link text-dark h5 popup" href="/auth/login" id="vxod">Вход</a>
                             </li>

                        </ul>

                        <?php } else {?>
                            <?php $user = Yii::$app->user->identity;
                            if($user->rang===10){ ?>

                                <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Личный кабинет
                                     </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Мое резюме</a>
                                            <a class="dropdown-item" href="#">Избранное</a>
                                            <a class="dropdown-item" href="#">Просмотренное</a>
                                            <a class="dropdown-item" href="#">Вакансии</a>
                                        </div>
                                </li>
                            <?php }
                            if($user->rang===20){ ?>

                                <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Личный кабинет
                                     </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Мои вакансии</a>
                                            <a class="dropdown-item" href="#">Избранное</a>
                                            <a class="dropdown-item" href="#">Просмотренное</a>
                                            <a class="dropdown-item" href="#">Резюме</a>
                                        </div>
                                </li>
                            <?php }
                            ?>

                
                            <li class="nav-item">
                                <a class="nav-link text-light h5 popup" href="/auth/logout" id="vixod">Выход</a>
                            </li>
                            
                        <?php }?>

                    </ul>
                </div>
            </nav>
    </header>


        <div class="container">
            <?= $content ?>
        </div>

     <!--<footer class="sticky-button">
         <div class="position-fixed container-fluid bg-dark d-flex align-items-center justify-content-center">
             <img id="logofooter" src="/public/img/logo2.png" alt="Logo">
        </div>
    </footer>-->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>