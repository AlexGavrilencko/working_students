<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="registr bg-dark">

                <?php $form = ActiveForm::begin(); ?>
            <h4 class="text-center">Регистрация</h4>

            <div class="row justify-content-center">
                <?=$form->field($model, 'rang')
                ->radioList([
                '10' => 'Студент',
                '20' => 'Компания'
                ])?>
            </div>
                <?= $form->field($model, 'login')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'e_mail')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'password_repeat')->passwordInput() ?>


                    <div class="row justify-content-center">
                        <?= Html::submitButton('Registration', ['class' => 'btn btn-outline-light btn-lg m-3', 'name' => 'login-button']) ?>
                    </div>


                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>