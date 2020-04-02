<?php


use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Мои вакансии';
?>
          
<br>

<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер -->
    <div class="row">

        <div class="col-sm-2"> 
             <!-- Для того, чтобы отображения вакансии было по середине -->
        </div>


        <div class="col-sm-8">    <!-- Блок для отображения вакансий -->
            <?php
                foreach ($vac as $vacan):    
            ?>                                <!-- Цикл для отображения вакансий -->

<!-- _______________________________________________________________________________________________ -->
            <div class="border_search3"> <!-- Фон для отображения -->
                
                <div class="row"> 

                        <div class="col-sm-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                    if($organization->image): ?>
                                        <img class="searchavatar " src="/uploads/<?= $organization->image?>" alt="">
                            <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-sm-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                    <div class="col-sm-8">  <!-- Отображение названии вакансии -->
                                        <p><?= $vacan->name ?></p>
                                    </div>                  <!-- /Отображение названии вакансии -->

                                    <div class="col-sm-4"> <!-- Отображение зарплаты -->
                                        <p>Зарплата: 
                                            <?php
                                                $salary = $vacan->salary;
                                                    if ($salary == NULL){
                                                        echo 'не указано';
                                                    }
                                                    else echo $salary;
                                            ?>
                                        </p>
                                    </div>                  <!-- /Отображение зарплаты -->

                            </div>

                            <div class="row ml-1"> <!-- Отображение названия организации -->
                                    <p> 
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                                if ($organization == NULL){
                                                    echo 'Не указано';
                                                }
                                                else echo $organization->name;
                                        ?>
                                    </p>
                            </div>                 <!-- /Отображение названия организации -->

                            <div class="row ml-1"> <!-- Отображение города -->
                                    <p> 
                                        <?php
                                            $c = $vacan->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            if ($city == NULL) 
                                            { 
                                                echo 'Город не указан'; 
                                            }
                                            else echo $city->name;
                                            ?>
                                    </p>
                            </div>                 <!-- /Отображение города -->
                        </div>                 <!-- /Отображение информации правее фотографии -->
                </div>

                        <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                            <p>Обязанности:
                                <?php
                                    $duties = $vacan->duties;
                                        if ($duties == NULL){
                                            echo 'Обязанности не указаны';
                                        }
                                        else echo $duties;
                                ?>
                            </p>
                        </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    
                    <div class="row ml-1"> <!-- кнопок действия и даты -->
        
                            <div class="col">
                                <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                            </div>

                            <div class="col">
                                <a href="<?= Url::toRoute(['privateoffice/vacancy_up', 'id'=>$vacan->id]); ?>">Редактировать</a>
                            </div>

                            <div class="col">
                                <?= Html::a('Удалить', ['privateoffice/vacancy_del', 'id'=>$vacan->id], [
                                    'class' => 'row blok_information',
                                    'data' => [
                                    'confirm' => 'Вы действительно хотите удалить данную вакансию?',
                                    'method' => 'post',
                                    ],
                                ]); ?>
                            </div>

                            <div class="col">
                                <p>Дата<?= $vacan->dateAdd ?></p>       
                            </div>
                    </div>
            </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
            <?php  endforeach; ?>  <!-- /Цикл для отображения вакансий -->
        </div> <!-- /Блок для отображения вакансий --> 
    </div> 
</div>  <!-- /Контейнер -->

<br>