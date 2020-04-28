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

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= ListView::widget([
    'dataProvider'=>$dataProvider,

])?>

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
    <div class="row "> <!-- Для поиска -->
        <div class="border_search_resume">
                    <form class="search_resume">
                        <div>
                            <div class="row">
                                <div class="col"> <!-- Выбор города -->
                                    <?php
                                        $city = Attributes::find()->where(['type'=>'city'])->all();  // получаем все города из таблицы атрибутов
                                            $items = ArrayHelper::map($city,'id','name'); // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                                $params = [
                                                    'prompt' => 'Город',
                                                    'class' => 'dropDownList',
                                                ];
                                                echo Html::dropDownList('citty', 'null', $items, $params);
                                    ?>
                                    
                                </div>


                                <div class="col"> <!-- Ввод зарплаты -->
                                    <input class="form-control btn-none " type="search" placeholder="Зарплата от">
                                </div>

                                <div class="col"> <!-- Выбор категории -->
                                    <?php
                                        
                                        $category = Attributes::find()->where(['type'=>'category'])->all();
                                        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                        $items = ArrayHelper::map($category,'id','name');
                                        $params = [
                                            'prompt' => 'Категории',
                                            'class' => 'dropDownList',
                                        ];
                                        echo Html::dropDownList('category_id', 'null', $items, $params);
                                        
                                    ?>
                                </div>

                                <div class="col-sm-4"> <!-- Ввод должности или профессии -->
                                    <input class="form-control btn-none " type="search" placeholder="Профессия">
                                </div>


            <?php  ?>
                <?php ActiveForm::end();?>
                    <?php Pjax::end(); ?> 
                        <div id="col"><?=$categoryg?> </div>  
                        
             <!-- Результаты поиска -->
            <?php
                if(isset($search1)) // проверяем существует ли переменая $search1
                {
                    // Существует - Делаем хлебные крошки для поискового запроса
                    $this->params['breadcrumbs'][] = $this->title .' - '. $search1;
                }
                else
                {
                //Не существует - Делаем хлебные крошки для обычного отображения
                $this->params['breadcrumbs'][] = $this->title ;
                }
            ?>
                <div class="col-sm-6"> 
                    <?php
                            //$org таблица организация
                            //$atr таблица со всеми справочниками
                            //$catvac все вакансии выбранной категории
                            foreach ($catvac as $vacan)
                            : 

                            if ($vacan->ShowOrHide===0){ 
                    ?>
                    <div class="border_search">    
                            <!-- результаты поиска -->
                        <div class="row">
                                <div class="col-sm-3">
                                    <!-- для изображения -->
                                    <?php
                                        $o = $vacan->organization_id;
                                        $organization = Organization::find()->where(['id'=>$o])->one();
                                        if($organization->image): ?>
                                                    <img class="searchavatar" src="/uploads/<?= $organization->image?>" alt="">
                                        <?php endif; ?>

                                <div class="col"> <!-- Кнопка для поиска -->
                                    <input type="button" class="btn btn-secondary" value="Еще фильтры" onclick="disp(document.getElementById('form1'))" />
                                </div>

                                <div class="col"> <!-- Кнопка для поиска -->
                                    <button type="submit" class="btn btn-secondary">Найти</button>

                                </div>
                            </div>
                        </div>
                        <br>

                            <div id="form1" style="display: none;">
                                <div class="row">

                                    <div class="col-sm-2"></div>

                                    <div class="col">
                                        <h4>График работы</h4>
                                        <div class="row ml-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Полный рабочий день</label>
                                            </div>
                                        </div>
                                        <div class="row ml-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Удаленная работа</label>
                                            </div>
                                        </div>
                                        <div class="row ml-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Гибкий график</label>
                                            </div>
                                        </div>
                                        <div class="row ml-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Сменный график</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                            <h4>Опыт работы</h4>
                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">без опыта</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">до 1 года</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">до 3 лет</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">до 5 лет</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">более 5 лет</label>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col">
                                            <h4>Тип занятости</h4>
                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Полная занятость</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Частичная занятость</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">вахта/переезд</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">временная работа/freelance</label>
                                                </div>
                                            </div>

                                            <div class="row ml-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">стажировка</label>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-sm-2"></div>  
                                </div>

                                <div class="row justify-content-center mt-5">                                
                                    <button type="submit" class="btn btn-secondary">Найти</button>                       
                                </div>
                            
                            </div>
                    </form>
        </div>
    </div>

    <div class="row"> <!-- Для отображения информации -->

            <div class="col-sm-3"> 
                
            </div>

            <div class="col-sm-6">  
                <br>     
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
        
                            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                            </div>

                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <p>Дата<?= $vacan->dateAdd ?></p>       
                            </div>
                    </div>
            </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
            <?php  endforeach; ?>  <!-- /Цикл для отображения вакансий -->
        </div>
    </div>
</div>
<br>