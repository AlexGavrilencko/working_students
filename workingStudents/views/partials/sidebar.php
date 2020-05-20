<?php
use yii\helpers\Url;
?>
<div class=" col-12 col-sm-12 col-md-10 col-lg-4 col-xl-4" data-sticky_column>
    <div class="primary-sidebar mt-4">

        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center" style="color: #00a4b9dc;">Популярные статьи</h3>
            <?php

            foreach($popular as $article):?>
                <div class="popular-post">
                    <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">

                        <div class="p-overlay"></div>
                    </a>

                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="text-uppercase"><?= $article->title?></a>
                        <span class="p-date"><?= $article->getDate();?></span>

                    </div>
                </div>
            <?php endforeach;?>

        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center" style="color: #00a4b9dc;">Новые статьи</h3>
            <?php foreach($recent as $article):?>
                <div class="thumb-latest-posts">
                    
                        <div class="">
                            <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="text-uppercase"><?= $article->title?></a>
                            <span class="p-date"><?= $article->getDate();?></span>
                        </div>
                    
                </div>
            <?php endforeach;?>
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center" style="color: #00a4b9dc;">Категории</h3>
            <ul>
                <?php foreach($categories as $category):?>
                    <li>
                        <a href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>"><?= $category->title?></a>
                        <span class="post-count pull-right"> (<?= $category->getArticlesCount();?>)</span>
                    </li>
                <?php endforeach;?>

            </ul>
        </aside>
    </div>
</div>