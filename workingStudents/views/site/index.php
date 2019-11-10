<?php
use yii\helpers\Url;
/* @var $this yii\web\View */


$this->title = 'Главная';
?>
<div class="container"> 
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения категорий -->
        <p class="h4 text-center">Работа в Новосибирске</p> <!-- Надо сделать так, чтобы город был автоматически, как на других сайтах -->
    <div class="row">
<!-- кнопки готовы, тебе только надо покрасивше сделать, за вывод отвечает цикл -->
        <?php foreach($category as $cat):
            $c=0; ?>

            <div class="col-3">
                <?php if(($c=0)&&($c<7)) { ?>        
                    <a type="submit" class="btn btngreen_k  m-2" href="<?= Url::toRoute(['site/search','id'=>$cat->id]) ?>"><?= $cat->name ?></a>
                <?php $c++; }?>
            </div>  
            



            <div class="col-3"> 
                <?php if(($c=7)&&($c<13)) { ?>
                    <a type="submit" class="btn btnred  m-2" href="<?= Url::toRoute(['site/search','id'=>$cat->id]) ?>"><?= $cat->name ?></a>
                <?php $c++; }?>
            </div>


            
            <div class="col-3">  
                <?php if(($c=14)&&($c<20)) { ?>
                    <a type="submit" class="btn btnorange  m-2" href="<?= Url::toRoute(['site/search','id'=>$cat->id]) ?>"><?= $cat->name ?></a>
                <?php $c++; }?>
            </div>  
            


            
            <div class="col-3">   
                <?php if(($c=21)&&($c<27)) { ?>     
                    <a type="submit" class="btn btngreen_k  m-2" href="<?= Url::toRoute(['site/search','id'=>$cat->id]) ?>"><?= $cat->name ?></a>
                <?php $c++; }?>
            </div>  
            

        <?php endforeach;?>
            
              
        <!-- <div class="col">
            <button type="submit" class="btn btnorange  m-2">Прочее</button>
            <button type="submit" class="btn btngreen_k  m-2">Прохождение практики</button>
        </div>-->
    </div> 
</div>


    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения работодателей -->

    </div>

</div>


            
            


            