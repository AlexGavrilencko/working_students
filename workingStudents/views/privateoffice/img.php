<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Загрузка фотографии профиля';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
    <div class="site-registration text-center">
         <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="darkwindow1">
                <h1>Загрузка картинки</h1>
                <p>Пожалуйста, выберите изображение и сохраните его!</p>
                    <div class="article-form">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn-rounded btngreen btn btn-lg m-2']) ?>
                    </div>

                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>