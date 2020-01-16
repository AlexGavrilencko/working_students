<?php

/* @var $this yii\web\View */

use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>

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

<!-- Для вакансии -->
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
<div class="row">
        <div class="col-sm-3"> 

             <!-- расширенный поиск -->
            <div class="border_search">
                <form class="search">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <input class="form-control btn-none form-control-lg" type="search" placeholder="Поиск...">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn-none btn-lg btn btngreen">Найти</button>
                        </div>
                    </div>    
                </form>

                        <?php
                            // получаем все города из таблицы атрибутов
                            $city = Attributes::find()->where(['type'=>'city'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($city,'id','name');
                            $params = [
                                'prompt' => 'Укажите город'
                            ];
                            echo $form->field($model, 'city_id')->dropDownList($items,$params);
                        ?>

                        <?php
                            // получаем все города из таблицы атрибутов
                            $experience = Attributes::find()->where(['type'=>'experience'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($experience,'id','name');
                            $params = [
                                'prompt' => 'Укажите опыт работы'
                            ];
                            echo $form->field($model, 'experience_id')->dropDownList($items,$params);
                        ?>

                        <?php
                            // получаем все города из таблицы атрибутов
                            $employment = Attributes::find()->where(['type'=>'employment'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($employment,'id','name');
                            $params = [
                                'prompt' => 'Укажите тип занятости'
                            ];
                            echo $form->field($model, 'employment_id')->dropDownList($items,$params);
                        ?>

                        <?php
                            // получаем все города из таблицы атрибутов
                            $schedule = Attributes::find()->where(['type'=>'schedule'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($schedule,'id','name');
                            $params = [
                                'prompt' => 'Укажите график  работы'
                            ];
                            echo $form->field($model, 'schedule_id')->dropDownList($items,$params);
                        ?>
                         
                        <?= $form->field($model, 'salary')->textInput() ?>

                        <?php
                            // получаем все города из таблицы атрибутов
                                $category = Attributes::find()->where(['type'=>'category'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                $items = ArrayHelper::map($category,'id','name');
                                $params = [
                                    'prompt' => 'Укажите профобласть'
                                ];
                            echo $form->field($model, 'category_id')->dropDownList($items,$params);
                        ?>
            </div>

        </div>

<!-- здесь начинается цикл для отображения -->

    <div class="col-sm-6"> 
    <?php
        //$org таблица организация
        //$atr таблица со всеми справочниками
        //$catvac все вакансии выбранной категории
        foreach ($catvac as $vacan)
        : 

	    //echo $tagg;
	    //$post=$vacan->article_id;
	    //foreach ($article as $articles)
		//: 
		//if ($post===$articles->id){ ?>
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
                    
                </div>
                <div class="col-sm-9 ">
                    <!-- для описания -->
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p><?= $vacan->name ?></p> <!-- название вакансии подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">

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

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
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

                            </div>

                            <div class="col-6 col-sm-4">
                                <p>В избранное</p> <!-- кнопка для сохранения вакансии в избранное-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- описание $vacan->duties подгрузка из базы -->
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->
                            </div>
                        </div>
                </div>
            </div>   
        </div>
        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
        <br>
    </div>
</div> 
</div>
<br> 
<?php ActiveForm::end(); ?>
