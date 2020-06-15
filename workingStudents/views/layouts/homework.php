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
use app\models\Organization;
use app\models\Resume;
use app\models\Vacancy;
use app\models\Position;

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
    <style>
     p {
    font-family: 'Montserrat', sans-serif;
  }
  h1 {
    font-family: 'Montserrat', sans-serif;
  }
  h2 {
    font-family: 'Montserrat', sans-serif;
  }
  h3 {
    font-family: 'Montserrat', sans-serif;
  }
  h4 {
    font-family: 'Montserrat', sans-serif;
  }
  h5 {
    font-family: 'Montserrat', sans-serif;
  }
  h6 {
    font-family: 'Montserrat', sans-serif;
  }
  input{
  font-family: 'Montserrat', sans-serif;
}
.bootstrap-select>.dropdown-toggle {
    width: 215% !important;
}
</style>

<div class="header">
    <nav class="navbar navbar-expand-lg light"> <!-- стиль для меню сайта -->   
            <a href="/site/index" class="navbar-brad"><img src="/public/img/logo1.png" alt="Logo"></a>  <!-- логотип в меню сайта --> 

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
                                <a class="nav-link h6 menugreen" href="<?= Url::toRoute(['site/search_practic','id'=>'0']) ?>">Практика</a>
                            </li> 

                            <li class="nav-item">
                                <a class="nav-link h6 menugreen" href="/site/indexwork">Работодателю</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link h6 menugreen" href="/site/indexartic">Cтатьи</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto">  <!-- переходы в меню для гостя ссылка на ВХОД -->
                            <li class="nav-item">
                                <a class=" nav-link menugreen h6" href="/auth/login" id="vxod">Вход</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/auth/login" class="btn btnorange ml-2">Разместить вакансию</a>
                            </li>
                        
                        </ul>
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

   
      <h4 class="text-light margin-top">Найдите молодого специалиста<br>в компанию прямо сейчас</h4>


          <div class="row">
              <div class="col-12 col-md-10 col-lg-8">
                  <form class="search" method="get" action="<?= Url::toRoute(['site/searchres']) ?>">
                      <div class="row no-gutters align-items-center">
                                    <?php
                                         $objective = Position::find()->all();
                                    ?>
                          <div class="col-7">
                               
                                    <select class="selectpicker" data-live-search="true" name="position">
                                        <option data-tokens="">Желаемая должность соискателей</option>  
                                        <?php                           
                                            foreach ($objective as $objective): ?> 
                                                <option data-tokens="" value="<?=$objective->id?>"><?=$objective->name?></option>  
                                            <?php endforeach;?>    
                                    </select>
                              
                          </div>

                          <div class="col-auto">
                              <button type="submit" class="btn-none btn btnwite" >Найти</button>
                          </div>
                      </div>    
                  </form>
              </div>
          </div>

          <h4 class="text-light mt-5">Сейчас на сайте "Working Students"</h4>
      <div class="margin_statistic justify-content-center">
    
          <div class="row ">
                  <div class="col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                      <div class="row">
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">Практика</h4>
                          </div>
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">Вакансий</h4>
                          </div>
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">Резюме</h4>
                          </div>
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">Организаций</h4>
                          </div>
                      </div>
                  </div>
          

          
                  <div class="col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                      <div class="row">
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">
                                  <?php $model = Vacancy::find()->where(['WorkOrPractice'=>1])->count();
                                      if ($model == NULL)
                                      {
                                          echo '0';
                                      }

                                      else echo $model;
                                  ?>
                              </h4>
                          </div>
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">
                                  <?php $model = Vacancy::find()->where(['WorkOrPractice'=>0])->count();
                                      if ($model == NULL)
                                      {
                                          echo '0';
                                      }

                                      else echo $model;
                                  ?>
                              </h4>
                          </div>
                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">
                              <?php $model = Resume::find()->count();
                                  if ($model == NULL)
                                  {
                                      echo '0';
                                  }

                                  else echo $model;
                                  ?>
                              </h4>
                          </div>

                          <div class="col-8 col-sm-8 col-md-2 col-lg-2 col-xl-2">
                              <h4 class="text-light size_txt">
                                  <?php $model = Organization::find()->count();
                                  if ($model == NULL)
                                  {
                                      echo '0';
                                  }

                                  else echo $model;
                                  ?>
                              </h4>
                          </div>     
                      </div>
                  </div>
          </div>
      </div>
</div>

  
        <main class="content"><?= $content ?></main>
  

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