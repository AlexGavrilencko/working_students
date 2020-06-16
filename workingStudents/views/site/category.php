<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ArtCategory;
$t=ArtCategory::find()->where(['id'=>$id])->one();
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
<h4 class="entry-title">Статьи по категории: <i Class="text_name_vacancy"><?= $t->title?></i></h3>
</div>

<!--main content start-->
<div class="container-fluid d-flex flex-row bd-highlight flex-column">
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7 mt-4">
                <?php foreach($articles as $article):?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt="" class="pull-left"></a>

                            <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id]);?>"> <?= $article->category->title?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><?=$article->title?></a></h1>
                            </header>
                            <div class="entry-content">
                                    <p><?= $article->description?>
                                    </p>
                            </div>
                            <div class="social-share text-center">
                                <span class="social-share-title pull-left text-capitalize">By Admin On <?= $article->getDate();?></span>
                                <ul class="text-center pull-right">
                                    <span class="p-date" style="color: #000;">Количество просмотров: <?= $article->viewed ?></span>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

               
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
        <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
    </div>

<!-- end main content-->
<!--footer start-->