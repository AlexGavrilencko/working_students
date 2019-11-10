<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Attributes;
use \yii\db\ActiveRecord;

$this->title = 'Регистрация организации';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">

            <h3 class="text-center">Данные об организации</h3>
                <?php $form = ActiveForm::begin();  
                      $user = Yii::$app->user->identity;
                      $model->user_id=$user->id;
                      $form->field($model,'user_id');
                      
                ?>
                <?= $model->user_id ?>
                <?= $form->field($model, 'name')->textInput(['class'=>'form-control']) ?>
                <?php
                // получаем все города из таблицы атрибутов
                $city = Attributes::find()->where(['type'=>'city'])->all();
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                $items = ArrayHelper::map($city,'id','name');
                $params = [
                    'prompt' => 'Укажите город'
                ];
                echo $form->field($model, 'city_id')->dropDownList($items,$params);
                 ?>

                <?= $form->field($model, 'adres')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'inn')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model, 'ogrn')->textInput(['class'=>'form-control']) ?>

                <div class="row justify-content-center">
                        <?= Html::submitButton('Sign', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br>