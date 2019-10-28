<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResumeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'dateBirth') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'skills') ?>

    <?php // echo $form->field($model, 'personalQualities_id') ?>

    <?php // echo $form->field($model, 'CareerObjective_id') ?>

    <?php // echo $form->field($model, 'dateAdd') ?>

    <?php // echo $form->field($model, 'dateChanges') ?>

    <?php // echo $form->field($model, 'ShowOrHide') ?>

    <?php // echo $form->field($model, 'response') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
