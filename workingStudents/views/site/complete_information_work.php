<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Url;


?>
          
<!-- резюме -->

    <div class="container-fluid padding_search d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row justify-content-md-center">

            <div class="col-sm-8"> 
                <div class="border_search">    
                     <!-- результаты поиска -->
                    <div class="row"> 
                        <div class="col-sm-4">
                        <!-- для изображения -->
                            <img src="/public/img/nofoto.png" alt="Avatar" class="compsearchavatar">
                        </div> 

                        <div class="col-sm-8">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p><?= $resum->name ?> <?= $resum->surname ?> <?= $resum->patronymic ?></p> <!-- ФИО подгрузка из базы -->
                                </div>
                                <?php
                                        $c = $resum->city_id;
                                        $city = Attributes::find()->where(['id'=>$c])->one();
                                        $obj=$resum->CareerObjective_id;
                                        $object = Attributes::find()->where(['id'=>$obj])->one();
                                        $qal=$resum->personalQualities_id;
                                        $qalit = Attributes::find()->where(['id'=>$qal])->all();
                                            if ($city == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $city->name;
                                ?>
                                <div class="col-6 col-sm-4">
                                    <p><?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8">
                                <p><?= $object->name ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                </div>

                                
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
                                <p><?= $resum->skills ?></p> <!-- навыки подгрузка из базы -->
                                <p><?= $qalit->name ?></p> <!-- персональные качества подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-12 col-md-8">
                                <p>В избранное</p> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата подгрузка из базы -->
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
              