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
        <div class="row">
            <div class="col-sm-8">  
                <p>
                    <?= Html::a('Добавить фотографию', ['privateoffice/set-project'], ['class' => 'btn btn-rounded btnred']) ?>
                </p>
                    <div class="border_project">    
                        <!-- результаты поиска -->
                        <div class="row">
                            <?php
                                foreach ($project as $pr)
                                : 
                            ?>
                                <div class="col">
                                    <!-- для изображения -->
                                    <?php if($pr->image): ?>
                                        <img class="project_img" src="/uploads/<?= $pr->image?>" alt="">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="<?= Url::toRoute(['privateoffice/set-project', 'id'=>$pr->id]); ?>"><img class="pencil" src="/public/img/pencil.png" alt="Редактировать"></a>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?= Url::toRoute(['privateoffice/project_del', 'id'=>$pr->id]); ?>"><img class="trashcan" src="/public/img/trashcan.png" alt="Удалить"></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>  
                            <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
                        </div>   
                    </div>
            </div>
        </div> 
    </div> 
<br>