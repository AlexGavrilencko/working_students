<?php



use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Организация';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
   <!-- <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
        <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="border_search padding_search">-->
    <div class="site-registration">
        <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="pole border_search padding_search">
                <div class="form">
                    <div class="text-center">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Пожалуйста, заполните все поля:</p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="/privateoffice/set-image" class="btn btn-rounded btngreen">Загрузите личную фотографию</a>
                    </div>
                    
                    <?php   
                        $user = Yii::$app->user->identity;
                        if($model->image): ?>
                            <img class="" src="/uploads/<?= $model->image?>" alt="">
                        <?php endif; ?>
                                 
                    <p>Данные об организации:</p>
                    <p><?= $model->name ?></p>
                    <p>г. <?= $model->city_id ?></p>
                    <p>Адрес: <?=$model->adres?></p>
                    <p>ИНН: <?=$model->inn?></p>
                    <p>ОГРН: <?=$model->ogrn?></p>
                    

                   
                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<br>