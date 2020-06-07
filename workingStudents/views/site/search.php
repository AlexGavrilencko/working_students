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
a{
        color: #00a4b9dc;
        font-size: 15px;
    }
    a:hover{
        color: #003941dc;
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
        <div class="row justify-content-center"> <!-- Для поиска -->
                <div class="border_search_resume" style=" border-color: #e5e5e5;">
                        <form class="search_resume" method="get" action="<?= Url::toRoute(['site/searchfilt'])?>">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6 mt-1"> <!-- Ввод должности или профессии -->
                                    <input class="form-control btn-none " type="search" name="posit" placeholder="Название вакансии...">
                                </div>

                                <div class="col-12 col-sm-10 col-md-3 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->
                                    <input class="form-control btn-none " type="search" name="salaro" placeholder="Зарплата от">
                                </div>

                                <div class="col-12 col-sm-10 col-md-3 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->
                                    <input class="form-control btn-none " type="search" name="salard" placeholder="Зарплата до">
                                </div>

                            </div>

                            <div class="row justify-content-center py-2">
                                <?php
                                $category = Profstand::find()->all();
                                ?>
                                <select class="selectpicker m-1 profs" data-live-search="true" name="categ" id="profs">
                                    <option data-tokens="">Профстандарт</option>
                                    <?php
                                    foreach ($category as $category): ?>
                                        <option data-tokens="" value="<?=$category->id?>"><?=$category->name?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class=" m-1 visibility-hidden category" data-live-search="true" name="categ_pr" id="category" >
                                    <option data-tokens="">Категория</option>

                                </select>

                                <select class=" m-1 visibility-hidden position" data-live-search="true" name="position" id="position" >
                                    <option data-tokens="">Позиция</option>
                                </select>
                            </div>


                            <div class="row justify-content-center">


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




                             
                                <div class="col-6 col-sm-5 col-md-2 col-lg-2 col-xl-3 mt-1"> <!-- Кнопка для поиска -->
                                    <input type="button" class="btn btn-secondary1" value="Фильтры" onclick="disp(document.getElementById('form1'))">
                                </div>

                                <div class="col-6 col-sm-5 col-md-2 col-lg-2 col-xl-3 mt-1"> <!-- Кнопка для поиска -->
                                    <button type="submit" class="btn btn-secondary1">Найти</button>
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
                                                    <input type="checkbox" name="schelude[]" id="schelude" value="<?=$sch->id?>"><?=$sch->name?><Br>
                                                    
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
                                                            <input type="checkbox" name="exper[]" id="exper" value="<?=$exp->id?>"><?=$exp->name?><Br>
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
                                                            <input type="checkbox" name="employ[]" id="employ" value="<?=$emp->id?>"><?=$emp->name?><Br>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            </div><!-- div COL -->
                                        </div><!-- div ROW -->
                                        
                                    </div><!-- div FORM1 -->
                                </div> <!-- div row justify-content-center mt-1 -->
                            <!-- /Отображения дополнительных фильтров -->

                        </form>                   
                </div><!-- border_search_resume -->
        </div><!-- ROW для поиска -->
        <?php 
        if($cityr===null){
            $city="";
        }
        if($categ===null){
            $categ="";
        }
        if($posname===null){
            $posname="";
        }
        if(($cityr!="")||($categ!="")||($posname!="")){
            $z=" по запросу : ";
            $d="; ";
        }
        else{
            $z="";
            $d="";
        }
        ?>
        
        <div class="mt-4" style="margin-left: 4%;">
            <h4 Class="text_name_vacancy">Найдено <?=$count?> вакансий <?=$z?><?=$posname?><?=$d?><?=$cityr->name?><?=$d?><?=$categ->name?></h4>
        </div>
<!-- Для отображения информации -->
    <div class="row justify-content-md-center mb-3"> 
        <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7">  
                    <br>     
                <?php
                foreach ($vacancy as $vacan):
                    if ($vacan->ShowOrHide===1){    
                ?>                                <!-- Цикл для отображения вакансий -->
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                if ($organization->image!=null){?>
                                     <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">
                                        <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                                    </a>
                                <?php } else {?>
                                    <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>"> 
                                        <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                    </a>
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    <a href="<?= Url::toRoute(['site/org_vacancy','id'=>$organization->id]) ?>">
                                        <h5 Class="text_name_vacancy"><?= $vacan->name ?></h5>
                                    </a>
                                </div>                  <!-- /Отображение названии вакансии -->

                                 <!-- Отображение зарплаты -->
                                <?php  if (Yii::$app->user->isGuest){ ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                    <a href="#" class="disabled" >
                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                    </a>
                                </div>
                            <?php } else {?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">
                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                    </a>
                                </div>
                            <?php }?>
                                                  <!-- /Отображение зарплаты -->
                            </div>

                            <div class="row"> <!-- Отображение названия организации и города -->

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8"><!-- Отображение названия организации -->
                                    <a href="<?= Url::toRoute(['site/org_vacancy','id'=>$organization->id]) ?>" style=" color: #000;"> 
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                            echo $organization->name;
                                        ?>
                                    </a>
                                </div><!-- /Отображение названия организации -->

                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение города -->
                                    <p>
                                        <?php
                                            $c = $vacan->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            echo $city->name;
                                        ?>
                                    </p>
                                </div><!-- Отображение города -->
                            </div>   <!-- ROW ml-1 Отображение названия организации и города --> 
                            
                            <?php   
                            $exp=Attributes::find()->where(['id'=>$vacan->experience_id])->one();//опыт
                            $emp=Attributes::find()->where(['id'=>$vacan->employment_id])->one();//тип з
                        ?>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                    <p><?= $exp->name ?></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <p><?= $emp->name ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
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
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>" class="links">Подробнее о вакансии</a>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <span class="p-date" style="color: #000;"><?= $vacan->getDate();?></span>       
                        </div>
                    </div>
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
            <?php }  endforeach; ?>  <!-- /Цикл для отображения вакансий -->
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

<script>

</script>






