<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'dateBirth')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skills')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'personalQualities_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CareerObjective_id')->textInput() ?>

    <?= $form->field($model, 'dateAdd')->textInput() ?>

    <?= $form->field($model, 'dateChanges')->textInput() ?>

    <?= $form->field($model, 'ShowOrHide')->textInput() ?>

    <?= $form->field($model, 'response')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
