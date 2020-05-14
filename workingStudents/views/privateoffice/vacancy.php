<?php
//СТРАНИЦА составления вакансии
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use app\models\Position;
use app\models\Profstand;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Вакансия';
$this->params['breadcrumbs'][] = $this->title;
//description,viewed
?>
<?php $form = ActiveForm::begin(); ?>
   <!-- <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
        <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="border_search padding_search">-->
            <br>
    <div class="site-registration">
        <div class=" text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="pole border_search padding_search ">
                <div class="form">
                    <div class="text-center">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Пожалуйста, заполните все поля:</p>
                    </div>
                    <?php   
                        $user = Yii::$app->user->identity;
                        $userid=$user->id;
                        $model->user_id=$userid;
                    ?>
                    <?= $form->field($model, 'ShowOrHide')->radioList(array(0 => 'Показывать вакансию при поиске',
                     1 => 'Скрывать вакансию при поиске',), array('labelOptions'=>array('style'=>'display:inline'),
                      'separator'=>'&nbsp;&nbsp;&nbsp;</br>',))->label('Показать или скрыть <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                      "data-placement"=>"top", "title"=>"Хотите, чтобы ваша вакансия отображалась всем пользователям?"]); ?>
                    
                    <?= $form->field($model, 'name')->textInput(['placeholder'=>"Введите название вакансии"])->label('Название вакансии <strong><big><span class="vop">?</span></big></strong>', 
                    ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Название вакансии/должности, которую вы хотите предложить пользователю"]); ?>
                    <?php 
                        $org = Organization::find()->where(['user_id'=>$user->id])->one();
                        $city_id = Attributes::find()->where(['id'=>$org->city_id])->one();
                        $city=$city_id->name;
                    ?>

                    <?= $form->field($model, 'description')->textarea(['placeholder'=>"Введите описание"])->label('Описание <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Это описание будут видеть при поиске вакансий"]) ?>

                    <div class="date_org">
                            <p class="text-center">Данные о вашей организации</p>                       
                            <p>Название организации:
                                <?  if ($org->name == NULL){
                                        echo 'Не указано';
                                    }
                                    else echo $org->name;
                                ?>  
                            </p>
                            <p>Город:  
                                <?  if ($city == NULL){
                                        echo 'Не указано';
                                    }
                                    else echo $city;
                                ?>
                            </p>
                            <p>Адрес:
                                <?  if ($org->adres == NULL){
                                        echo 'Не указано';
                                    }
                                    else echo $org->adres;
                                ?>
                            </p>
                            <p>ИНН:  
                                <?  if ($org->inn == NULL){
                                        echo 'Не указано';
                                    }
                                    else echo $org->inn;
                                ?>
                            </p>
                            <p>ОГРН:
                                <?  if ($org->ogrn == NULL){
                                        echo 'Не указано';
                                    }
                                    else echo $org->ogrn;
                                ?>  
                            </p>
                            <div class="row justify-content-center"> 
                                <a href="/privateoffice/organiz" class="btn-rounded btn-sm btngreen1 btn">Добавить данные</a>
                            </div>
                    </div>
                    
                    <br>

                    <?php
                            // получаем все города из таблицы атрибутов
                            $city = Attributes::find()->where(['type'=>'city'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($city,'id','name');
                            $params = [
                                'prompt' => 'Город'
                            ];
                            echo $form->field($model, 'city_id')->dropDownList($items,$params)->label('Город <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Укажите город"]);
                        ?>
                    <?php
                            // получаем все города из таблицы атрибутов
                            $experience = Attributes::find()->where(['type'=>'experience'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($experience,'id','name');
                            $params = [
                                'prompt' => 'Опыт работы'
                            ];
                            echo $form->field($model, 'experience_id')->dropDownList($items,$params)->label('Опыт работы <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Укажите какой опыт работы нужен для вашей вакансии"]);
                        ?>
                    <?php
                            // получаем все города из таблицы атрибутов
                            $employment = Attributes::find()->where(['type'=>'employment'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($employment,'id','name');
                            $params = [
                                'prompt' => 'Тип занятости'
                            ];
                            echo $form->field($model, 'employment_id')->dropDownList($items,$params)->label('Тип занятости <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Тип занятости для вакансии"]);
                        ?>
                    <?php
                            // получаем все города из таблицы атрибутов
                            $schedule = Attributes::find()->where(['type'=>'schedule'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($schedule,'id','name');
                            $params = [
                                'prompt' => 'График  работы'
                            ];
                            echo $form->field($model, 'schedule_id')->dropDownList($items,$params)->label('График работы <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"График работы"]);
                        ?>
                    <?= $form->field($model, 'salary')->textInput(['placeholder'=>"Введите заработную плату"])->label('Заработная плата <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Заработная плата"]) ?>
                    <?php
                            // получаем все города из таблицы атрибутов
                            $position = Position::find()->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($position,'id','name','code');
                            $params = [
                                'prompt' => 'Укажите должность'
                            ];
                            echo $form->field($model, 'position_id')->dropDownList($items,$params)->label('Должность <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Должность"]);
                        ?>
                    <?= $form->field($model, 'duties')->textInput(['placeholder'=>"Введите обязанности"])->label('Обязанности <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Обязанности"]) ?>
                    <?= $form->field($model, 'requirement')->textInput(['placeholder'=>"Введите требования"])->label('Требования <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Требования "]) ?>
                    <?= $form->field($model, 'conditions')->textInput(['placeholder'=>"Введите условия"])->label('Условия <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Условия"]) ?>
                    <?php
                            // получаем все города из таблицы атрибутов
                            $category = Profstand::find()->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($category,'id','name','code');
                            $params = [
                                'prompt' => 'Укажите профобласть'
                            ];
                            echo $form->field($model, 'category_id')->dropDownList($items,$params)->label('Профобласть <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Профобласть к которой отностится вакансия"]);
                        ?>
                    <?= $form->field($model, 'WorkOrPractice')->radioList(array(0 => 'Предложение по работе', 1 => 'Предложение по практике',), array('labelOptions'=>array('style'=>'display:inline'), 'separator'=>'&nbsp;&nbsp;&nbsp;</br>',)); ?>
                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btn-sm btngreen', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<br>