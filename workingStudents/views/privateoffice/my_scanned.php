<?php

use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;

$user = Yii::$app->user->identity;
foreach ($select as $sel):
if($vs==0){
    $this->title = 'Просмотренное';
    if($user->rang==10){ //условие для вывода просмотренного для студента
        var_dump($sel->id);?>
        <!-- Для отображения информации -->
    <div class="row mb-4"> 
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">     
            </div>

        <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6">  
                    <br>     
                <?php
                foreach ($vac as $vacan):    
                ?>                                <!-- Цикл для отображения вакансий -->
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                if($organization->image): ?>
                                    <img class="searchavatar " src="/uploads/<?= $organization->image?>" alt="">
                                <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                </div>                  <!-- /Отображение названии вакансии -->

                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение зарплаты -->
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

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8"><!-- Отображение названия организации -->
                                    <p> Название организации:
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                            if ($organization == NULL){
                                                echo 'Не указано';
                                            }
                                            else echo $organization->name;
                                        ?>
                                    </p>
                                </div><!-- /Отображение названия организации -->

                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение города -->
                                    <p> Город:
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
                                </div><!-- Отображение города -->
                            </div>   <!-- ROW ml-1 Отображение названия организации и города -->  
                        </div>  <!-- div /Отображение информации правее фотографии -->
                    </div>
                    <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                        <p>Добавить краткую инфу
                            <?php
                                $duties = $vacan->duties;
                                if ($duties == NULL){
                                    echo 'Обязанности не указаны';
                                }
                                else echo $duties;
                            ?>
                        </p>
                    </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    <div class="row"> <!-- кнопок действия и даты -->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <p>Дата<?= $vacan->dateAdd ?></p>       
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3"> 
                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>">
                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                            </a>
                        </div>
                    </div>
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
            <?php  endforeach; ?>  <!-- /Цикл для отображения вакансий -->
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">   
            <!-- добавить фигню сбоку -->
        </div>         

    </div>
    <?}
    if($user->rang==20){ //условие для вывода просмотренного для работодателя
        var_dump($sel->id);?>
        <div class="row justify-content-md-center mb-3"> <!-- Для отображения информации -->   
            <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">  
                <br>  
                <?php
                    foreach ($resume as $resum): 
                        if ($resum->ShowOrHide===1){
                           // var_dump($resum);
                ?>   
<!-- _______________________________________________________________________________________________ -->
        <div class="border_search3 "> <!-- Фон для отображения -->
                
                <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                if($resum->image): ?>
                                    <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                    <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение ФИО -->
                                        <p> <?= $resum->surname ?> <?= $resum->name ?> <?= $resum->patronymic ?></p>
                                    </div>                  <!-- /Отображение ФИО -->

                                    <?php  if (!Yii::$app->user->isGuest){ ?>
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php } else {?>
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                                            </div>
                                        <?php }?>
                            </div>

                            <div class="row"> <!-- Отображение желаемой доолжности и города -->
                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                    <p><?= $vacan->name ?></p>
                                </div>    
                                
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
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
                                </div>  
                            </div> <!-- /Отображение даты рождения и города-->      
                        </div> <!-- /Отображение информации правее фотографии -->
                </div>

                        <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                            <p>Последнее место работы:
                                
                            </p>
                        </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    
                    <div class="row ml-1 "> <!-- кнопок действия и даты -->
        
                            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <p>Дата<?= $vacan->dateAdd ?></p>       
                            </div>
                    </div>
            </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
                <?php  }; ?>
            <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
        </div>
    </div>
    <?}
}
else{
    $this->title = 'Избранное';
    if($user->rang==10){//условие для вывода избранного для студента
        var_dump($sel->id);?>
        <!-- Для отображения информации -->
    <div class="row mb-4"> 
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">     
            </div>

        <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6">  
                    <br>     
                <?php
                foreach ($vac as $vacan):    
                ?>                                <!-- Цикл для отображения вакансий -->
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                if($organization->image): ?>
                                    <img class="searchavatar " src="/uploads/<?= $organization->image?>" alt="">
                                <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                </div>                  <!-- /Отображение названии вакансии -->

                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение зарплаты -->
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

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8"><!-- Отображение названия организации -->
                                    <p> Название организации:
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                            if ($organization == NULL){
                                                echo 'Не указано';
                                            }
                                            else echo $organization->name;
                                        ?>
                                    </p>
                                </div><!-- /Отображение названия организации -->

                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение города -->
                                    <p> Город:
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
                                </div><!-- Отображение города -->
                            </div>   <!-- ROW ml-1 Отображение названия организации и города -->  
                        </div>  <!-- div /Отображение информации правее фотографии -->
                    </div>
                    <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                        <p>Добавить краткую инфу
                            <?php
                                $duties = $vacan->duties;
                                if ($duties == NULL){
                                    echo 'Обязанности не указаны';
                                }
                                else echo $duties;
                            ?>
                        </p>
                    </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    <div class="row"> <!-- кнопок действия и даты -->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <p>Дата<?= $vacan->dateAdd ?></p>       
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3"> 
                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>">
                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                            </a>
                        </div>
                    </div>
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
            <?php  endforeach; ?>  <!-- /Цикл для отображения вакансий -->
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">   
            <!-- добавить фигню сбоку -->
        </div>         

    </div>
   <? }
    if($user->rang==20){ //условие для вывода избранного для работодателя
        var_dump($sel->id);?>
<div class="row justify-content-md-center mb-3"> <!-- Для отображения информации -->   
            <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">  
                <br>  
                <?php
                    foreach ($resume as $resum): 
                        if ($resum->ShowOrHide===1){
                           // var_dump($resum);
                ?>   
<!-- _______________________________________________________________________________________________ -->
        <div class="border_search3 "> <!-- Фон для отображения -->
                
                <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                if($resum->image): ?>
                                    <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                    <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение ФИО -->
                                        <p> <?= $resum->surname ?> <?= $resum->name ?> <?= $resum->patronymic ?></p>
                                    </div>                  <!-- /Отображение ФИО -->

                                    <?php  if (!Yii::$app->user->isGuest){ ?>
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php } else {?>
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                                            </div>
                                        <?php }?>
                            </div>

                            <div class="row"> <!-- Отображение желаемой доолжности и города -->
                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                    <p><?= $vacan->name ?></p>
                                </div>    
                                
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
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
                                </div>  
                            </div> <!-- /Отображение даты рождения и города-->      
                        </div> <!-- /Отображение информации правее фотографии -->
                </div>

                        <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                            <p>Последнее место работы:
                                
                            </p>
                        </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                    
                    <div class="row ml-1 "> <!-- кнопок действия и даты -->
        
                            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <p>Дата<?= $vacan->dateAdd ?></p>       
                            </div>
                    </div>
            </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
                <?php  }; ?>
            <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
        </div>
    </div>
   <? }
}
endforeach; 
?>
          