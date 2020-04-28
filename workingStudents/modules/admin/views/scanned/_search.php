<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScannedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scanned-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'vacancy_id') ?>

    <?= $form->field($model, 'resume_id') ?>

    <?= $form->field($model, 'ViewOrSelect') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-secondary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
