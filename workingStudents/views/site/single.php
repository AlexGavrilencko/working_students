<?php
use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <img src="<?= $article->getImage();?>" alt="">
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"> <?= $article->category->title?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$article->id])?>"><?= $article->title?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?= $article->content?>
                        </div>
                        <div class="decoration">
                        <?php
								foreach ($article->getTagArticles()->all() as $tag)
							: 
								 ?>
								<a href="<?= Url::toRoute(['site/tagview','id'=>$tag->tag_id]) ?>" class="btn btn-default"><?= $tag->getTag()->one()->title ?></a>
									
							<?php endforeach;?>
                        </div>

                        <div class="social-share text-center">
							<span
                                class="social-share-title pull-left text-capitalize">By Admin On <?= $article->getDate();?>
                            </span>
                            <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?>
                            </ul>
                        </div>
                    </div>
                </article>

             
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->