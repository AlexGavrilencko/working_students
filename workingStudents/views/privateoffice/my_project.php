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
        <?= Html::a('Добавить фотографию', ['privateoffice/set-project'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
        foreach ($project as $pr)
        : 
    ?>
        <div class="border_search">    
            <!-- результаты поиска -->
            <div class="row">
                
                <div class="col-sm-3">
                    <!-- для изображения -->
                    <?php if($pr->image): ?>
                        <img class="searchavatar" src="/uploads/<?= $pr->image?>" alt="">
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
            </div>   
        </div>
        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
        
    </div>
</div> 
</div> 
<br>