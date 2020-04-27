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

            <div class="col-sm-8"> 
                <div class="border_search">    
                     <!-- результаты поиска -->
                    <div class="row"> 
                        <div class="col-sm-4">
                        <!-- для изображения -->
                        <?php
                        $o = $vac->organization_id;
                        $organization = Organization::find()->where(['id'=>$o])->one();
                        $p=$vac->position_id;
                        $pos = Attributes::find()->where(['id'=>$p])->one();
                        if($organization->image): ?>
                            <img class="compsearchavatar" src="/uploads/<?= $organization->image?>" alt="Логотип компании">
                        <?php endif; ?>
                            
                        </div> 

                        <div class="col-sm-8">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p><?= $pos->name ?></p> <!-- должность вакансии подгрузка из базы -->
                                </div>

                                <div class="col-6 col-sm-4">
                                    <p>    <!-- цена $vacan->salary подгрузка из базы -->
                                        <?php
                                            $salary = $vac->salary;
                                                if ($salary == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $salary;
                                        ?>
                                    </p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p>    <!-- Название организации подгрузка из базы -->
                                        <?php
                                            
                                                if ($organization == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $organization->name;
                                        ?>
                                    </p>
                                </div>

                                <div class="col-6 col-sm-4">
                                    <p>    <!-- Город $vacan->city_id подгрузка из базы -->
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
                            </div>
                        </div> 
                    </div>


                    <div class="row"> 
                        <div class="col-sm-4">
                    
                        </div> 

                        <div class="col-sm-8">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col">
                                <?php 
                                $exp=$vac->experience_id;
                                $emp=$vac->employment_id;
                                $exp = Attributes::find()->where(['id'=>$exp])->one();
                                $emp = Attributes::find()->where(['id'=>$emp])->one();
                                ?>
                                    <p>Опыт: <?= $exp->name ?></p> <!-- опыт подгрузка из базы -->
                                    <p>График: <?= $emp->name ?></p> <!-- график работы подгрузка из базы -->
                                    <p>Обязанности: <?= $vac->duties ?></p> <!-- обязанности подгрузка из базы -->
                                    <p>Требование: <?= $vac->requirement ?></p> <!-- требование  подгрузка из базы -->
                                    <p>Условия: <?= $vac->conditions ?></p> <!-- условия подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-12 col-md-8">
                                <p>В избранное</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
                       
              