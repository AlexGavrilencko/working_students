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
if(isset($search)) // проверяем существует ли переменая $search1
{
    // Существует - Делаем хлебные крошки для поискового запроса
    $this->params['breadcrumbs'][] = $this->title .' - '. $search;
}
else
{
    //Не существует - Делаем хлебные крошки для обычного отображения
    $this->params['breadcrumbs'][] = $this->title ;
}
            

?>

<?= ListView::widget([
    'dataProvider'=>$dataProvider,

])?>
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
            <div class="col-sm-3 border_advanced_search"> 
             <!-- расширенный поиск -->
                 <!--<br>    
                     <form class="search">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <input class="form-control btn-none form-control-lg advanced_search" type="search" placeholder="Поиск...">
                            </div> 
                            <div class="col-auto">
                                <button type="submit" class="btn-none btn btngreen advanced_search_sub">Найти</button>
                            </div>        
                        </div>
                    </form>  -->   
             
                <?php 
                    Pjax::begin(['id' => 'driverPjax']);
                    $form = ActiveForm::begin(['options' => ['data-pjax' => true]]);
                ?>
                <br>

                <div class="col-12  mr_seach">
                    <?php
                        //Данные из таблицы, подготовка данных для данных ГОРОД, а так же вывод в список
                        $city = Attributes::find()->where(['type'=>'city'])->all();
                        $items = ArrayHelper::map($city,'id','name');
                        $param = [
                            'prompt' => 'Укажите город',
                            'class' => 'dropDownList',                         
                        ];
                        echo Html::dropDownList('citty', 'null', $items, $param);
                        
                    ?>
                </div>       
        
                <div class="col-12 mr_seach">
                    <?php
                        $exp = Attributes::find()->where(['type'=>'experience'])->all();
                        $items = ArrayHelper::map($exp,'id','name');
                        $param = [
                            'prompt' => 'Укажите опыт работы',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('exp', 'null', $items, $param);
                    ?>
                </div> 
      
                <div class="col-12  mr_seach">
                    <?php
                        $emp = Attributes::find()->where(['type'=>'employment'])->all();
                        $items = ArrayHelper::map($emp,'id','name');
                        $param = [
                            'prompt' => 'Укажите тип занятости',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('emp', 'null', $items, $param);
                    ?>
                </div> 
        
                <div class="col-12  mr_seach">
                    <?php
                        $sch = Attributes::find()->where(['type'=>'schedule'])->all();
                        $items = ArrayHelper::map($sch,'id','name');
                        $param = [
                            'prompt' => 'Укажите график  работы',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('sch', 'null', $items, $param);
                    ?>
                </div> 

                <div class="col-12  mr_seach">
                    <?php
                        $obj = Attributes::find()->where(['type'=>'objective'])->all();
                        $items = ArrayHelper::map($obj,'id','name');
                        $param = [
                            'prompt' => 'Укажите должность',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('obj', 'null', $items, $param);
                    ?>
                </div>

                <div class="col-12  mr_seach">
                    <?php  
                        $category = Attributes::find()->where(['type'=>'category'])->all();
                        $items = ArrayHelper::map($category,'id','name');
                        $param = [
                            'prompt' => 'Укажите профобласть',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('categoryg', $idc, $items, $param);
                    ?>
                </div>

                <div class="col-12 mr_seach">
                    <?php
                        $org = Organization::find()->all();
                        $items = ArrayHelper::map($org,'id','name');
                        $param = [
                            'prompt' => 'Доступные организации',
                            'class' => 'dropDownList',   
                        ];  
                        echo Html::dropDownList('org', $idc, $items, $param);
                    ?>
                </div>   
            </div>

            <?php  ?>
                <?php ActiveForm::end();?>
                    <?php Pjax::end(); ?> 
                        <div id="col"><?=$categoryg?> </div>  
                        
             <!-- Результаты поиска -->
            
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
                                        <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">В избранное</a>
                                         <!-- кнопка для сохранения вакансии в избранное-->
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
                    <?php  }; ?>
                        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
                </div>         
        </div>
    </div> 



