<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$r= $model->rang;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if($r==10){
                echo(Html::a('Resume', ['set-resume', 'user_id' => $model->id], ['class' => 'btn btn-primary']));
                echo(Html::a('Project', ['set-project', 'id' => $model->id], ['class' => 'btn btn-primary']));
            }
            ?>
           <?php if($r==20){
                 echo(Html::a('Vacancy', ['set-vacancy', 'id' => $model->id], ['class' => 'btn btn-primary']));
                 echo(Html::a('Organization', ['set-org', 'id' => $model->id], ['class' => 'btn btn-primary']));
                }
            ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'password',
            'e_mail',
            'phone',
            'ActInactUser',
            'rang',
        ],
    ]) ?>

</div>
