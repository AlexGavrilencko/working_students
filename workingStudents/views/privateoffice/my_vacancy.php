<?php


use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Мои вакансии';
?>
          
<br>

<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
    <div class="row">
        <div class="col-sm-2"> 
             <!-- расширенный поиск -->
        </div>


    <div class="col-sm-8">  
        <?php
            /* $city = Attributes::find()->where(['type'=>'city'])->all(); ?>         
                <? $param = ['prompt' => 'Выберите город', 'id' => 'dropDownList-city']; ?>
                <?= Html::dropDownList('city', 0, $city, $param); ?> */
                //$org таблица организация
                //$atr таблица со всеми справочниками
                //$catvac все вакансии выбранной категории
                foreach ($vac as $vacan)
                : 

                //echo $tagg;
                //$post=$vacan->article_id;
                //foreach ($article as $articles)
                //: 
                //if ($post===$articles->id){ ?>
        <div class="border_search">    
            <!-- результаты поиска -->
            <div class="row ">

                        <div class="col-sm ">
                            <!-- для изображения -->
                            <?php
                            $o = $vacan->organization_id;
                            $organization = Organization::find()->where(['id'=>$o])->one();
                            if($organization->image): ?>
                                        <img class="searchavatar " src="/uploads/<?= $organization->image?>" alt="">
                            <?php endif; ?>
                        </div>

            <div class="col-sm blok_information">
                    <!-- для описания -->
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <p><?= $vacan->name ?></p> <!-- название вакансии подгрузка из базы -->

                            <!-- $vacan->organization_id-->
                                <p>    <!-- Название организации подгрузка из базы -->
                                    <?php
                                        $o = $vacan->organization_id;
                                        $organization = Organization::find()->where(['id'=>$o])->one();
                                            if ($organization == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $organization->name;
                                    ?>
                                </p>

                                <p>    <!-- цена $vacan->salary подгрузка из базы -->
                                    <?php
                                        $salary = $vacan->salary;
                                            if ($salary == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $salary;
                                    ?>
                                </p>

                                <p>    <!-- Город $vacan->city_id подгрузка из базы -->
                                    <?php
                                        $c = $vacan->city_id;
                                        $city = Attributes::find()->where(['id'=>$c])->one();
                                        
                                            if ($city == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $city->name;
                                    ?>
                                </p>

                                <p>
                                    <?php
                                        $duties = $vacan->duties;
                                            if ($duties == NULL)
                                            {
                                                echo 'Не указано';
                                            }
                                            else echo $duties;
                                    ?>
                                </p>

                                <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->

                        </div>
                    </div>   
                </div>
                    
                <div class="col-sm ">
                    <div class="row blok_information"><a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a></div>
                    <div class="row blok_information"><a href="<?= Url::toRoute(['privateoffice/vacancy_up', 'id'=>$vacan->id]); ?>">Редактировать</a></div>
                    <div class="row blok_information"> <a href="<?= Url::toRoute(['privateoffice/vacancy_del', 'id'=>$vacan->id]); ?>">Удалить</a></div>
                    
                    
                   
                
                </div>

            </div>   
        </div>
        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
    </div>
    
    </div> 
</div> 
