<?php
//СТРАНИЦА Избранное/Просмотренное
use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Vacancy;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
    a{
        color: #00a4b9dc;
        font-size: 18px;
    }
    a:hover{
        color: #003941dc;
    }
</style>
<?php
    $this->title = 'Просмотренное';
    $user = Yii::$app->user->identity;
    

        if($user->rang===10){ //условие для вывода просмотренного для студента ?>
            <div class="row justify-content-md-center "> 
                <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7 mt-4">  
                    <?php
                    foreach ($select as $sel):
                        foreach ($vac as $vacan): 
                            if($sel->vacancy_id==$vacan->id){  
                    ?>
                                <div class="border_search3"> <!-- Фон для отображения -->
                                    <div class="row"> <!-- ROW  ДЛЯ ЧАСТИ С ИЗОБРАЖЕНИМ-->   
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                                            <?php
                                                $o = $vacan->organization_id;
                                                $organization = Organization::find()->where(['id'=>$o])->one();
                                                if ($organization->image!=null){?>
                                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                                                <?php } else {?> 
                                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                            <?php }  ?>
                                        </div>             <!-- /Отображение фотографии -->                                      
                                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                            <div class="row"> <!-- ROW  -->
                                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                                </div>                  <!-- /Отображение названии вакансии -->
                                                <!-- Отображение зарплаты -->
                                                <?php  if (!Yii::$app->user->isGuest){ ?>
                                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                                        <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">
                                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                                        </a>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                                        <a href="#" class="disabled">
                                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                                        </a>
                                                    </div>
                                                <?php }?>
                                            </div> <!-- /ROW  -->
                                            <div class="row"> <!-- ROW Отображение названия организации и города -->
                                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8"><!-- Отображение названия организации -->
                                                    <p> Название организации:
                                                        <?php
                                                            $o = $vacan->organization_id;
                                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                                            if ($organization == NULL){
                                                                echo 'Не указано';
                                                            }
                                                            else echo $organization->name;
                                                        ?>
                                                    </p>
                                                </div><!-- /Отображение названия организации -->
                                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение города -->
                                                    <p> Город:
                                                        <?php
                                                            $c = $vacan->city_id;
                                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                                            if ($city == NULL) 
                                                            { 
                                                                echo 'Город не указан'; 
                                                            }
                                                            else echo $city->name;
                                                        ?>
                                                    </p>
                                                </div><!-- Отображение города -->
                                            </div>   <!-- ROW Отображение названия организации и города --> 
                                            <div class="row ml-1">
                                                <p>Зарплата: 
                                                    <?php
                                                        $salary = $vacan->salary;
                                                        if ($salary == NULL){
                                                            echo 'не указано';
                                                        }
                                                        else echo $salary;
                                                    ?>
                                                </p>
                                            </div> 
                                        </div> <!--div /Отображение информации правее фотографии-->
                                    </div>  <!-- ROW  ДЛЯ ЧАСТИ С ИЗОБРАЖЕНИМ-->  
                                    <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                                        <h6>Описание:</h6>
                                    </div>
                                    <div class="row ml-3">
                                        <p>
                                            <?php
                                                $duties = $vacan->description;
                                                if ($duties == NULL){
                                                    echo ' не указаны';
                                                }
                                                else echo $duties;
                                            ?>
                                        </p>
                                    </div>                          <!-- /Отображение дополнительной информации для соискателя -->
                                    <div class="row"> <!-- кнопок действия и даты -->
                                        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                                        </div>
                                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <p>Дата<?= $vacan->dateAdd ?></p>       
                                        </div>
                                    </div>
                                </div> <!-- /Фон для отображения -->
                            <?php };  endforeach;
                            endforeach;  ?>  <!-- /Цикл для отображения вакансий -->
                </div>       
                <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?>  
            </div>
                <!-- ________ОТОБРАЖЕНИЕ ИНФОРМАЦИЯ ПРОСМОТРЕННОГО ДЛЯ СТУДЕНТА (КОНЕЦ)__________-->
        <?} //условие для вывода просмотренного для студента (КОНЕЦ)
        if($user->rang==20){ //условие вывода просмотренного для работодателя ?>
            <!-- ________ОТОБРАЖЕНИЕ ИНФОРМАЦИЯ ПРОСМОТРЕННОГО ДЛЯ рАБОТОДАТЕЛЯ__________-->
            <div class="row justify-content-md-center mb-3"> <!-- Для отображения информации -->   
                <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7 mt-4">                 
                    <?php 
                    foreach ($select as $sel):
                        foreach ($resume as $resum): 
                            if($sel->resume_id==$resum->id){ 
                                if ($resum->ShowOrHide==1){
                    ?>   
                    <!-- _______________________________________________________________________________________________ -->
                    <div class="border_search3 "> <!-- Фон для отображения -->
                        <div class="row"> 
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                                <?php
                                    if($resum->image): ?>
                                        <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $resum->image?>" alt="">
                                <?php endif; ?>
                            </div>                 <!-- /Отображение фотографии -->
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение ФИО -->
                                        <p> <?= $resum->surname ?> <?= $resum->name ?> <?= $resum->patronymic ?></p>
                                    </div>                  <!-- /Отображение ФИО -->
                                    <?php  if (!Yii::$app->user->isGuest){ ?>
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$resum->id]); ?>">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php } else {?>
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                                            <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php }?>
                                </div> <!-- row где ФИО и в избранное -->
                                <div class="row"> <!-- Отображение желаемой доолжности и города -->
                                    <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                        <p>Желаемая вакансия: </p>
                                    </div>    
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        <p> Город
                                            <?php
                                                $c = $resum->city_id;
                                                $city = Attributes::find()->where(['id'=>$c])->one();
                                                if ($city == NULL) 
                                                { 
                                                    echo 'не указан'; 
                                                }
                                                else echo $city->name;
                                            ?>
                                        </p>
                                    </div>  
                                </div> <!-- row /Отображение даты рождения и города-->      
                            </div> <!-- /Отображение информации правее фотографии -->
                        </div> <!-- row верхняя часть -->
                        <div class="row ml-3 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                            <p>Последнее место работы:
                            </p>
                        </div>                      <!-- /Отображение дополнительной информации для соискателя -->
                        <div class="row ml-1 "> <!-- кнопок действия и даты -->
                            <div class="col-8 col-sm-8 col-md-10 col-lg-10 col-xl-10">
                                <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <p>Дата<?= $resum->dateAdd ?></p>       
                            </div>
                        </div>
                    </div> <!-- /Фон для отображения -->
                    <!-- _______________________________________________________________________________________________ -->
                    <?php  };//$sel->resume_id==$resume->id
                    }; //$resum->ShowOrHide===1?> 
                <?php  endforeach; 
                endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
            </div>
            <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?> 
        </div>
    <?} //if($user->rang==20){ 
 //foreach ($select as $sel):?> 
          