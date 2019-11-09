<?php
use yii\helpers\Url;
/* @var $this yii\web\View */


$this->title = 'My Yii Application';
?>
<div class="container"> 
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения категорий -->
        <p class="h4 text-center">Работа в Новосибирске</p> <!-- Надо сделать так, чтобы город был автоматически, как на других сайтах -->
    <div class="row">
<!-- кнопки готовы, тебе только надо покрасивше сделать, за вывод отвечает цикл -->
        <?php foreach($category as $cat):?>
            <div class="col">        
                <a class="btn btngreen_k  m-2" href="<?= Url::toRoute(['site/search','id'=>$cat->id]) ?>" class="btn btn-default"><?= $cat->name ?></a>
            </div>  
        <?php endforeach;?>
            <p>Конец категорий</p>
        <div class="col"> 
            <button type="submit" class="btn btngreen_k  m-2">Медицина и фармация</button>
        </div>

        <div class="col">
            <button type="submit" class="btn btnred  m-2">Сельское хозяйство</button>
        </div>
              
        <div class="col">
            <button type="submit" class="btn btnorange  m-2">Прочее</button>
            <button type="submit" class="btn btngreen_k  m-2">Прохождение практики</button>
        </div>
    </div> 
</div>


    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения работодателей -->

    </div>

</div>


            
            


            