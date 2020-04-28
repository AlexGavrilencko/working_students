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
use app\models\Organization;
use app\models\Resume;
use app\models\Vacancy;
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

<div class="header">
        <nav class="navbar navbar-expand-lg light"> <!-- стиль для меню сайта -->   
            <a href="/site/index" class="navbar-brad ml-2"><img src="/public/img/logo1.png" alt="Logo"></a>  <!-- логотип в меню сайта --> 

                <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse ml-4" id="collapsibleNavbar">
                    <?php  if (Yii::$app->user->isGuest){ ?>
                        <ul class="navbar-nav">  <!-- переходы в меню для гостя-->
                            <li class="nav-item">
                                <a class="nav-link  h6 menugreen" href="/site/search">Вакансии</a>  <!-- menured text-decoration-->
                            </li>
                            <li class="nav-item ml-2">
                                <a class="nav-link h6 menugreen" href="/site/search_work">Резюме</a>
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
         
        <div class="container-fluid d-flex hh-100 flex-row  flex-column">        

          <!--  <nav class="navbar navbar-expand-lg">  стиль для меню сайта  

                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                        <ul class="navbar-nav ml-auto"> 
                            <li class="nav-item">
                            <a href="/auth/login" class="btn-rounded btnwite btn btn-lg">Разместить резюме</a>
                             </li>
                        </ul>
                </div>
            </nav>--> 

             
                <p class="h2 text-light margin-top">Работа для каждого</p>
  

	                <div class="row">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="search" method="get" action="<?= Url::to(['/site/searchWordSt']) ?>">
                                <div class="row no-gutters align-items-center">

                                    <div class="col-8">
                                        <input class="form-control btn-none form-control-lg" type="name" name="search" placeholder="Профессия или должность">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn-none btn-lg btn btnwite" >Найти</button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>

<!--                   
                <div class="margin_statistic">
                    <div class="row ">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm">
                                    <p class="text-light size_txt">Вакансии</p>
                                </div>
                                <div class="col-sm">
                                    <h5 class="text-light size_txt">Резюме</p>
                                </div>
                                <div class="col-sm">
                                    <p class="text-light size_txt">Организации</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <p class="text-light size_txt">
                                        <?php $model = Vacancy::find()->count();
                                            if ($model == NULL)
                                            {
                                                //echo '0';
                                            }

                                            else //echo $model;
                                        ?>
                                    </p>
                                </div>

                                <div class="col">
                                    <h5 class="text-light size_txt">
                                    <?php $model = Resume::find()->count();
                                        if ($model == NULL)
                                        {
                                            //echo '0';
                                        }

                                        else //echo $model;
                                        ?>
                                    </p>
                                </div>

                                <div class="col">
                                    <p class="text-light size_txt">
                                        <?php $model = Organization::find()->count();
                                        if ($model == NULL)
                                        {
                                           // echo '0';
                                        }

                                        else //echo $model;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            
                        </div>
                    </div>
                </div>
--> 
</div>


<main class="content"><?= $content ?></main>
       
  

        <footer class="dark">
             <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <li class="nav-item dropdown">
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

                    <div class="col">
                        <div class="row justify-content-center">
                            <a href="/site/index" id="logofooter" class="navbar-brad"><img src="/public/img/logofooter1.png" alt="Logo"></a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="text-center text-light text_foot ml-5">
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