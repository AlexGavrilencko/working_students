<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\BigSpeciality;
use yii\helpers\ArrayHelper;
use app\models\CategoryProfstand;

/* @var $this yii\web\View */
/* @var $model app\models\specialProfstand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="special-profstand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        // получаем все города из таблицы атрибутов
        $bigsp = BigSpeciality::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
        $items = ArrayHelper::map($bigsp,'id','code','name');
            $params = [
            'prompt' => $bigsp->name
        ];
        echo $form->field($model, 'bigspeciality_id')->dropDownList($items,$params);
    ?>

    <?php
        // получаем все города из таблицы атрибутов
        $bigsp = CategoryProfstand::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
        $items = ArrayHelper::map($bigsp,'id','code','name');
            $params = [
            'prompt' => $bigsp->name
        ];
        echo $form->field($model, 'categProfstand_id')->dropDownList($items,$params);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
