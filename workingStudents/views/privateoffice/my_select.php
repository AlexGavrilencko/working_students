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
        font-size: 15px;
    }
    a:hover{
        color: #003941dc;
    }
</style>
 <div class=" text-center text-uppercase mt-2">
	<h4 class="entry-title">Избранное</h3>
</div>
<?php
$this->title = 'Избранное';
$user = Yii::$app->user->identity;

    // ______________________________________ВСЕ ДЛЯ ИЗБРАННОГО_________________________________________________________ 
    if($user->rang==10){//условие для вывода избранного для студента?>
        <!-- Для отображения информации -->
        <div class="row justify-content-md-center "> 
            <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7 mt-4">  
                <?php
                foreach ($select as $sel):
                    foreach ($vac as $vacan): //var_dump($vacan->id);
                        if($sel->vacancy_id==$vacan->id){  ?>  
                            <!-- Цикл для отображения вакансий -->
                            
                            <!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_search3"> <!-- Фон для отображения -->
                    <div class="row"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                if ($organization->image!=null){?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                                <?php } else {?> 
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                            <div class="row">

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">  <!-- Отображение названии вакансии -->
                                    <h6 Class="text_name_vacancy"><?= $vacan->name ?></h6>
                                </div>                  <!-- /Отображение названии вакансии -->

                                 <!-- Отображение зарплаты -->
                                <?php  if (Yii::$app->user->isGuest){ ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                    <a href="#" class="disabled" >
                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                    </a>
                                </div>
                            <?php } else {?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">
                                        <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                    </a>
                                </div>
                            <?php }?>
                                                  <!-- /Отображение зарплаты -->
                            </div>

                            <div class="row"> <!-- Отображение названия организации и города -->

                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8"><!-- Отображение названия организации -->
                                    <p>
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                             echo $organization->name;
                                        ?>
                                    </p>
                                </div><!-- /Отображение названия организации -->

                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение города -->
                                    <p>
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
                            </div>   <!-- ROW ml-1 Отображение названия организации и города --> 
                            
                            <?php   
                            $exp=Attributes::find()->where(['id'=>$vacan->experience_id])->one();//опыт
                            $emp=Attributes::find()->where(['id'=>$vacan->employment_id])->one();//тип з
                        ?>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                    <p><?= $exp->name ?></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <p><?= $emp->name ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
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
                            </div> 

                        </div>  <!-- div /Отображение информации правее фотографии -->
                    </div>
                    <div class="row ml-1 mt-3"> <!-- Отображение дополнительной информации для соискателя -->
                        <h6>Описание:</h6>
                    </div>
                    <div class="row ml-1">
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
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>" class="links">Подробнее о вакансии</a>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <span class="p-date" style="color: #000;"><?= $vacan->dateAdd?></span>       
                        </div>
                    </div>
                </div> <!-- /Фон для отображения -->
<!-- _______________________________________________________________________________________________ -->
                        <?php };  // if($sel->vacancy_id==$vacan->id){ 
                    endforeach; 
                endforeach;?>  <!-- /Цикл для отображения вакансий -->
                </div> 
                <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?> 
            </div>
        <? } //if($user->rang==10)

    if($user->rang==20){ //условие для вывода избранного для работодателя?>
        <div class="row justify-content-md-center mb-3"> <!-- Для отображения информации -->   
            <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7">  
                <?php
                foreach ($select as $sel):
                    foreach ($resume as $resum): 
                        if($sel->resume_id==$resum->id){
                            if ($resum->ShowOrHide===1){
                ?>   
                            <!-- _______________________________________________________________________________________________ -->
                                <div class="border_search4 "> <!-- Фон для отображения -->
                                    <div class="row"> 
                                    
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                                            <?php $pos=Position::find()->where(['id'=>$resum->CareerObjective_id])->one();
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
                                                    <p><?= $pos->name ?></p>
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
                                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                            <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>" class="links">Подробнее о резюме</a>
                                        </div>
                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <span class="p-date" style="color: #000;"><?= $resum->dateAdd?></span>        
                                        </div>
                                    </div>
                                </div> <!-- /Фон для отображения -->
                                <!-- _______________________________________________________________________________________________ -->
                            <?php  }; //if ($resum->ShowOrHide===1){
                        }; //if($sel->resume_id==$resume->id){?> 
                    <?php  endforeach; 
                    endforeach;?> <!-- здесь заканчивается цикл для отображения -->
            </div>
            <?= $this->render('/partials/sidebar', [
                    'popular'=>$popular,
                    'recent'=>$recent,
                    'categories'=>$categories
                ]);?>
        </div>
    <? }; //условие для вывода избранного для работодателя
  //foreach ($select as $sel):?> 
            