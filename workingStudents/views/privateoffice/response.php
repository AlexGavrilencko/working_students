<?php
//СТРАНИЦА Отклик
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Resume;
use app\models\Vacancy;
use yii\helpers\Html;
use yii\helpers\Url;

$user = Yii::$app->user->identity;

foreach($response as $res):
    if($user->rang===10){ 
        $r=Resume::find()->where(['user_id'=>$user->id])->one();
        $u=User::find()->where(['id'=>$res->user_id])->one();
        //var_dump($res);
        //Варя нужно будет изменить ссылку у слова организация,чтобы был переход на вакансии организации?>
        <div class="col-8 col-sm-8 col-md-10 col-lg-10 col-xl-10">
            На ваше <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$res->resume_id]); ?>">резюме</a> откликнулась <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$res->user_id]); ?>">организация</a>
            Данные для связи с организацией емаил:<?=$u->e_mail?> телефон:<?=$u->phone?>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
            <p>Дата<?= $res->date ?></p>       
        </div>
<?php }
    if($user->rang===20){ 
        $v=Vacancy::find()->where(['user_id'=>$user->id])->all();
        $u=User::find()->where(['id'=>$res->user_id])->one();
        $rr=Resume::find()->where(['user_id'=>$res->user_id])->one();
        //var_dump($res->user_id);
        foreach($v as $vac):
        if($res->vacancy_id===$vac->id){
            ?>
            <div class="col-8 col-sm-8 col-md-10 col-lg-10 col-xl-10">
                На вашy вакансию<a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vac->id]); ?>"><?=$vac->name?></a> откликнулся пользователь с резюме <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$rr->id]); ?>">организация</a>
                Данные для связи с организацией емаил:<?=$u->e_mail?> телефон:<?=$u->phone?>
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <p>Дата<?= $res->date ?></p>       
            </div>
        <?php   } endforeach; }
endforeach;?>
