<?php
use yii\helpers\Url;
use app\helper\ClassHelper;
use app\models\Profstand;
/* @var $this yii\web\View */


$this->title = 'Главная';
$c = 0;
?>
<div class="container">
    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения категорий -->
        <h5 class=" text-center m-2">Найдите работу в вашем городе</h5> <!-- Надо сделать так, чтобы город был автоматически, как на других сайтах -->
            <div class="row">

                <?php $profstand=Profstand::find()->all();?>

                <?php foreach($profstand as $cat): ?>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                                <a type="submit" class="btn d-block mx-auto <?php ClassHelper::getColor($c) ?> m-2" 
                                    href="<?= Url::toRoute(['site/searchcat','id'=>$cat->id]) ?>"><?= $cat->name ?></a>
                                <?php $c++; ?>
                        </div>  
                <?php endforeach;?>

            </div>
                <h5 class=" text-center m-2">Зарегистрированные организации</h5>

                    <div class="row p-2 my-3">
                        <?php foreach ($organizations as $organization) : 
                            if ($organization->image!=NULL){?>

                                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 p-1">
                                    <a href="<?= Url::toRoute(['site/org_vacancy','id'=>$organization->id]) ?>"><img src="/uploads/<?php echo $organization->image; ?>" alt="<?php echo $organization->name; ?>" class="img-fluid img-thumbnail" style="width: 300px; object-fit: cover;  display: block;  height: 200px;"></a>
                                </div>

                        <?php }; endforeach ?>
                    </div>
    </div>
</div>


            
            


            