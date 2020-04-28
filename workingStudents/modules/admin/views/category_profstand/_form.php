<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Profstand;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\categoryProfstand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-profstand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        // получаем все города из таблицы атрибутов
        $bigsp = Profstand::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
        $items = ArrayHelper::map($bigsp,'id','code','name');
            $params = [
            'prompt' => $bigsp->name
        ];
        echo $form->field($model, 'profstand_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
