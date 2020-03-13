<?php
use yii\helpers\Url;
use app\helper\ClassHelper;
/* @var $this yii\web\View */


$this->title = 'Главная';
$c = 0;
?>
<div class="container"> 
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения категорий -->
        <p class="h4 text-center m-2">Работа в Новосибирске</p> <!-- Надо сделать так, чтобы город был автоматически, как на других сайтах -->
    <div class="row">
<!-- кнопки готовы, тебе только надо покрасивше сделать, за вывод отвечает цикл -->
        

        <!-- btnorange
btngreen_k 
btngreen_k
btnred
 -->

        <?php foreach($category as $cat): ?>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3"> 
                
                    <a type="submit" class="btn d-block mx-auto <?php ClassHelper::getColor($c) ?> m-2" 
                        href="<?= Url::toRoute(['site/search','id'=>$cat->id]) ?>"><?= $cat->name ?></a>
                    <?php $c++; ?>
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


            
            


            