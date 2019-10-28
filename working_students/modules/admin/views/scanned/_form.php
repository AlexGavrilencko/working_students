<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scanned */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scanned-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'vacancy_id')->textInput() ?>

    <?= $form->field($model, 'resume_id')->textInput() ?>

    <?= $form->field($model, 'ViewOrSelect')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
