<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Attributes;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;	
use kartik\date\DatePicker;

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="site-registration">
    <div class="text-light d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole darkwindow">
                    <div class="text-center">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Пожалуйста, заполните все поля:</p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="/privateoffice/set-image" class="btn btn-outline-light m-2">Загрузите личную фотографию</a>
                    </div>
                    <?php   $user = Yii::$app->user->identity;
                            $model->user_id=$user->id; ?>

                        <?= $form->field($model,'user_id') ?></p>

                        <?= $form->field($model, 'name')->textInput() ?>

                        <?= $form->field($model, 'surname')->textInput() ?>

                        <?= $form->field($model, 'patronymic')->textInput() ?>
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
                        <?php
                            echo DatePicker::widget([
                                'model' => $model,
                                'name' => 'dateBirth' ,  
                                'type' => DatePicker :: TYPE_COMPONENT_APPEND ,  
                                'value' => '' ,  
                                'pluginOptions' => [  
                                    'autoclose' => true ,
                                    'format' => 'dd-M-yyyy'  
                                ]
                            ]);
                         ?>
                        
                        <?php
                            // получаем все города из таблицы атрибутов
                            $qualities = Attributes::find()->where(['type'=>'qualities'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($qualities,'id','name');
                            $params = [
                                'multiple' => 'true'
                            ];
                            echo $form->field($model, 'personalQualities_id')->dropDownList($items,$params);
                        
                        ?>
                        
                        <?php
                            // получаем все города из таблицы атрибутов
                            $objective = Attributes::find()->where(['type'=>'objective'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($objective,'id','name');
                            $params = [
                                'prompt' => 'Укажите желаемую должность'
                            ];
                            echo $form->field($model, 'CareerObjective_id')->dropDownList($items,$params);
                        
                        ?>
                        

                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-light', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
         </div>
    </div>
<?php ActiveForm::end(); ?>
