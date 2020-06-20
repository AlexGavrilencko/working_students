<style>
    a{
        color: #00a4b9dc;
        font-size: 18px;
    }
    a:hover{
        color: #003941dc;
    }
</style>
<?php
//СТРАНИЦА Отклик
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Resume;
use app\models\Vacancy;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Organization;

$user = Yii::$app->user->identity;
if($user->rang===10){ 
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
<div class=" text-center text-uppercase mt-2">
	<h4 class="entry-title">Уведомления</h3>
</div>
 
      <div class="response text-center" style="width: 90%">   
            <div class="table-responsive-sm table-responsive-md">
                <table class="table table-bordered table-hover table-sm mt-3">
                    <thead> <!--Строка с заголовками-->
                        <tr class="">
                            <th scope="col">№</th>
                            <th scope="col">Резюме</th>
                            <th scope="col">Организация</th>
                            <th scope="col">e-mail</th>
                            <th scope="col">Номер телефона</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead> <!--/Строка с заголовками-->
                <tbody> <!--Тело таблицы-->
<?php } else {?> 
<div class="response text-center" style="width: 90%">   
            <div class="table-responsive-sm table-responsive-md">
                <table class="table table-bordered table-hover table-sm mt-3">
                    <thead> <!--Строка с заголовками-->
                        <tr class="">
                            <th scope="col">№</th>
                            <th scope="col">Вакансия</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">e-mail</th>
                            <th scope="col">Номер телефона</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead> <!--/Строка с заголовками-->
                <tbody> <!--Тело таблицы-->
                    <?php
                    };
                    foreach($response as $res):
                        if($user->rang===10){ 
                            $r=Resume::find()->where(['user_id'=>$user->id])->one();
                            $u=User::find()->where(['id'=>$res->user_id])->one();
                            $org = Organization::find()->where(['user_id'=>$u->id])->one();
                            //var_dump($org);?>
                                <tr>
                                    <th scope="row">НОМЕР</th> <!-- № -->
                                    <td><a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$res->resume_id]); ?>">Ваше резюме</a></th>
                                    <td><a href="<?= Url::toRoute(['site/org_vacancy', 'id'=>$org->id]); ?>"><?=$org->name?></a></th> <!-- Вакансия -->
                                    <td><?=$u->e_mail?></th> <!-- e-mail -->
                                    <td><?=$u->phone?></th> <!-- Номер телефона -->
                                    <td><?= $res->date ?></th>
                                    <td>
                                        <?= Html::a('Удалить', ['privateoffice/respdelete', 'id'=>$res->id], [
                                        
                                            'data' => [
                                            'confirm' => 'Вы действительно хотите удалить данную вакансию?',
                                            'method' => 'post',
                                            ],
                                        ]); ?>
                                    </th>
                                </tr>
                    <?php }
                        if($user->rang===20){ 
                            $v=Vacancy::find()->where(['user_id'=>$user->id])->all();
                            $u=User::find()->where(['id'=>$res->user_id])->one();
                            $rr=Resume::find()->where(['user_id'=>$res->user_id])->one();
                            //var_dump($res->user_id);
                            foreach($v as $vac):
                                if($res->vacancy_id===$vac->id){ ?> <!--Цыкл для отображения-->
                                    <tr>
                                        <th scope="row">НОМЕР</th> <!-- № -->
                                        <td><a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vac->id]); ?>"><?=$vac->name?></a></th> <!-- Вакансия -->
                                        <td><a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$rr->id]); ?>"><?= $rr->surname ?> <?= $rr->name ?> <?= $rr->patronymic ?></a></th> <!-- ФИО -->
                                        <td><?=$u->e_mail?></th> <!-- e-mail -->
                                        <td><?=$u->phone?></th> <!-- Номер телефона -->
                                        <td><?= $res->date ?></th>
                                        <td> 
                                            <?= Html::a('Удалить', ['privateoffice/respdelete', 'id'=>$res->id], [
                                            
                                                'data' => [
                                                'confirm' => 'Вы действительно хотите удалить данную вакансию?',
                                                'method' => 'post',
                                                ],
                                            ]); ?>
                                        </th>
                                    </tr>

                        <?php  } endforeach; ?> <!--/Цыкл для отображения-->
                        <?php }
                    endforeach;?>
                </tbody> <!--/Тело таблицы-->
            </table>
        </div>
    </div> 