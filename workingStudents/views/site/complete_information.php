<?php
//СТРАНИЦА просмотра вакансии

use app\models\Attributes;
use app\models\Organization;
use app\models\Position;
use app\models\Profstand;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;

$this->title = 'Просмотр вакансии';
?>
<style>
    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
</style>
<div class="container-fluid d-flex flex-row bd-highlight flex-column">

<!-- Для отображения информации -->
    <div class="row justify-content-md-center mb-3"> 
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">  
                    <br>     
              
<!-- ______________________________________Вид отображения_________________________________________________________ -->
                <div class="border_vacancy"> <!-- Фон для отображения -->
                    <div class="row mb-4"> 

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> <!-- Отображение фотографии -->
                            <?php
                                $exp=Attributes::find()->where(['id'=>$vacan->experience_id])->one();//опыт
                                $emp=Attributes::find()->where(['id'=>$vacan->employment_id])->one();//тип з
                                $schedule=Attributes::find()->where(['id'=>$vacan->schedule_id])->one();//график
                                $cityv=Attributes::find()->where(['id'=>$vacan->city_id])->one();// город вакансии
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                $cityo=Attributes::find()->where(['id'=>$organization->city_id])->one();// город организации
                                //var_dump($organization);
                                $category = Profstand::find()->where(['id'=>$vacan->category_id])->all();//категория
                                $p=$vacan->position_id;
                                $pos = Position::find()->where(['id'=>$p])->one();
                                if($organization->image): ?>
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="Логотип компании">
                                <?php endif; ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <p>Название вакансии:<?= $vacan->name ?></p>
                                    </div>
                                    <?php if(Yii::$app->user->identity){ ?>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                            <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">
                                             <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                        </div>
                                    <?php  } else {?>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                            <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                            </a>
                                        </div>
                                    <?php }?>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
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
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <p>Город: <?= $cityv->name ?></p>
                                    </div>
                                        
                                </div>
                                
                                        <!-- <div class="row ml-1"> 
                                                <p> 
                                                    Предложение о работе или о практике
                                                </p>
                                        </div>  -->
                        </div> <!-- div /Отображение информации правее фотографии -->
                    </div>

                        <div class="date_org">
                            <p class="text-center">Данные о вашей организации</p>                       
                                <p>Название организации:
                                    <?  if ($organization->name == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->name;
                                    ?>  
                                </p>
                                <p>Город:  
                                    <?  if ($cityo == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $city->name;
                                    ?>
                                </p>
                                <p>Адрес:
                                    <?  if ($organization->adres == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->adres;
                                    ?>
                                </p>
                                <p>ИНН:  
                                    <?  if ($organization->inn == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->inn;
                                    ?>
                                </p>
                                <p>ОГРН:
                                    <?  if ($organization->ogrn == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->ogrn;
                                    ?>  
                                </p>
                        </div>



                   <!-- Отображение дополнительной информации для соискателя -->

                   <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Описание:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Опыт работы -->
                            <?= $vacan->description ?><!-- описание -->
                        </div><!-- /Опыт работы -->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                    <div class="row ml-1 mt-3"> 
                            <h6>Должность:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Должность -->
                            <?= $pos->name ?> <!-- Должность подгрузка из базы -->
                        </div><!-- /Должность -->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Категория:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Опыт работы -->
                            <?= $category->name ?><!-- профстандарт -->
                        </div><!-- /Опыт работы -->
                    <!-- ______________________________________ -->

                     <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Опыт:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Опыт работы -->
                            <?= $exp->name ?> <!-- опыт подгрузка из базы -->
                        </div><!-- /Опыт работы -->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Тип занятости:</h6>
                        </div>
                        <div class="row ml-3"><!-- График -->
                            <?= $emp->name ?> <!-- график работы подгрузка из базы -->
                        </div><!-- /График -->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>График:</h6>
                        </div>
                        <div class="row ml-3"><!-- График -->
                            <?= $schedule->name ?> <!-- график работы подгрузка из базы -->
                        </div><!-- /График -->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Обязанности:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Обязанности -->
                            <?= $vacan->duties ?> <!-- обязанности подгрузка из базы -->
                        </div> <!-- /Обязанности -->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Требование:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Требование -->
                            <?= $vacan->requirement ?> <!-- требование  подгрузка из базы -->              
                        </div> <!-- /Требование-->
                    <!-- ______________________________________ -->

                    <!-- ______________________________________ -->
                        <div class="row ml-1 mt-3"> 
                            <h6>Условия:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Условия -->
                            <?= $vacan->conditions ?> <!-- условия подгрузка из базы -->
                        </div> <!-- /Условия  -->
                    <!-- ______________________________________ -->

                    
 <!-- /Отображение дополнительной информации для соискателя -->
                        <div class="row ml-1"> <!-- Просмотры и дата -->
                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9"> 
                                    <a href="<?= Url::toRoute(['site/responsest', 'id'=>$vacan->id]); ?>">
                                    <!--<img class="heard" src="/public/img/heard.png" alt="-->Откликнуться на вакансию<!--">--></a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9"> 
                                        <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->Откликнуться на вакансию<!--">-->
                                        </a>
                                    </div>
                            <?php }?>

                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <p>Дата<?= $vacan->dateAdd ?></p>       
                                </div>
                        </div> <!-- /Просмотры и дата -->
                                <div class="text-center">
                                    <p>Количество просмотров <?= $vacan->viewed ?> </p>      
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
