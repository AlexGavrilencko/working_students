<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VacancySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'organization_id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'experience_id') ?>

    <?php // echo $form->field($model, 'employment_id') ?>

    <?php // echo $form->field($model, 'schedule_id') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'position_id') ?>

    <?php // echo $form->field($model, 'duties') ?>

    <?php // echo $form->field($model, 'requirement') ?>

    <?php // echo $form->field($model, 'conditions') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'dateAdd') ?>

    <?php // echo $form->field($model, 'dateChanges') ?>

    <?php // echo $form->field($model, 'WorkOrPractice') ?>

    <?php // echo $form->field($model, 'ShowOrHide') ?>

    <?php // echo $form->field($model, 'response') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
