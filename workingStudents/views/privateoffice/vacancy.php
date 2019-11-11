<?php



use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attributes;
use app\models\Organization;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Вакансия';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
   <!-- <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
        <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="border_search padding_search">-->
    <div class="site-registration">
        <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="pole border_search padding_search">
                <div class="form">
                    <div class="text-center">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Пожалуйста, заполните все поля:</p>
                    </div>
                    <?php   
                        $user = Yii::$app->user->identity;
                        $model->user_id=$user->id; 
                    ?>
                    <?= $model->user_id ?></p>
                    <?= $form->field($model, 'name')->textInput() ?>

                    <?php 
                        $org = Organization::find()->where(['user_id'=>$user->id])->one();
                        $city_id = Attributes::find()->where(['id'=>$org->city_id])->one();
                        $city=$city_id->name;
                    ?>
                    <p>Данные об организации:</p>
                    <p><?= $org->name ?></p>
                    <p>г. <?= $city ?></p>
                    <p>Адрес: <?=$org->adres?></p>
                    <p>ИНН: <?=$org->inn?></p>
                    <p>ОГРН: <?=$org->ogrn?></p>
                    

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
                            // получаем все города из таблицы атрибутов
                            $experience = Attributes::find()->where(['type'=>'experience'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($experience,'id','name');
                            $params = [
                                'prompt' => 'Укажите опыт работы'
                            ];
                            echo $form->field($model, 'experience_id')->dropDownList($items,$params);
                        ?>

                    <?php
                            // получаем все города из таблицы атрибутов
                            $employment = Attributes::find()->where(['type'=>'employment'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($employment,'id','name');
                            $params = [
                                'prompt' => 'Укажите тип занятости'
                            ];
                            echo $form->field($model, 'employment_id')->dropDownList($items,$params);
                        ?>

                    <?php
                            // получаем все города из таблицы атрибутов
                            $schedule = Attributes::find()->where(['type'=>'schedule'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($schedule,'id','name');
                            $params = [
                                'prompt' => 'Укажите график  работы'
                            ];
                            echo $form->field($model, 'schedule_id')->dropDownList($items,$params);
                        ?>

                    <?= $form->field($model, 'salary')->textInput() ?>

                    <?php
                            // получаем все города из таблицы атрибутов
                            $position = Attributes::find()->where(['type'=>'objective'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($position,'id','name');
                            $params = [
                                'prompt' => 'Укажите должность'
                            ];
                            echo $form->field($model, 'position_id')->dropDownList($items,$params);
                        ?>


                    <?= $form->field($model, 'duties')->textInput() ?>

                    <?= $form->field($model, 'requirement')->textInput() ?>

                    <?= $form->field($model, 'conditions')->textInput() ?>

                    <?php
                            // получаем все города из таблицы атрибутов
                            $category = Attributes::find()->where(['type'=>'category'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($category,'id','name');
                            $params = [
                                'prompt' => 'Укажите профобласть'
                            ];
                            echo $form->field($model, 'category_id')->dropDownList($items,$params);
                        ?>

                    <?= $form->field($model, 'WorkOrPractice')->textInput() ?>
                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<br>