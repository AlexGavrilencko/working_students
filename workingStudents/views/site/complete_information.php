<?php
//СТРАНИЦА просмотра вакансии

use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;

$this->title = 'Просмотр вакансии';
?>

<div class="container-fluid d-flex flex-row bd-highlight flex-column">

<!-- Для отображения информации -->
    <div class="row justify-content-md-center mb-3"> 
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">  
                    <br>     
              
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_vacancy"> <!-- Фон для отображения -->
                    <div class="row mb-4"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vac->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                $p=$vac->position_id;
                                $pos = Attributes::find()->where(['id'=>$p])->one();
                                if($organization->image): ?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="Логотип компании">
                                <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                <div class="row">
                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                </div>

                                <div class="row">
                                    <p>Зарплата: 
                                            <?php
                                                $salary = $vacan->salary;
                                                if ($salary == NULL){
                                                    echo 'не указано';
                                                }
                                                else echo $salary;
                                            ?>
                                    </p>
                                </div>

                            <div class="row"> <!-- Отображение названия организации и города -->
                                    <p> 
                                        Предложение о работе или о практике
                                    </p>
                            </div>  
                        </div> <!-- div /Отображение информации правее фотографии -->
                    </div>

                        <div class="date_org">
                            <p class="text-center">Данные о вашей организации</p>                       
                                <p>Название организации:
                                    <?  if ($org->name == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $org->name;
                                    ?>  
                                </p>
                                <p>Город:  
                                    <?  if ($city == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $city->name;
                                    ?>
                                </p>
                                <p>Адрес:
                                    <?  if ($org->adres == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $org->adres;
                                    ?>
                                </p>
                                <p>ИНН:  
                                    <?  if ($org->inn == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $org->inn;
                                    ?>
                                </p>
                                <p>ОГРН:
                                    <?  if ($org->ogrn == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $org->ogrn;
                                    ?>  
                                </p>
                        </div>



                   <!-- Отображение дополнительной информации для соискателя -->


                        <div class="row ml-3"> <!-- Опыт работы -->
                            <p>Опыт: <?= $exp->name ?></p> <!-- опыт подгрузка из базы -->
                        </div><!-- /Опыт работы -->

                        <div class="row ml-3"><!-- График -->
                            <p>График: <?= $emp->name ?></p> <!-- график работы подгрузка из базы -->
                        </div><!-- /График -->

                        <div class="row ml-3"> <!-- Обязанности -->
                            <p>Обязанности: <?= $vac->duties ?></p> <!-- обязанности подгрузка из базы -->
                        </div> <!-- /Обязанности -->

                        <div class="row ml-3"> <!-- Требование -->
                            <p>Требование: <?= $vac->requirement ?></p> <!-- требование  подгрузка из базы -->              
                        </div> <!-- /Требование-->

                        <div class="row ml-3"> <!-- Условия -->
                            <p>Условия: <?= $vac->conditions ?></p> <!-- условия подгрузка из базы -->
                        </div> <!-- /Условия  -->

                        <div class="row ml-3"> <!-- Тип занятости -->
                            <p>Тип занятости: </p> <!-- Тип занятости подгрузка из базы -->
                        </div><!-- /Тип занятости -->

                        <div class="row ml-3"> <!-- Должность -->
                            <p>Должность: </p> <!-- Должность подгрузка из базы -->
                        </div><!-- /Должность -->
 <!-- /Отображение дополнительной информации для соискателя -->
                        <div class="row ml-1"> <!-- Просмотры и дата -->
                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$vac->id]); ?>">
                                    <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                        <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                        </a>
                                    </div>
                            <?php }?>
                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                    <a href="<?= Url::toRoute(['site/responsest', 'id'=>$vac->id]); ?>">
                                    <!--<img class="heard" src="/public/img/heard.png" alt="-->Откликнуться на вакансию<!--">--></a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                        <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->Откликнуться на вакансию<!--">-->
                                        </a>
                                    </div>
                            <?php }?>

                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <p>Дата<?= $vacan->dateAdd ?></p>       
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <p>Количество просмотров</p>       
                                </div>
                        </div> <!-- /Просмотры и дата -->
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
         
        </div>

        <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?> 

    </div>
  
</div>
