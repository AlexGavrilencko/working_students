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

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Блок для отображения заголовков -->
    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row">
            <div class="col-sm-3 text-center"> 
                <!-- расширенный поиск -->
                <h3>Расширенный поиск</h3>
            </div>

            <div class="col-sm-6 text-center"> 
                <h3>Результаты поиска</h3>
            </div>
        </div>
    </div>
<!-- /Блок для отображения зоголовков (конец) -->    

<!-- Блок для отображения расширеного поиска и вывода резюме -->
    <div class="container-fluid d-flex flex-row bd-highlight flex-column">
        <div class="row">

            <!-- Расширенный поиск -->
            <div class="col-sm-3"> 
                <div class="border_search">
                    <!-- Отображения поиска по слову -->
                    <form class="search">
                        <div class="row no-gutters align-items-center">
                            <div class="col"> <!-- Поле для ввода слова или фразы -->
                                <input class="form-control btn-none form-control-lg" type="search" placeholder="Поиск...">
                            </div>

                            <div class="col-auto"> <!-- кнопка для поика -->
                                <button type="submit" class="btn-none btn-lg btn btngreen">Найти</button>
                            </div>
                        </div>    
                    </form>
                    <!-- /Отображение поиска по слову (конец) -->

                    <!-- отображение выпадающих списков (фильтры) -->
                    <?php //отображение выпадающего спика с городами
                        // получаем все города из таблицы атрибутов
                        $city = Attributes::find()->where(['type'=>'city'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($city,'id','name');
                                $params = [
                                    'prompt' => 'Укажите город',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('citty', 'null', $items, $params);
                            //echo $form->field($model, 'city_id')->dropDownList($items,$params);
                    ?>

                    <?php //отображение выпадающего списка с профобластью
                        // получаем профобласть из таблицы атрибутов
                        $category = Attributes::find()->where(['type'=>'category'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($category,'id','name');
                                $params = [
                                    'prompt' => 'Укажите профобласть',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('cat', 'null', $items, $params);
                    ?>

                    <?php //отображение выпадающего списка с опытом работы
                        // получаем опыт работы из таблицы атрибутов
                        $experience = Attributes::find()->where(['type'=>'experience'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($experience,'id','name');
                                $params = [
                                    'prompt' => 'Укажите опыт работы',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('experience', 'null', $items, $params);
                           // echo $form->field($model, 'experience_id')->dropDownList($items,$params);
                    ?>

                    <?php //отображение выпадающего списка с типом занятости
                        // получаем тип занятости из таблицы атрибутов
                        $employment = Attributes::find()->where(['type'=>'employment'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($employment,'id','name');
                                $params = [
                                    'prompt' => 'Укажите тип занятости',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('employment', 'null', $items, $params);
                            //echo $form->field($model, 'employment_id')->dropDownList($items,$params);
                    ?>

                    <?php //отображение выпадающего списка с графиком работы
                        // получаем график работы из таблицы атрибутов
                        $schedule = Attributes::find()->where(['type'=>'schedule'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($schedule,'id','name');
                                $params = [
                                    'prompt' => 'Укажите график работы',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('schedule', 'null', $items, $params);
                           // echo $form->field($model, 'schedule_id')->dropDownList($items,$params);
                    ?>
                     <!-- /отображение выпадающих списков (фильтры) (конец) -->   

                    
                </div>
            </div>
            <!-- /Расширенный поиск (конец) -->


            <div class="col-sm-6">  
                <!-- здесь начинается цикл для отображения -->
                <?php
                    foreach ($resume as $resum): 
                        if ($resum->ShowOrHide===0){
                ?>

                <div class="border_search">     
                    <!-- результаты поиска -->
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- для изображения -->
                            <?php
                                if($resum->image): ?>
                                <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-9 ">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col-12 col-md-8">
                                <!-- ФИО -->
                                    <p><?= $resum->name ?> <?= $resum->surname ?></p> <!-- имя и фамилия подгрузка из базы -->
                                </div>

                                <div class="col-6 col-sm-4">
                                <a href="<?= Url::toRoute(['site/selected_r', 'id'=>$resum->id]); ?>">В избранное</a> <!-- кнопка для сохранения вакансии в избранное-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p>    <!-- Город $resum->city_id подгрузка из базы -->
                                        <?php
                                            $c = $resum->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            $obj=$resum->CareerObjective_id;
                                            $object = Attributes::find()->where(['id'=>$obj])->one();
                                                if ($city == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $city->name;
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p><?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p><?= $object->name ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p><?= $resum->skills ?></p> <!-- навыки skills подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-8">
                                    <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                                </div>

                                <div class="col-6 col-sm-4">
                                    <p><?= $resum->dateAdd ?></p> <!-- дата подгрузка из базы -->
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <?php  }; ?>
                    <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
                    
            </div>
        </div>
    </div> 

