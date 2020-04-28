<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\specialProfstand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="special-profstand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categProfstand_id')->textInput() ?>

    <?= $form->field($model, 'bigspeciality_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
