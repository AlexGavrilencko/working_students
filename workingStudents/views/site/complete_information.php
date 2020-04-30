<?php


use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


$this->title = 'Просмотр вакансии';
?>

<!-- вакансии -->
    <div class="container-fluid padding_search d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10"> 
                <div class="border_search"> 

                    <div class="row"> 
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                <?php
                                $o = $vac->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                $p=$vac->position_id;
                                $pos = Attributes::find()->where(['id'=>$p])->one();
                                if($organization->image): ?>
                                    <img class="compsearchavatar" src="/uploads/<?= $organization->image?>" alt="Логотип компании">
                                <?php endif; ?>
                        </div> 

                        <div class="col-5 col-sm-5 col-md-7 col-lg-7 col-xl-7"> <!-- Отображение информации правее фотографии -->
                       
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-10">  <!-- Отображение вакансии-->
                                    <p><?= $pos->name ?></p> 
                                </div>                  <!-- /Отображение вакансии -->

                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">  <!-- Отображение з/п-->
                                    <p>    
                                        <?php
                                            $salary = $vac->salary;
                                                if ($salary == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $salary;
                                        ?>
                                    </p>
                                </div> <!-- /Отображение з/п-->

                            </div>

                            <div class="row "> <!-- Отображение названия организации и города -->

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-10">
                                    <p>    <!-- Название организации -->
                                        <?php
                                            
                                                if ($organization == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $organization->name;
                                        ?>
                                    </p>
                                </div>    
                                
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                    <p>    <!-- Город $vacan->city_id -->
                                        <?php
                                            $c = $vac->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                                if ($city == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $city->name;
                                        ?>
                                    </p>
                                </div>  
                            </div>                 <!-- /Названия организации и города-->
                        </div>
                    </div> 

                                <?php 
                                $exp=$vac->experience_id;
                                $emp=$vac->employment_id;
                                $exp = Attributes::find()->where(['id'=>$exp])->one();
                                $emp = Attributes::find()->where(['id'=>$emp])->one();
                                ?>

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

                        <div class="row ml-1"> <!-- Просмотры и дата -->
                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$vac->id]); ?>">
                                    <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                    </div>
                            <?php }?>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <p>Дата<?= $vacan->dateAdd ?> Количество просмотров</p>       
                            </div>
                        </div> <!-- /Просмотры и дата -->
                </div>
            </div>
        </div> 
    </div>
                       
              