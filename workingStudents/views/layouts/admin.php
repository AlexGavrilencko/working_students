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

<div class="wrap">
<header>          
         <nav class="navbar navbar-expand-lg dark navbar-inverse"> <!-- стиль для меню сайта -->

           
            <a href="/site/index" class="navbar-brad"><img class="logoadmin" src="/public/img/logofooter1.png" alt="Logo"></a>  <!-- логотип в меню сайта -->

                <button class="navbar-toggler navbar-toggler-right navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <!-- иконка для свернутого меню -->
                    <span class="navbar-toggler-icon"></span>
                </button>

                 <div class="collapse navbar-collapse " id="collapsibleNavbar">

                                <li class="nav-item dropdown ml-auto">
                                     <a class="nav-link  text-light dropdown-toggle h6" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Кабинет администратора
                                     </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item  h6" href="/admin/default/index">Home</a>
                                            <a class="dropdown-item  h6" href="/admin/user/index">Пользователи</a>
                                            <a class="dropdown-item  h6" href="/admin/organization/index">Организации</a>
                                            <a class="dropdown-item  h6" href="/admin/article/index">Статьи</a>
                                            <a class="dropdown-item  h6" href="/admin/tag/index">Тэги</a>
                                            <a class="dropdown-item  h6" href="/admin/art_category/index">Категории статей</a>

                                            <a class="dropdown-item  h6" href="/admin/attributes/index">Атрибуты</a>
                                            <a class="dropdown-item  h6" href="/admin/big_speciality/index">Специальность по ОКСО</a>
                                            <a class="dropdown-item  h6" href="/admin/speciality/index">Специальность</a>
                                            <a class="dropdown-item  h6" href="/admin/profstand/index">Профстандарт</a>
                                            <a class="dropdown-item  h6" href="/admin/category_profstand/index">Категории профстандартов</a>
                                            <a class="dropdown-item  h6" href="/admin/position/index">Должность</a>
                                            <a class="dropdown-item  h6" href="/admin/special_profstand/index">Соединение специальностей и профстандарта</a>
 
                                        </div>
                                </li>
                </div>
            </nav>
    </header>

   

        <div class=" container">
            <?= $content ?>
        </div>
</div>        



<footer class="footeradmin">
             <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                    </div>

                    <div class="col">
                        <div class="row justify-content-center">
                            <a href="/site/index" id="logofooter" class="navbar-brad img-fluid"><img src="/public/img/logo1.png" alt="Logo"></a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="text-center text_foot ml-5" >
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

