<?php

/* @var $this yii\web\View */

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
use app\models\Profstand;


$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
//варя переменная $vall это переменная содержащая все вакансии
?>

<style>
    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
</style>

<script>
    function disp(div) {
        if (div.style.display == "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script> 




<div class="container-fluid d-flex flex-row bd-highlight flex-column">
        <div class="row"> <!-- Для поиска -->
                <div class="border_search_resume">
                        <form class="search_resume" method="get" action="<?= Url::toRoute(['site/searchfilt'])?>">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-10 col-md-6 col-lg-65 col-xl-6 mt-1"> <!-- Ввод должности или профессии -->
                                    <input class="form-control btn-none " type="search" name="posit" placeholder="Название вакансии...">
                                </div>

                                <div class="col-12 col-sm-10 col-md-3 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->
                                    <input class="form-control btn-none " type="search" name="salaro" placeholder="Зарплата от">
                                </div>

                                <div class="col-12 col-sm-10 col-md-3 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->
                                    <input class="form-control btn-none " type="search" name="salard" placeholder="Зарплата до">
                                </div>

                                <?php
                                    $city = Attributes::find()->where(['type'=>'city'])->all();  // получаем все города из таблицы атрибутов 
                                ?>    
                                <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->                                   
                                    <select class="selectpicker" data-live-search="true" name="city">
                                        <option data-tokens="">Город</option>  
                                        <?php                           
                                            foreach ($city as $city): ?> 
                                            <option data-tokens="" value="<?=$city->id?>"><?=$city->name?></option>  
                                        <?php endforeach;?>    
                                    </select>
                                </div>

                               
                                <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 mt-1"> <!-- Выбор категории -->
                                    <?php
                                        $category = Profstand::find()->all();
                                    ?>
                                    <select class="selectpicker" data-live-search="true" name="categ">
                                        <option data-tokens="">Категория</option>  
                                        <?php                           
                                            foreach ($category as $category): ?> 
                                                <option data-tokens="" value="<?=$category->id?>"><?=$category->name?></option>  
                                            <?php endforeach;?>    
                                    </select>
                                </div>
                                
                             
                                <div class="col-6 col-sm-5 col-md-2 col-lg-3 col-xl-3 mt-1"> <!-- Кнопка для поиска -->
                                    <input type="button" class="btn btn-secondary" value="Еще фильтры" onclick="disp(document.getElementById('form1'))">
                                </div>

                                <div class="col-6 col-sm-5 col-md-2 col-lg-3 col-xl-3 mt-1"> <!-- Кнопка для поиска -->
                                    <button type="submit" class="btn btn-secondary">Найти</button>
                                </div>

                            </div><!-- div ROW -->

                            <!-- Отображения дополнительных фильтров -->
                                <div class="row justify-content-center" >
                                    <div id="form1" style="display: none;">
                                        <div class="row ml-1 mt-3" style="border-top: solid;">
                                        
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <h4>График работы</h4>
                                                <?php
                                                    $schelude = Attributes::find()->where(['type'=>'schelude'])->all();  // получаем все города из таблицы атрибутов 
                                                ?>
                                                <?php   foreach ($schelude as $sch): ?> 
                                                    <div class="row ml-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="" value="<?$sch->id?>" name="schelude">
                                                            <label class="form-check-label" for="inlineCheckbox1"><?=$sch->name?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            </div><!-- div COL -->
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <h4>Опыт работы</h4>
                                                <?php
                                                    $experience = Attributes::find()->where(['type'=>'experience'])->all();  // получаем все города из таблицы атрибутов 
                                                ?>
                                                <?php   foreach ($experience as $exp): ?> 
                                                    <div class="row ml-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="<?$exp->id?>" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1"><?=$exp->name?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            </div><!-- div COL -->
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <h4>Тип занятости</h4>
                                                <?php
                                                    $employment = Attributes::find()->where(['type'=>'employment'])->all();  // получаем все города из таблицы атрибутов 
                                                ?>
                                                <?php   foreach ($employment as $emp): ?> 
                                                    <div class="row ml-1">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="<?$emp->id?>" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1"><?=$emp->name?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            </div><!-- div COL -->
                                        </div><!-- div ROW -->
                                        <div class="row justify-content-center mt-5">                                
                                           <button type="submit" class="btn btn-secondary">Найти</button>                       
                                        </div>
                                    </div><!-- div FORM1 -->
                                </div> <!-- div row justify-content-center mt-1 -->
                            <!-- /Отображения дополнительных фильтров -->

                        </form>                   
                </div><!-- border_search_resume -->
        </div><!-- ROW для поиска -->
  
        

<!-- Для отображения информации -->
    <div class="row justify-content-md-center mb-3"> 
        <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7">  
                    <br>     
                <?php
                foreach ($vacancy as $vacan):    
                ?>                                <!-- Цикл для отображения вакансий -->
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                if($organization->image): 
                                    if ($organization->image!=NULL){?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                                <?php }; endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                </div>                  <!-- /Отображение названии вакансии -->

                                 <!-- Отображение зарплаты -->
                                <?php  if (Yii::$app->user->isGuest){ ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                    <a href="#" class="disabled" >
                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                    </a>
                                </div>
                            <?php } else {?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">
                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                    </a>
                                </div>
                            <?php }?>
                                                  <!-- /Отображение зарплаты -->
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
                            <div class="row ml-1">
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
                            <?php   
                            $exp=Attributes::find()->where(['id'=>$vacan->experience_id])->one();//опыт
                            $emp=Attributes::find()->where(['id'=>$vacan->employment_id])->one();//тип з
                        ?>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <p>Опыт<?= $exp->name ?></p>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <p>Тип занятости <?= $emp->name ?></p>
                                </div>
                            </div>
                        </div>  <!-- div /Отображение информации правее фотографии -->
                    </div>
                    <div class="row ml-1 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                        <h6>Описание:</h6>
                    </div>
                    <div class="row ml-1">
                        <p>
                            <?php
                                $duties = $vacan->description;
                                if ($duties == NULL){
                                    echo ' не указаны';
                                }
                                else echo $duties;
                            ?>
                        </p>
                    </div>                          <!-- /Отображение дополнительной информации для соискателя -->          

                    <div class="row"> <!-- кнопок действия и даты -->
                        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
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






