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

$this->title = 'Предложение по практике';
$this->params['breadcrumbs'][] = $this->title;
//description,viewed
?>
<?php $form = ActiveForm::begin(); ?>
   <!-- <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
        <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="border_search padding_search">-->
            <br>
<style>

    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
    .max-width-100{
        max-width: 100%;
    }
a{
        color: #00a4b9dc;
        font-size: 15px;
    }
    a:hover{
        color: #003941dc;
    }

  </style>  
    <div class="site-registration">
        <div class=" text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="pole border_search31 padding_search ">
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
                    <?= $form->field($model, 'ShowOrHide')->radioList(array(1 => 'Показывать предложение по практике при поиске',
                     0 => 'Скрывать предложение по практике при поиске',), array('labelOptions'=>array('style'=>'display:inline'),
                      'separator'=>'&nbsp;&nbsp;&nbsp;</br>',))->label('Показать или скрыть <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                      "data-placement"=>"top", "title"=>"Хотите, чтобы ваша вакансия отображалась всем пользователям?"]); ?>
                    
                    <?= $form->field($model, 'name')->textInput(['placeholder'=>"Введите название предложения по практике"])->label('Название предложения по практике <strong><big><span class="vop">?</span></big></strong>', 
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
                            <p>e-mail: 
                                <?=$user->e_mail ?> 
                            </p>
                          
                            <div class="row justify-content-center"> 
                                <a href="/privateoffice/organiz" class="btn-rounded btnorange btn">Добавить данные</a>
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
                    <?= $form->field($model, 'duties')->textarea(['placeholder'=>"Введите обязанности"])->label('Обязанности <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Обязанности"]) ?>
                    <?= $form->field($model, 'requirement')->textarea(['placeholder'=>"Введите требования"])->label('Требования <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Требования "]) ?>
                    <?= $form->field($model, 'conditions')->textarea(['placeholder'=>"Введите условия"])->label('Условия <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                            "data-placement"=>"top", "title"=>"Условия"]) ?>
                            <?php
                            $category = Profstand::find()->all();
                            ?>
                            <div class="row justify-content-center py-2">
                            <select class="selectpicker m-1 profs" data-live-search="true" name="category_id" id="profs">
                                <option data-tokens="">Профстандарт</option>
                                <?php
                                foreach ($category as $category): ?>
                                    <option data-tokens="" value="<?=$category->id?>"><?=$category->name?></option>
                                <?php endforeach;?>
                            </select>
                            
                            <select class=" m-1 visibility-hidden category" data-live-search="true" name="categprof_id" id="category" >      
                            </select>
                            
                            <select  class="" data-live-search="true" name="position_id" id="position" >          
                            </select>
                            
                            
                            </div>

                    <?php $model->WorkOrPractice=1; ?>
                        <div class="row justify-content-center">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btnorange', 'name' => 'Save submit']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<br>