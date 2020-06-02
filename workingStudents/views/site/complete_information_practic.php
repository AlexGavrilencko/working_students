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
                            <?php
                                $u=User::find()->where(['id'=>$vacan->user_id])->one();
                                $cityv=Attributes::find()->where(['id'=>$vacan->city_id])->one();// город вакансии
                                $o = $vacan->organization_id;
                                $organization = Organization::find()->where(['id'=>$o])->one();
                                $cityo=Attributes::find()->where(['id'=>$organization->city_id])->one();// город организации
                                //var_dump($organization);
                                $category = Profstand::find()->where(['id'=>$vacan->category_id])->all();//категория
                                
                                if ($organization->image!=null){?>
                            
                                    <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/<?= $organization->image?>" alt="">
                             
                                <?php } else {?> 
                                        <img class="img-fluid img-thumbnail" style="width: 250px; object-fit: cover;  display: block;  height: 180px;" src="/uploads/nofoto.png" alt="">
                                <?php }  ?>
                        </div>                 <!-- /Отображение фотографии -->

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"> <!-- Отображение информации правее фотографии -->
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <h5 Class="text_name_vacancy"><?= $vacan->name ?></h5>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <p> <?= $cityv->name ?></p>
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
                            <h4 class="text-center text_name_vacancy" >Данные об организации</h4>                       
                                <p><strong>Название организации:</strong>
                                     <a href="<?= Url::toRoute(['site/org_vacancy','id'=>$organization->id]) ?>" style=" color: #000;"> 
                                        <?php
                                            $o = $vacan->organization_id;
                                            $organization = Organization::find()->where(['id'=>$o])->one();
                                            echo $organization->name;
                                        ?>
                                    </a>
                                </p>
                                <p><strong>Город:</strong>
                                    <?  if ($cityo == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $cityo->name;
                                    ?>
                                </p>
                                <p><strong>Адрес:</strong>
                                    <?  if ($organization->adres == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->adres;
                                    ?>
                                </p>
                                <p><strong>ИНН:</strong>  
                                    <?  if ($organization->inn == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->inn;
                                    ?>
                                </p>
                                <p><strong>ОГРН:</strong>
                                    <?  if ($organization->ogrn == NULL){
                                            echo 'Не указано';
                                        }
                                        else echo $organization->ogrn;
                                    ?>  
                                </p>
                                <p><strong>e-mail:</strong>
                                <?= $u->e_mail ?>
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
                            <h6>Категория:</h6>
                        </div>
                        <div class="row ml-3"> <!-- Опыт работы -->
                            <?= $category->name ?><!-- профстандарт -->
                        </div><!-- /Опыт работы -->
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
                        <div class="row"> <!-- Просмотры и дата -->
                               
                                   
                                        <div class=" col-md-8 col-lg-8 col-xl-8"> 
                                           
                                        </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                        <span class="p-date" style="color: #000;"><?= $vacan->dateAdd?></span>       
                                    </div>

                                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                        <img src="/public/img/eye.png" alt="eye" style="width: 32px;"><?= $vacan->viewed ?>       
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
