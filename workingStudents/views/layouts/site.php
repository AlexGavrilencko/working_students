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

                <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>

                 <div class="collapse navbar-collapse " id="collapsibleNavbar">

                     


                        <?php  if (Yii::$app->user->isGuest){ ?>
                            <ul class="navbar-nav">  <!-- переходы в меню для гостя-->

                            <li class="nav-item">
                                <a class="nav-link menugreen h6" href="/site/index">Студентам</a>
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
                        <?php } else {?>
                            <?php $user = Yii::$app->user->identity;
                            if($user->rang===10){ ?> <!-- Для студента -->

                                <li class="nav-item dropdown ml-auto">
                                     <a class="nav-link menugreen dropdown-toggle h6" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Личный кабинет
                                     </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item menugreen_v h6" href="/privateoffice/personal_account">Профиль</a>
                                            <a class="dropdown-item menugreen_v h6" href="/privateoffice/resume">Мое резюме</a>
                                            <a class="dropdown-item menugreen_v h6" href="#">Достижения</a>
                                            <a class="dropdown-item menugreen_v h6" href="#">Избранное</a>
                                            <a class="dropdown-item menugreen_v h6" href="#">Просмотренное</a>
                                            <a class="dropdown-item menugreen_v h6" href="/site/search">Поиск вакансий</a>
                                            <a class="dropdown-item menugreen_v h6" href="/auth/logout" id="exit"><div>Выход</div></a>
                                        </div>
                                </li>
                            <?php }
                            if($user->rang===20){ ?> <!-- Для работодателя -->

                                <li class="nav-item dropdown ml-auto">
                                     <a class="nav-link menugreen dropdown-toggle h6" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Личный кабинет
                                     </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item menugreen_v h6" href="/privateoffice/personal_account">Профиль</a>
                                            <a class="dropdown-item menugreen_v h6" href="/privateoffice/vacancy">Составить вакансию</a>
                                            <a class="dropdown-item menugreen_v h6" href="#">Мои вакансии</a>
                                            <a class="dropdown-item menugreen_v h6" href="/privateoffice/organiz">Данные об организации</a>
                                            <a class="dropdown-item menugreen_v h6" href="#">Избранное</a>
                                            <a class="dropdown-item menugreen_v h6" href="#">Просмотренное</a>
                                            <a class="dropdown-item menugreen_v h6" href="/site/search_work">Поиск резюме</a>
                                            <a class="dropdown-item menugreen_v h6" href="/auth/logout" id="exit"><div>Выход</div></a>
                                        </div>
                                </li>
                            <?php }
                            ?>
                        <?php }?>

                    </ul>
                </div>
            </nav>
    </header>



    <main class="content"><?= $content ?></main>

        <footer class="dark">
             <div class="container">
                 <div class="row justify-content-center">
                    <a href="/site/index" id="logofooter" class="navbar-brad"><img src="/public/img/logofooter.png" alt="Logo"></a>
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