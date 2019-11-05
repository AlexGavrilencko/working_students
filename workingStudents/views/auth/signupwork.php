<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Регистрация организации';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">

            <h3 class="text-center">Данные об организации</h3>
                <?php $form = ActiveForm::begin();  
                      $user = Yii::$app->user->identity;
                      $users=$user->id;
                     
                ?>
                <?= $form->field($model, 'name')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'city_id')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'adres')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'inn')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'ogrn')->textInput(['class'=>'form-control']) ?>

                    <div class="row justify-content-center">
                     <a href="<?= Url::toRoute(['/privateoffice/personal_account', 'user_id'=>$users]); ?>" class="btn-rounded btngreen btn btn-lg btn-block  m-4">Зарегистрировать</a>
                        <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-rounded btngreen btn-lg m-3', 'name' => 'login-button']) ?>
                    </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br>