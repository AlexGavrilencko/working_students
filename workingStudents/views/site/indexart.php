<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->

    <div class="container-fluid d-flex flex-row bd-highlight flex-column">
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7 mt-4">
                <?php foreach($articles as $article):?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt=""></a>

                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">Просмотр</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"> <?= $article->category->title; ?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= $article->title?></a></h1>


                            </header>
                            <div class="entry-content">
                                <p><?= $article->description?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Продолжить чтение</a>
                                </div>
                            </div>
                            <div class="social-share text-center ">
                                <span class="social-share-title pull-left text-capitalize">By Admin On <?= $article->getDate();?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?>
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