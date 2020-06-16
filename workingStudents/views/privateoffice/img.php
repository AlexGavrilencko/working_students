<?php
//СТРАНИЦА Загрузки изображения

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Загрузка фотографии профиля';
$this->params['breadcrumbs'][] = $this->title;
?>
  <style>

    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
    .max-width-100{
        max-width: 100%;
    }
a{
        color: #00a4b9dc;
        font-size: 15px;
    }
    a:hover{
        color: #003941dc;
    }

  </style>  
<br>
    <div class="site-registration text-center">
         <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="border_search31">
                <h1>Загрузка картинки</h1>
                <p>Пожалуйста, выберите изображение и сохраните его!</p>
                    <div class="article-form">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-lg btn-rounded btnorange m-2']) ?>
                    </div>

                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>