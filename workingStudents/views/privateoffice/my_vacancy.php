<?php

//СТРАНИЦА Мои вакансии
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
<style>
    a{
        color: #00a4b9dc;
        font-size: 18px;
    }
    a:hover{
        color: #003941dc;
    }
</style>
<!-- Для отображения информации -->
<div class="container-fluid d-flex flex-row bd-highlight flex-column">
    <div class="row justify-content-md-center"> 
        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-8 ">  
                    <br>     
                <?php
                foreach ($vacancy as $vacan):    
                ?>                                <!-- Цикл для отображения вакансий -->
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row "> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                if ($organization->image!=null){?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                                <?php } else {?> 
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                </div>                  <!-- /Отображение названии вакансии -->

                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение зарплаты -->
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

                            <div class="row"> <!-- Отображение названия организации и города -->

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8"><!-- Отображение названия организации -->
                                    <p> Название организации:
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                            if ($organization == NULL){
                                                echo 'не указано';
                                            }
                                            else echo $organization->name;
                                        ?>
                                    </p>
                                </div><!-- /Отображение названия организации -->

                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение города -->
                                    <p> Город:
                                        <?php
                                            $c = $vacan->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            if ($city == NULL) 
                                            { 
                                                echo 'не указан'; 
                                            }
                                            else echo $city->name;
                                        ?>
                                    </p>
                                </div><!-- Отображение города -->
                            </div>   <!-- ROW ml-1 Отображение названия организации и города -->  
                        </div>  <!-- div /Отображение информации правее фотографии -->
                    </div>
                    <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                        <h6>Описание:</h6>
                    </div>
                    <div class="row ml-3">
                        <p>
                            <?php
                                $duties = $vacan->description;
                                if ($duties == NULL){
                                    echo ' не указаны';
                                }
                                else echo $duties;
                            ?>
                        </p>
                    </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    <div class="row justify-content-md-center"> <!-- кнопок действия и даты -->
                            <div class="col-5 col-sm-5 col-md-3 col-lg-3 col-xl-3 ">
                                <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                            </div>

                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                <a href="<?= Url::toRoute(['privateoffice/vacancy_up', 'id'=>$vacan->id]); ?>">Редактировать</a>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <?= Html::a('Удалить', ['privateoffice/vacancy_del', 'id'=>$vacan->id], [
                                    
                                    'data' => [
                                    'confirm' => 'Вы действительно хотите удалить данную вакансию?',
                                    'method' => 'post',
                                    ],
                                ]); ?>
                            </div>

                            <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-3">
                                <p>Дата<?= $vacan->dateAdd ?></p>       
                            </div>
                    </div>
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
            <?php  endforeach; ?>  <!-- /Цикл для отображения вакансий -->
            
               
           
        </div>
                <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?> 
    </div>
    <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
           
</div>