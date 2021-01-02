<?php

use app\models\Article;
	use app\models\Category;
	use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var Article $articles */
/** @var Article $pagination */
/** @var Category $categories */
/** @var Category $category */
/** @var Article $popular */
/** @var Article $recent */

?>
<!--main content start-->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-title">
                    <span class="caption d-block small">Категория</span>
                    <h2><?= Html::encode($category->title); ?></h2>
                </div>
                <?php foreach ($articles as $article): ?>
                    <div class="post-entry-2 d-flex">
                        <div class="thumbnail order-md-2" style="background-image: url('<?= Html::encode($article->getImage()); ?>')"></div>
                        <div class="contents order-md-1 pl-0">
                            <h2><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= Html::encode($article->title); ?></a></h2>
                            <p class="mb-3">
                                <?= StringHelper::truncate($article->description,256) ?>
                                <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Читать далее<span class="icon-keyboard_arrow_right"></span></a>
                            </p>
                            <div class="post-meta">
                                <span class="d-block">
                                    <a href="#"><?= $article->author->name?></a> в категории <a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>">
                                        <?= Html::encode($article->category->title); ?>
                                    </a>
                                </span>
                                <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span>
                                    <?php if ($article->viewed > 0): ?>
                                        Количество просмотров: <?= (int) Html::encode($article->viewed); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
            

        </div>

            <div class="col-lg-6">
                <nav aria-label="Page navigation example">
                    <?php
                        echo LinkPager::widget([
                            'pagination' => $pagination,
                            //Css option for container
                            'options' => ['class' => 'custom-pagination list-unstyled'],
                            //Current Active option value
                            'activePageCssClass' => 'active',
                        ]);
                    ?>
                </nav>
            </div>
    </div>
</div>
<!-- end main content-->