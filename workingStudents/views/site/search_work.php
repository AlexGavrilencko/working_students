<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use app\models\Position;

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
</style>

<div class="container-fluid d-flex flex-row bd-highlight flex-column">
            <div class="row justify-content-center"> <!-- Для поиска -->
                <div class="border_search_resume" style=" border-color: #00a4b9dc;">
                    <form class="search_resume" >
                        <div class="row justify-content-center">

                                <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6 mt-1"> <!-- Ввод должности или профессии -->
                                    <input class="form-control btn-none " type="search" placeholder="Профессия">
                                </div>
                                <div class="col-12 col-sm-10 col-md-3 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->
                                <input class="form-control btn-none " type="search" placeholder="Зарплата от">
                            </div>
                            <div class="col-12 col-sm-10 col-md-3 col-lg-3 col-xl-3 mt-1"> <!-- Ввод зарплаты -->
                                    <input class="form-control btn-none " type="search" name="salard" placeholder="Зарплата до">
                            </div>



                            <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 mt-1"> <!-- Выбор города -->
                                <?php
                                    $city = Attributes::find()->where(['type'=>'city'])->all();  // получаем все города из таблицы атрибутов 
                                ?>
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
                                        $category = Attributes::find()->where(['type'=>'category'])->all();
                                    ?>
                                    <select class="selectpicker" data-live-search="true" name="categ">
                                        <option data-tokens="">Категория</option>  
                                        <?php                           
                                            foreach ($category as $category): ?> 
                                                <option data-tokens="" value="<?=$category->id?>"><?=$category->name?></option>  
                                            <?php endforeach;?>    
                                    </select>
                            </div>

                        <!-- <div class="col-sm-2">  Для выбора стажа 

                            </div>-->
                            <div class="col-12 col-sm-10 col-md-4 col-lg-6 col-xl-6 mt-1"> <!-- Кнопка для поиска -->
                                <button type="submit" class="btn btn-secondary1 mb-1">Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



    <div class="row justify-content-md-center mb-3"> <!-- Для отображения информации -->   
        <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7">  
                <br>  
                <?php
                    foreach ($resump as $resum): 
                        if ($resum->ShowOrHide===1){
                           // var_dump($resum);
                ?>   
<!-- _______________________________________________________________________________________________ -->
            <div class="border_search3 "> <!-- Фон для отображения -->
                
                <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                                <?php
                                    $pos=Position::find()->where(['id'=>$resum->CareerObjective_id])->one();
                                if ($resum->image!=null){?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $resum->image?>" alt="">
                                <?php } else {?> 
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">
                                    <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение ФИО -->
                                        <h6 style="color: #00a4b9dc;"> <?= $resum->surname ?> <?= $resum->name ?> <?= $resum->patronymic ?></h6>
                                    </div>                  <!-- /Отображение ФИО -->

                                    <?php  if (!Yii::$app->user->isGuest){ ?>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php } else {?>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                            </div>
                                        <?php }?>
                            </div>

                            <div class="row"> <!-- Отображение желаемой доолжности и города -->
                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                    <p>Желаемая должность: <?= $pos->name ?></p>
                                </div>    
                                
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <p> Город
                                        <?php
                                            $c = $resum->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            if ($city == NULL) 
                                            { 
                                                echo 'не указан'; 
                                            }
                                            else echo $city->name;
                                            ?>
                                    </p>
                                </div>  
                            </div> <!-- /Отображение даты рождения и города-->      
                        </div> <!-- /Отображение информации правее фотографии -->
                </div>

                        <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                            <p>Персональные качества:
                                <?= $resum->personalQualities?>
                            </p> 
                        </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                        <div class="row ml-3 mt-3"> <!-- -->
                            <p>Доп инфа:
                                <?= $resum->addinform?>
                            </p> 
                        </div>  
                    
                    <div class="row ml-1 "> <!-- кнопок действия и даты -->
        
                            <div class="col-8 col-sm-8 col-md-10 col-lg-10 col-xl-10">
                                <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>" class="links">Подробнее о резюме</a>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <p>Дата<?= $resum->dateAdd ?></p>       
                            </div>
                    </div>
            </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
                <?php  }; ?>
            <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
           
               
            
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