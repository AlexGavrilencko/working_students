<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>



<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
