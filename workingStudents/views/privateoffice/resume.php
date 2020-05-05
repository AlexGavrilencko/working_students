<?php


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
use kartik\date\DatePicker;

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<br>
    <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
                <div class="pole border_search padding_search">
                        <div class="text-center">
                            <h2><?= Html::encode($this->title) ?></h2>
                            <p>Вы можете составить свое резюме</p>
                        </div>

                        <div class="row justify-content-center">
                            <a href="/privateoffice/set-image" class="btn btn-rounded btngreen">Загрузите личную фотографию</a>
                        </div>

                        <br>
                            <div class="row justify-content-center">
                                <?php   
                                    $user = Yii::$app->user->identity;
                                        if($model->image): ?>
                                            <img class=" logo_user" src="/uploads/<?= $model->image?>" alt="">
                                        <?php endif; 
                                ?>
                            </div>
                        <br>

                                <?= $form->field($model, 'ShowOrHide')->radioList(array(0 => 'Показывать резюме при поиске', 1 => 
                                'Скрывать резюме при поиске',), array('labelOptions'=>array('style'=>'display:inline'), 
                                'separator'=>'&nbsp;&nbsp;&nbsp;</br>',))->label('Показать или скрыть <strong><big><span class="vop">?</span></big></strong>', ["data-toggle"=>"tooltip", 
                                "data-placement"=>"top", "title"=>"Хотите, чтобы ваше резюме отображалась всем пользователям?"]); ?>
   
                                <?= $form->field($model, 'surname')->textInput(['placeholder'=>"Ваша фамилия"]) ?>
                                
                                <?= $form->field($model, 'name')->textInput(['placeholder'=>"Ваше имя"]) ?>

                                <?= $form->field($model, 'patronymic')->textInput(['placeholder'=>"Ваше отчество"]) ?>
                        
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

                                <p class="row justify-content-center">
                                    <?= Html::a('Добавить опыт работы', ['experience_cr','res_id'=>$model->id,'or'=>'1'], ['class' => 'btn btn-rounded btngreen ml-1']) ?>
                                    <?= Html::a('Добавить образование', ['experience_cr','res_id'=>$model->id,'or'=>'0'], ['class' => 'btn btn-rounded btngreen ml-1']) ?>
                                </p>
                        
                                <?php if($model1 != null){ ?> 

                                    <div class="container-fluid">
                                            <div class="row"> <!-- отображение заголовков таблицы -->
                                                <div class="col">
                                                    <p>№</p>
                                                </div>

                                                <div class="col">
                                                    <p>Количество лет</p>
                                                </div>

                                                <div class="col">
                                                    <p>Образование\работа</p>
                                                </div>

                                                <div class="col">
                                                    <p>Наименование организации</p>
                                                </div>

                                                <div class="col">
                                                    <p>Специальность</p>
                                                </div>

                                                <div class="col">
                                                    <p>Действия</p>
                                                </div>
                                            </div>

                                        <?php foreach($model1 as $exp): ?>

                                            <?php  
                                                //$org = Organization::find()->where(['id'=>$exp->nameOrganiz])->one();
                                                $speciality = Speciality::find()->where(['id'=>$exp->speciality_id])->one();
                                                //$speciality=$speciality->name;
                                            ?>

                                                <div class="row"> <!-- отобрежение цикла -->
                                                    <div class="col">
                                                        <p><?=$exp->id?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?=$exp->dateStart?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>
                                                            <?php if($exp->StudyOrWork===0){
                                                                    echo "Образование";
                                                                }else{
                                                                    echo "Опыт работы";
                                                                }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?=$exp->nameOrganiz?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p><?=$speciality->code?><?=$speciality->name?></p>
                                                    </div>
                                                    <div class="col">
                                                        <?= Html::a('<img src="/public/img/pencil1.png" class="pencil">', ['experience_up', 'id' => $exp->id]) ?>
                                                        <?= Html::a('<img src="/public/img/trashcan1.png" class="trashcan">', ['experience_del', 'id' => $exp->id], [
                                                                    'data' => [
                                                                        'confirm' => 'Вы действительно хотите удалить эти данные?',
                                                                        'method' => 'post',
                                                                    ],
                                                                ]) ?>
                                                    </div>                
                                                </div>
                                        <?php endforeach;?>
                                    </div>
<<<<<<< HEAD
                                </div>
                                    <?php foreach($model1 as $exp): ?>
                                        <?php  
                                            //$org = Organization::find()->where(['id'=>$exp->nameOrganiz])->one();
                                            $speciality = Speciality::find()->where(['id'=>$exp->speciality_id])->one();
                                            //$speciality=$speciality->name;
                                        ?>

                                    <div class="row"> <!-- отобрежение цикла -->
                                        <div class="col">
                                            <p><?=$exp->id?></p>
                                        </div>
                                        <div class="col">
                                            <p><?=$exp->yearsS?></p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <?php if($exp->StudyOrWork===0){
                                                        echo "Образование";
                                                    }else{
                                                        echo "Опыт работы";
                                                    }
                                                ?>
                                            </p>
=======
                                <?php };?>

               
                    <div class="proj mt-4 mb-4">
                        <div class="text-center">
                            <h4>Вы можете добавить изображения своих достижений</h4>
                        </div>

                        <div class="row justify-content-center"> 
                            <?= Html::a('Добавить достижения', ['privateoffice/set-project'], ['class' => 'btn btn-rounded btngreen1']) ?>
                        </div>

                            <div class="row p-2 my-3 ">
                                
                                <?php
                                    foreach ($project as $pr): ?>
                                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 p-1">
                                            <?php if($pr->image): ?>
                                        <!--     <div class="border_project">-->
                                                    <a href="/uploads/<?= $pr->image?>" target="_blank">
                                                        <img class="img-fluid img-thumbnail" style="width: 200px; object-fit: cover;  display: block;  height: 150px;" src="/uploads/<?= $pr->image?>" alt="">
                                                    </a>
                                                    <div class="row ml-1">
                                                        <a href="<?= Url::toRoute(['privateoffice/set-project', 'id'=>$pr->id]); ?>" class='m-1 btngreen1'>Редактировать</a>
                                                        <a href="<?= Url::toRoute(['privateoffice/project_del', 'id'=>$pr->id]); ?>" class='m-1 btngreen1'>Удалить</a>
                                                    </div>
                                            <!--  </div>-->
                                            <?php endif; ?>
>>>>>>> 1525cd4c13847c1c55458d1bdacf2895cb2f93c6
                                        </div>
                                <?php  endforeach; ?>
                                </div>
                            </div>


                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                    </div>

                </div>           
               
<?php ActiveForm::end(); ?>
<br>
