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
                                    <p>Название вакансии:<?= $vacan->name ?></p>
                                </div>

                                <div class="row">
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
                                <?= $vacan->description ?>
                                <?= $category->name ?>
                            <div class="row"> <!-- Отображение названия организации и города -->
                                    <p> 
                                        Предложение о работе или о практике
                                    </p>
                            </div>  
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
                        <div class="row ml-3"> <!-- Опыт работы -->
                            <p>Город: <?= $cityv->name ?></p> <!-- опыт подгрузка из базы -->
                        </div><!-- /Опыт работы -->

                        <div class="row ml-3"> <!-- Опыт работы -->
                            <p>Опыт: <?= $exp->name ?></p> <!-- опыт подгрузка из базы -->
                        </div><!-- /Опыт работы -->

                        <div class="row ml-3"><!-- График -->
                            <p>Тип занятости <?= $emp->name ?></p> <!-- график работы подгрузка из базы -->
                        </div><!-- /График -->

                        <div class="row ml-3"><!-- График -->
                            <p>График: <?= $schedule->name ?></p> <!-- график работы подгрузка из базы -->
                        </div><!-- /График -->

                        <div class="row ml-3"> <!-- Обязанности -->
                            <p>Обязанности: <?= $vacan->duties ?></p> <!-- обязанности подгрузка из базы -->
                        </div> <!-- /Обязанности -->

                        <div class="row ml-3"> <!-- Требование -->
                            <p>Требование: <?= $vacan->requirement ?></p> <!-- требование  подгрузка из базы -->              
                        </div> <!-- /Требование-->

                        <div class="row ml-3"> <!-- Условия -->
                            <p>Условия: <?= $vacan->conditions ?></p> <!-- условия подгрузка из базы -->
                        </div> <!-- /Условия  -->

                        <div class="row ml-3"> <!-- Тип занятости -->
                            <p>Тип занятости: </p> <!-- Тип занятости подгрузка из базы -->
                        </div><!-- /Тип занятости -->

                        <div class="row ml-3"> <!-- Должность -->
                            <p>Должность: </p><?= $pos->name ?> <!-- Должность подгрузка из базы -->
                        </div><!-- /Должность -->
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

                            <?php if(Yii::$app->user->identity){ ?>
                                <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9"> 
                                    <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">
                                    <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">--></a>
                                </div>
                            <?php  } else {?>
                                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9"> 
                                        <a href="#" class="disabled">
                                                <!--<img class="heard" src="/public/img/heard.png" alt="-->В избранное<!--">-->
                                        </a>
                                    </div>
                            <?php }?>
                           

                              
                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <p>Количество просмотров</p><?= $vacan->viewed ?>       
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
