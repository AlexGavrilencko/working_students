<?php
//СТРАНИЦА просмотра резюме

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use app\models\User;
use yii\helpers\Url;

$this->title = 'Просмотр резюме';
?>
          
<!-- резюме -->

    <div class="container-fluid padding_search d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10"> 
<!-- _______________________________________________________________________________________________ -->
                <div class="border_search">     <!-- Фон для отображения -->

                    <div class="row"> 
                    
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <?php if($resum->image): ?>
                                <img class="compsearchavatar" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div> 
                        

                        <div class="col-5 col-sm-5 col-md-7 col-lg-7 col-xl-7"> <!-- Отображение информации правее фотографии -->
                            <!-- для описания -->
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-10">  <!-- Отображение ФИО -->
                                    <p> <?= $resum->surname ?> <?= $resum->name ?> <?= $resum->patronymic ?></p>
                                </div>                  <!-- /Отображение ФИО -->

                                <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>"><!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                </div>
                                <?php } else {?>
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2"> 
                                    </div>
                                <?php }?>

                            </div>

                            <div class="row "> <!-- Отображение даты рождения и города -->

                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-10">
                                    <p>Возраст<?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                                </div>    
                                
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                    <p> 
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
                                    </p>
                                </div>  
                            </div>                 <!-- /Отображение даты рождения и города-->

                            <div class="row "> <!-- Отображение желаемой доолжности -->
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p><?= $object->name ?>  Желаемая должность</p>
                                </div>    
                            </div>                 <!-- /Отображение желаемой доолжности-->
                        </div>
                    </div> 


                    <div class="row ml-1"> <!-- Опыт работы -->

                    </div><!-- /Опыт работы -->

                    <div class="row ml-1"><!-- Образование -->

                    </div><!-- /Образование -->

                    <div class="row ml-1"> <!-- Персональные качества -->
                        <p><?= $resum->personalQualities ?></p>
                    </div> <!-- /Персональные качества -->

                    <div class="row ml-1"> <!-- Навыки -->
                        <p><?= $resum->skills ?></p>                          
                    </div> <!-- /Навыки -->

                    <div class="row ml-1"> <!-- Достижения -->

                    </div> <!-- /Достижения -->

                    <div class="row ml-1"> <!-- Просмотры и дата -->
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <p>количество просмотров</p>
                        </div>

                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <p>Дата<?= $resum->dateAdd ?></p>       
                        </div>
                    </div> <!-- /Просмотры и дата -->
                </div>
            </div>
        </div> 
        <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
    </div>
              