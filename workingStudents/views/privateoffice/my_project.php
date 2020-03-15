<?php

use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Мои достижения';
?>
          
<br>
    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
    <div class="col-sm-4"> 
            <?= Html::a('Добавить фотографию', ['privateoffice/set-project'], ['class' => 'btn btn-rounded btnred']) ?>
        </div>
    <div class=row>
        
            <?php
                foreach ($project as $pr): 
            ?>
                <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 p-2">
                    <?php if($pr->image): ?>
                   <!--     <div class="border_project">-->
                            <img class="img-fluid project_img" src="/uploads/<?= $pr->image?>" alt="">
                            <div class="row">
                                <a href="<?= Url::toRoute(['privateoffice/set-project', 'id'=>$pr->id]); ?>" class='m-1'>Редактировать</a>
                                <a href="<?= Url::toRoute(['privateoffice/project_del', 'id'=>$pr->id]); ?>" class='m-1'>Удалить</a>
                            </div>
                       <!--  </div>-->
                    <?php endif; ?>
                </div>
            <?php  endforeach; ?>
    </div>

</div> 



    