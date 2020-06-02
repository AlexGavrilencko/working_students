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

                                <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 mt-1"> <!-- Выбор категории -->
                                    <?php
                                        $org = Organization::find()->where(['correctOrg'=>1])->all();
                                    ?>
                                    <select class="selectpicker" data-live-search="true" name="categ">
                                        <option data-tokens="">Организация</option>  
                                        <?php                           
                                            foreach ($org as $org): ?> 
                                                <option data-tokens="" value="<?=$org->id?>"><?=$org->name?></option>  
                                            <?php endforeach;?>    
                                    </select>
                                </div>
                                

                                <div class="col-6 col-sm-5 col-md-2 col-lg-3 col-xl-3 mt-1"> <!-- Кнопка для поиска -->
                                    <button type="submit" class="btn btn-secondary1">Найти</button>
                                </div>

                            </div><!-- div ROW -->

                            
                        </form>                   
                </div><!-- border_search_resume -->
        </div><!-- ROW для поиска -->
  
        

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
                                    <a href="<?= Url::toRoute(['site/complete_information_practic', 'id'=>$vacan->id]); ?>">
                                        <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                                    </a> 
                                <?php } else {?> 
                                    <a href="<?= Url::toRoute(['site/complete_information_practic', 'id'=>$vacan->id]); ?>">
                                        <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                    </a> 
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    
                                        <h5 Class="text_name_vacancy"><?= $vacan->name ?></h5>
                                   
                                </div>                  <!-- /Отображение названии вакансии -->

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
                            <a href="<?= Url::toRoute(['site/complete_information_practic', 'id'=>$vacan->id]); ?>" class="links">Подробнее о практике</a>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"> 
                            <span class="p-date" style="color: #000;"><?= $vacan->dateAdd?></span>    
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






