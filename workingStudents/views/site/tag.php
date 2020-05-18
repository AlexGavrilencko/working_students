<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Tag;
$t=Tag::find()->where(['id'=>$id])->one();
?>

<div class=" text-center text-uppercase mt-2">
	<h4 class="entry-title">Статьи по тэгу: <i><?= $t->title?></i></h3>
</div>
<!--main content start-->
<div class="main-content">
<div class="container">
<div class="row">
<div class="col-md-8">


<?php
foreach ($art as $articl)
	: 
	//echo $articl->tag_id;
	
	$post=$articl->article_id;
	foreach ($article as $articles)
		: 
		if ($post===$articles->id){ ?>

			
			<article class="post">
				<div class="post-thumb">
					<a href="<?= Url::toRoute(['site/view', 'id'=>$articles->id]); ?>"><img src="<?= $articles->getImage(); ?>" alt=""></a>

					<a href="<?= Url::toRoute(['site/view', 'id'=>$articles->id]); ?>" class="post-thumb-overlay text-center">
						<div class="text-uppercase text-center">Просмотр</div>
					</a>
				</div>
				<div class="post-content">
					<header class="entry-header text-center text-uppercase">
						<h1 class="entry-title">
							<a href="<?= Url::toRoute(['site/view', 'id'=>$articles->id]); ?>"><?= $articles->title ?></a>
						</h1>
					</header>
					<div class="entry-content">
						<p><?= $articles->description ?>
						</p>

						<div class="btn-continue-reading text-center text-uppercase">
							<a href="<?= Url::toRoute(['site/view', 'id'=>$articles->id]); ?>" class="more-link">Продолжить чтение</a>
						</div>
					</div>
				</div>
			</article>

	<?php }; endforeach; ?>
<?php  endforeach; ?>
	
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
<!--footer start-->