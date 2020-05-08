<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>



<div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
<div class="site-error pole">

    
    <img src="/public/img/404.png" alt="404" class="A404">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
</div>
</div>