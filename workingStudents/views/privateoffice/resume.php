<?php
//СТРАНИЦА составления резюме

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Attributes;
use app\models\Position;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;	
use yii\grid\GridView;
use app\models\Organization;
use app\models\Speciality;
use kartik\date\DatePicker;

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
//ShowOrHide,viewed,addinform
//поля для опыта работы years  nameOrganiz position_id
//поля для обр years  nameOrganiz speciality_id
?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script>
    function disp(div) {
        if (div.style.display == "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
    function disp1(div) {
        if (div.style.display == "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script>
<style>
    a{
        color: #00a4b9dc;
        font-size: 18px;
    }
    a:hover{
        color: #003941dc;
    }
</style>

<?php $form = ActiveForm::begin(); ?>
<br>
    <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
                <div class="pole border_search31 padding_search">
                        <div class="text-center">
                            <h2><?= Html::encode($this->title) ?></h2>
                            <p>Вы можете составить свое резюме</p>
                        </div>

                        <div class="row justify-content-center">
                            <a href="/privateoffice/set-image" class="btn btn-rounded btnorange">Загрузите личную фотографию</a>
                        </div>

                        <br>
                            <div class="row justify-content-center">
                                <?php   
                                    $user = Yii::$app->user->identity;
                                        if($model->image): ?>
                                            <img class="img-fluid img-thumbnail" style="width: 300px; object-fit: cover;  display: block;  height: 200px;"  src="/uploads/<?= $model->image?>" alt="">
                                        <?php endif; 
                                ?>
                            </div>
                        <br>

                                <?= $form->field($model,'ShowOrHide')->radioList(array(1 => 'Показывать резюме при поиске', 0 => 
                                'Скрывать резюме при поиске',), array('labelOptions'=>array('style'=>'display:inline'), 
                                'separator'=>'&nbsp;&nbsp;&nbsp;</br>',))->label('Показать или скрыть <strong><big><span class="vop">?</span></big></strong>', 
                                ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Хотите, чтобы ваше резюме отображалась всем пользователям?"]); ?>
   
                              
                                
                                <?= $form->field($model, 'surname')->textInput(['placeholder'=>"Ваша фамилия"]) ?>
                                
                                <?= $form->field($model, 'name')->textInput(['placeholder'=>"Ваше имя"]) ?>

                                <?= $form->field($model, 'patronymic')->textInput(['placeholder'=>"Ваше отчество"]) ?>

                                <p>Дата рождения:</p>
                                <input type="date" class="form-control" class="mydate" name="date" placeholder="Дата">


                        
                                <?php
                                    $user = Yii::$app->user->identity;
                                    $model->user_id=$user->id;
                                    // получаем все города из таблицы атрибутов
                                    $city = Attributes::find()->where(['type'=>'city'])->all();
                                    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                    $items = ArrayHelper::map($city,'id','name');
                                    $params = [
                                        'prompt' => 'Город'
                                    ];
                                    echo $form->field($model, 'city_id')->dropDownList($items,$params)->label('Город <strong><big><span class="vop">
                                    ?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Укажите город проживания"]);
                                ?>

                                <?= $form->field($model, 'personalQualities')->textInput()->label('Персональные качества <strong><big><span class="vop">
                                    ?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Перечислите ваши персональные качества"]) ?>
                                <p class="">Примеры: самостоятельность, стрессоустойчивость, ответственность, внимательность...</p>

                                <?php
                                    // получаем все города из таблицы атрибутов
                                    $objective = Position::find()->all();
                                    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                    $items = ArrayHelper::map($objective,'id','name','code');
                                    $params = [
                                        'prompt' => 'Желаемая должность'
                                    ];
                                    echo $form->field($model, 'CareerObjective_id')->dropDownList($items,$params)->label('Желаемая должность <strong><big><span class="vop">
                                    ?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Выберете желаемую должность"]);
                                ?>

                                    <?= $form->field($model, 'skills')->textInput()->label('Навыки <strong><big><span class="vop">
                                    ?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Перечислите ваши навыки"]) ?>
                                    
                                    <?= $form->field($model, 'addinform')->textarea()->label('Дополнительная информация <strong><big><span class="vop">
                                    ?</span></big></strong>', ["data-toggle"=>"tooltip", "data-placement"=>"top", "title"=>"Поле для дополнительной информации"]) ?>

                <!--____________________________ Опыт и образование______________________________________________________-->

                <div class="proj mt-4 mb-4">
                    <div class="text-center">
                        <h4>Образование</h4>
                    </div>
                                <div class="row justify-content-center">
                                    <input type="button" class="btn btn-rounded btnorange ml-1" value="Добавить образование" onclick="disp1(document.getElementById('form2'))">
                                </div>
                                <div id="form2" style="display: none;">
                                    <p>Получилось</p>
                                </div>
    <!--_________________Образование отображение________________________________-->
                    <?php if($model1 != null): ?> 

                        <div class="table-responsive-sm table-responsive-md">
                                        <table class="table table-bordered table-hover table-sm mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">№</th>
                                                    <th scope="col">Количество</th>
                                                    <th scope="col">Организация</th>
                                                    <th scope="col">Должность</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($model1 as $exp): 
                                                if($exp->StudyOrWork==0){?>
                                                <?php  
                                                    //$org = Organization::find()->where(['id'=>$exp->nameOrganiz])->one();
                                                    $speciality = Speciality::find()->where(['id'=>$exp->speciality_id])->one();
                                                    //$speciality=$speciality->name;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?=$exp->id?></th>
                                                    <td><?=$exp->years?></th>
                                                    <td><?=$exp->nameOrganiz?></th>
                                                    <td><?=$speciality->code?><?=$speciality->name?></th>
                                                    <td><?= Html::a('Редактировать', ['experience_up', 'id' => $exp->id]) ?>
                                                        <?= Html::a('Удалить', ['experience_del', 'id' => $exp->id], [
                                                                    'data' => [
                                                                        'confirm' => 'Вы действительно хотите удалить эти данные?',
                                                                        'method' => 'post',
                                                                    ],
                                                        ]) ?>
                                                    </th>
                                                </tr>
                                                <?php } ?>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>      
                    <?php endif; ?>

    <!--_________________/Образование отображение________________________________-->
                </div>


                <div class="proj mt-4 mb-4">   
                            <div class="text-center">
                                <h4>Опыт работы</h4>
                            </div>
                                <div class="row justify-content-center">
                                    <input type="button" class="btn btn-rounded btnorange ml-1" value="Добавить опыт работы" onclick="disp(document.getElementById('form1'))">
                                </div>

                                <div id="form1" style="display: none;">
                                        <?= $form->field($expir, 'years')->textInput(['placeholder'=>"Количество лет"]) ?>
                                        
                                        <?= $form->field($expir, 'nameOrganiz')->textInput(['placeholder'=>"Название организации"]) ?>

                                        <?= $form->field($expir, 'position_id')->textInput(['placeholder'=>"Должность"]) ?>
                                </div>
    <!--_________________Опыт работы отображение________________________________-->
                                <?php if($model1 != null): 
                                    ?> 
                                    <div class="table-responsive-sm table-responsive-md">
                                        <table class="table table-bordered table-hover table-sm mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">№</th>
                                                    <th scope="col">Количество</th>
                                                    <th scope="col">Организация</th>
                                                    <th scope="col">Должность</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($model1 as $exp): 
                                                if($exp->StudyOrWork==1){ ?>
                                                <?php  
                                                    //$org = Organization::find()->where(['id'=>$exp->nameOrganiz])->one();
                                                    $position = Position::find()->where(['id'=>$exp->position_id])->one();
                                                    //$speciality=$speciality->name;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?=$exp->id?></th>
                                                    <td><?=$exp->years?></th>
                                                    <td><?=$exp->nameOrganiz?></th>
                                                    <td><?=$position->name?></th>
                                                    <td><?= Html::a('Редактировать', ['experience_up', 'id' => $exp->id]) ?>
                                                        <?= Html::a('Удалить', ['experience_del', 'id' => $exp->id], [
                                                                    'data' => [
                                                                        'confirm' => 'Вы действительно хотите удалить эти данные?',
                                                                        'method' => 'post',
                                                                    ],
                                                        ]) ?>
                                                    </th>
                                                </tr>
                                                <?php }; endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>      
                                <?php endif; ?>
    <!--_________________/Опыт работы отображение________________________________-->
                        </div>
<!--____________________________ /Опыт и образование______________________________________________________-->   



 <!--___________________Проекты______________________________________________________-->                       
                    <div class="proj mt-4 mb-4">
                        <div class="text-center">
                            <h4>Вы можете добавить изображения своих достижений</h4>
                        </div>

                        <div class="row justify-content-center"> 
                            <?= Html::a('Добавить достижения', ['privateoffice/set-project'], ['class' => 'btn btn-rounded btnorange']) ?>
                        </div>

                            <div class="row p-2 my-3 ">
                                
                                <?php foreach ($project as $pr): ?>
                                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 p-1">
                                            <?php if($pr->image): ?>
                                        <!--     <div class="border_project">-->
                                                    <a href="/uploads/<?= $pr->image?>" target="_blank">
                                                        <img class="img-fluid img-thumbnail" style="width: 200px; object-fit: cover;  display: block;  height: 150px;" src="/uploads/<?= $pr->image?>" alt="">
                                                    </a>
                                                    <div class="row ml-1">
                                                        <a href="<?= Url::toRoute(['privateoffice/set-project', 'id'=>$pr->id]); ?>" class='m-1 links' style="font-size: 18px">Редактировать</a>
                                                        <a href="<?= Url::toRoute(['privateoffice/project_del', 'id'=>$pr->id]); ?>" class='m-1 links' style="font-size: 18px">Удалить</a>
                                                    </div>
                                            <!--  </div>-->
                                            <?php endif; ?>

                                        </div>
                                <?php  endforeach; ?>
                            </div>
                        </div>
<!--___________________/Проекты______________________________________________________--> 

                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btnorange', 'name' => 'Save submit']) ?>
                    </div>

                </div>           
               
<?php ActiveForm::end(); ?>
<br>
