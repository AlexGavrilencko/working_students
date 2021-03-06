<?php
//СТРАНИЦА просмотра резюме

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use app\models\Speciality;
use app\models\User;
use app\models\Position;
use app\models\Experience;
use yii\helpers\Url;
//$exp !!!!!!!!!!!    эта переменная хранит данные об опыте работы
//$educ !!!!!!!!!!!!!    эта переменная хранит данные об образовании

$this->title = 'Просмотр резюме';
?>
<?php $form = ActiveForm::begin(); ?>          
<!-- резюме -->
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
<div class="container-fluid d-flex flex-row bd-highlight flex-column">
<!-- Для отображения информации -->
    <div class="row justify-content-md-center mb-3"> 
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">  
                    <br>     
              
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row mb-4"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php if ($resum->image!=null){?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $resum->image?>" alt="">
                                <?php } else {?> 
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                <div class="row">
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                        <h5 Class="text_name_vacancy"><?=$resum->surname?> <?=$resum->name?> <?=$resum->patronymic?></h5>
                                    </div>
                                   
                                    <?php if(Yii::$app->user->identity){ ?>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="<?= Url::toRoute(['site/selected_r', 'id'=>$resum->id]); ?>">
                                            <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                        </div>
                                    <?php  } else {?>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php }?>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                        <p>Дата рождения <?= $resum->dateBirth ?></p>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <?php
                                            $u=User::find()->where(['id'=>$resum->user_id])->one();
                                            $pos=Position::find()->where(['id'=>$resum->CareerObjective_id])->one();
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
                                </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                        <p>Желаемая должность: 
                                            <?= $pos->name ?>
                                           </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                            <p>e-mail: 
                                                <?= $u->e_mail ?>
                                           </p>
                                        </div>
                                    </div>
                                  
                         
                        </div> <!-- div /Отображение информации правее фотографии -->
                    </div>

                   <!-- Отображение дополнительной информации для работодателя -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Навыки:</h6>
                        </div>                        
                        <div class="row ml-3"> 
                            <?= $resum->skills ?>
                        </div>

                        <div class="row ml-1 mt-3"> 
                            <h6>Персональные качества:</h6>
                        </div>
                        <div class="row ml-3">
                            <?= $resum->personalQualities?> 
                        </div>

                        <div class="row ml-1 mt-3"> 
                            <h6>Дополнительная информация:</h6>
                        </div>
                        <div class="row ml-3">
                            <?= $resum->addinform?> 
                        </div>
                       
                    <!-- /Отображение дополнительной информации для работодателя -->


               

  <!--_________________Опыт работы отображение________________________________-->
                            <?php if($exp != null): ?> 
                                <div class="proj mt-4 mb-4">
                                    <div class="text-center">
                                        <h4 Class="text_name_vacancy">Опыт работы</h4>
                                    </div>
                                    <div class="table-responsive-sm table-responsive-md">
                                        <table class="table table-bordered table-hover table-sm mt-3">
                                            <thead> <!--Строка с заголовками-->
                                                <tr>
                                                    <th scope="col">№</th>
                                                    <th scope="col">Время работы</th>
                                                    <th scope="col">Организация</th>
                                                    <th scope="col">Должность</th>
                                                </tr>
                                            </thead> <!--/Строка с заголовками-->
                                            <tbody> <!--Тело таблицы-->
                                            <?php foreach($exp as $exps): ?> <!--Цыкл для отображения-->

                                                <?php  
                                                    //$org = Organization::find()->where(['id'=>$exp->nameOrganiz])->one();
                                                    $position = Position::find()->where(['id'=>$exps->position_id])->one();
                                                    //$speciality=$speciality->name;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?=$exps->id?></th>
                                                    <td><?=$exps->years?></th>
                                                    <td><?=$exps->nameOrganiz?></th>
                                                    <td><?=$position->name?></th>
                                                </tr>
                                                <?php endforeach;?> <!--/Цыкл для отображения-->
                                            </tbody> <!--/Тело таблицы-->
                                        </table>
                                    </div>
                                </div>     
                            <?php endif; ?>
    <!--_________________/Опыт работы отображение________________________________-->


 <!--_________________Образование отображение________________________________-->
     
         <?php if($educ != null): ?> 
            <div class="proj  mt-4 mb-4">
                    <div class="text-center">
                        <h4 Class="text_name_vacancy">Образование</h4>
                    </div>
            <div class="table-responsive-sm table-responsive-md">
                <table class="table table-bordered table-hover table-sm mt-3">
                    <thead> <!--Строка с заголовками-->
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Время обучения</th>
                            <th scope="col">Организация</th>
                            <th scope="col">Должность</th>
                        </tr>
                    </thead> <!--/Строка с заголовками-->
                    <tbody> <!--Тело таблицы-->
                    <?php foreach($educ as $educs): ?> <!--Цыкл для отображения-->
                        <?php  
                            //$org = Organization::find()->where(['id'=>$exp->nameOrganiz])->one();
                            $speciality = Speciality::find()->where(['id'=>$educs->speciality_id])->one();
                            //$speciality=$speciality->name;
                        ?>
                        <tr>
                            <th scope="row"><?=$educs->id?></th>
                            <td><?=$educs->years?></th>
                            <td><?=$educs->nameOrganiz?></th>
                            <td><?=$speciality->code?><?=$speciality->name?></th>
                        </tr>
                        <?php endforeach;?> <!--/Цыкл для отображения-->
                    </tbody> <!--/Тело таблицы-->
                </table>
            </div>     
            </div>   
        <?php endif; ?>

<!--_________________/Образование отображение________________________________-->


                <?php if($project!= null): ?> 
                    <div class="proj mt-4 mb-4">
                        <div class="text-center">
                            <h4 Class="text_name_vacancy">Проекты</h4>
                        </div>

                        <div class="row p-2 my-3 ">
                                
                                <?php foreach ($project as $pr): ?>
                                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 p-1">
                                            <?php if($pr->image): ?>
                                        <!--     <div class="border_project">-->
                                                    <a href="/uploads/<?= $pr->image?>" target="_blank">
                                                        <img class="img-fluid img-thumbnail" style="width: 200px; object-fit: cover;  display: block;  height: 150px;" src="/uploads/<?= $pr->image?>" alt="">
                                                    </a>
                                        <!--  </div>-->
                                            <?php endif; ?>

                                        </div>
                                <?php  endforeach; ?>
                            </div>
                     </div>
                <?php endif; ?>

                        <div class="row "> <!-- Просмотры и дата -->
                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"> 
                                    <a href="<?= Url::toRoute(['site/response', 'id'=>$resum->id]); ?>">Откликнуться на резюме</a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"> 
                                        <a href="#" class="disabled">Откликнуться на резюме</a>
                                    </div>
                            <?php }?>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <span class="p-date" style="color: #000;">Количество просмотров <?= $resum->viewed ?></span>     
                            </div>
                        </div> <!-- /Просмотры и дата -->
                         <!-- /Отображение дополнительной информации для соискателя -->
 <br>
                        <div class="row">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"> 
                                <span class="p-date" style="color: #000;">Дата добавления <?= $resum->getDate();?></span>
                            </div>
                            <?php $resum->dateChanges=date("Y-m-d"); ?>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                                <span class="p-date" style="color: #000;">Дата изменения <?=Yii::$app->formatter->asDate($resum->dateChanges) ?></span>
                            </div>
                            
                        </div>
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