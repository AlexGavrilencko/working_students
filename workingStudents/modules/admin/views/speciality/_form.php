<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\BigSpeciality;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\speciality */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speciality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        // получаем все города из таблицы атрибутов
        $bigsp = BigSpeciality::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
        $items = ArrayHelper::map($bigsp,'id','code','name');
            $params = [
            'prompt' => $bigsp->name
        ];
        echo $form->field($model, 'bigspecial_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
