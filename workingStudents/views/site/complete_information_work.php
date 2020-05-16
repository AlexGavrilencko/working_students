<?php
//СТРАНИЦА просмотра резюме

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Url;
//$exp эта переменная хранит данные об опыте работы
//$educ эта переменная хранит данные об образовании
//var_dump($educ);
$this->title = 'Просмотр резюме';
?>
<?php $form = ActiveForm::begin(); ?>          
<!-- резюме -->
<div class="container-fluid d-flex flex-row bd-highlight flex-column">
<!-- Для отображения информации -->
    <div class="row justify-content-md-center mb-3"> 
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">  
                    <br>     
              
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_vacancy"> <!-- Фон для отображения -->
                    <div class="row mb-4"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php if($resum->image): ?>
                                <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <p> <?= $resum->surname ?> <?= $resum->name ?> <?= $resum->patronymic ?></p>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <p>Дата рождения <?= $resum->dateBirth ?></p>
                                    </div> 
                                </div>

                                <div class="row">
                                    <p>Желаемая должность: 
                                           
                                    </p>
                                </div>

                            <div class="row"> <!-- Отображение названия организации и города -->
                                        <?php
                                            $c = $resum->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            $obj=$resum->CareerObjective_id;
                                            $object = Attributes::find()->where(['id'=>$obj])->one();
                                            //$qal=$resum->personalQualities_id;
                                            //$qalit = Attributes::find()->where(['id'=>$qal])->all();
                                                if ($city == NULL)
                                                {
                                                    echo 'Город не указан';
                                                }
                                                else echo $city->name;
                                        ?>
                            </div>  
                        </div> <!-- div /Отображение информации правее фотографии -->
                    </div>

                   <!-- Отображение дополнительной информации для работодателя -->

                        <div class="row ml-3"> <!-- Опыт работы -->
                            <p>Навыки: <?= $exp->name ?></p> <!-- опыт подгрузка из базы -->
                        </div><!-- /Опыт работы -->

                        <div class="row ml-3"><!-- График -->
                            <p>Персональные качества <?= $emp->name ?></p> <!-- график работы подгрузка из базы -->
                        </div><!-- /График -->
                       
                    <!-- /Отображение дополнительной информации для работодателя -->


               
  <!--_________________Опыт работы отображение________________________________-->
                                <?php if($model1 != null): ?> 
                                    <div class="table-responsive-sm table-responsive-md">
                                        <table class="table table-bordered table-hover table-sm mt-3">
                                            <thead> <!--Строка с заголовками-->
                                                <tr>
                                                    <th scope="col">№</th>
                                                    <th scope="col">Количество</th>
                                                    <th scope="col">Организация</th>
                                                    <th scope="col">Должность</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                            </thead> <!--/Строка с заголовками-->
                                            <tbody> <!--Тело таблицы-->
                                            <?php foreach($model1 as $exp): ?> <!--Цыкл для отображения-->

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
                                                <?php endforeach;?> <!--/Цыкл для отображения-->
                                            </tbody> <!--/Тело таблицы-->
                                        </table>
                                    </div>      
                                <?php endif; ?>
    <!--_________________/Опыт работы отображение________________________________-->


 <!--_________________Образование отображение________________________________-->
         <?php if($model1 != null): ?> 

            <div class="table-responsive-sm table-responsive-md">
                <table class="table table-bordered table-hover table-sm mt-3">
                    <thead> <!--Строка с заголовками-->
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Организация</th>
                            <th scope="col">Должность</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead> <!--/Строка с заголовками-->
                    <tbody> <!--Тело таблицы-->
                    <?php foreach($model1 as $exp): ?> <!--Цыкл для отображения-->
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
                        <?php endforeach;?> <!--/Цыкл для отображения-->
                    </tbody> <!--/Тело таблицы-->
                </table>
            </div>      
        <?php endif; ?>

<!--_________________/Образование отображение________________________________-->


                <?php if($model1 != null): ?> 
                    <div class="proj mt-4 mb-4">
                        <div class="text-center">
                            <h4>Проекты</h4>
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
                                                        <a href="<?= Url::toRoute(['privateoffice/set-project', 'id'=>$pr->id]); ?>" class='m-1 btngreen1'>Редактировать</a>
                                                        <a href="<?= Url::toRoute(['privateoffice/project_del', 'id'=>$pr->id]); ?>" class='m-1 btngreen1'>Удалить</a>
                                                    </div>
                                            <!--  </div>-->
                                            <?php endif; ?>

                                        </div>
                                <?php  endforeach; ?>
                            </div>
                     </div>
                <?php endif; ?>

                        <div class="row ml-1"> <!-- Просмотры и дата -->
                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                    <a href="<?= Url::toRoute(['site/selected_r', 'id'=>$resum->id]); ?>">
                                    <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                        <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                        </a>
                                    </div>
                            <?php }?>

                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <p>Дата<?= $vacan->dateAdd ?></p>       
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <p>Количество просмотров</p>       
                                </div>
                        </div> <!-- /Просмотры и дата -->
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
         
        </div>

        <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?> 

    </div>
  
</div>

<?php ActiveForm::end(); ?>