<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация организации';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">

            <h3 class="text-center">Данные об организации</h3>

            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'city_id')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'adres')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'inn')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'ogrn')->textInput(['class'=>'form-control']) ?>

                    <div class="row justify-content-center">
                        <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-rounded btngreen btn-lg m-3', 'name' => 'login-button']) ?>
                    </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br>