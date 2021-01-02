<?php

use app\models\Article;
use app\models\Category;
use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Category $category */
/** @var Category $categories */
/** @var Article $popular */
/** @var Article $recent */
/** @var Article $article */
/** @var Comment $comments */
/** @var Comment $commentForm */
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-content">
                <p class="mb-5">
                    <img src="<?= Html::encode($article->getImage()); ?>" alt="<?= Html::encode($article->title); ?>" class="img-fluid">
                </p>
                <h1 class="mb-4"><?= Html::encode($article->title); ?></h1>
                <div class="post-meta d-flex mb-5">
                    <div class="vcard">
                        <span class="d-block"><?= $article->author->name?>  в категории  <a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>">
                                <?= $article->category->title; ?></a>
                        </span>
                        <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span>
                                <?php if ($article->viewed > 0): ?>
                                    Количество просмотров: <?= (int) Html::encode($article->viewed); ?>
                                    
                                <?php endif; ?>
                        </span>
                    </div>
                </div>
                <div>
                    <?= $article->description; ?>
                </div>
                
                <?= $this->render('/partials/comment', [
                    'article'=>$article,
                    'comments'=>$comments,
                    'commentForm'=>$commentForm
                ])?>
            </div>

            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories,
            ]);?>
        </div>
    </div>
</div>