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

        <?php $form = ActiveForm::begin(); ?>
            <h3 class="text-center">Регистрация пользователя</h3>
                <?php
               // $form->field($model, 'rang')->$rang;
                ?>
                <?= $form->field($model1, 'login')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model1, 'e_mail')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model1, 'password')->passwordInput() ?>

                <?= $form->field($model1, 'password_repeat')->passwordInput() ?>

                <h3 class="text-center">Данные об организации</h3>
                <?php   
                      //$user = Yii::$app->user->identity;
                     // var_dump($user);die();
                      //$model2->user_id=$user->id;
                      //$form->field($model2,'user_id');
                      //$model2 ->user_id
                ?>
              
                <?= $form->field($model2, 'name')->textInput(['class'=>'form-control']) ?>
                <?php
                // получаем все города из таблицы атрибутов
                $city = Attributes::find()->where(['type'=>'city'])->all();
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                $items = ArrayHelper::map($city,'id','name');
                $params = [
                    'prompt' => 'Укажите город'
                ];
                echo $form->field($model2, 'city_id')->dropDownList($items,$params);
                 ?>

                <?= $form->field($model2, 'adres')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model2, 'inn')->textInput(['class'=>'form-control']) ?>

                <?= $form->field($model2, 'ogrn')->textInput(['class'=>'form-control']) ?>

                <div class="row justify-content-center">
                        <?= Html::submitButton('Sign', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                </div>

            
                <?php ActiveForm::end(); ?>   
           
        </div>
    </div>
</div>
<br>