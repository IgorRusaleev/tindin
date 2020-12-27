<?php

use app\models\Article;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var Article $pagination */
/** @var Article $articles */
/** @var Article $popular */
/** @var Article $recent */
/** @var Category $categories */
?>



<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-title">
                    <h2>Последние новости</h2>
                </div>
                <?php foreach ($recent as $article): ?>
                    <div class="post-entry-2 d-flex">
                        <div class="thumbnail order-md-2" style="background-image: url('<?= Html::encode($article->getImage()); ?>')"></div>
                        <div class="contents order-md-1 pl-0">
                            <h2><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= Html::encode($article->title); ?></a></h2>
                            <p class="mb-3">
                                <?= StringHelper::truncate(Html::encode($article->description),256) ?>
                                <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Читать далее</a>
                            </p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> в разделе <a href="#"><?= Html::encode($article->category->title); ?></a></span>
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
            <div class="col-lg-3">
                <div class="section-title">
                    <h2>Популярные посты</h2>
                </div>
                <?php foreach($popular as $article): ?>
                    <div class="trend-entry d-flex">
                        <div class="trend-contents">
                            <h2><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= Html::encode($article->title); ?></a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> в разделе <a href="#"><?= Html::encode($article->category->title); ?></span>
                                <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <p><a href="#" class="more">СМОТРИТЕ ВСЕ ПОПУЛЯРНЫЕ <span class="icon-keyboard_arrow_right"></a></p>
                <?php endforeach; ?>

                <div class="section-title">
                    <h2>Категории</h2>
                    <ul class="list-group">
                        <?php foreach($categories as $category):?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>"><?= $category->title?></a>
                                <span class="badge badge-primary badge-pill"><?= $category->getArticlesCount();?></span>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php foreach($articles as $article):?>
            <hr>
            <div class="col-lg-9 single-content">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <p class="mb-5"><img src="<?= $article->getImage();?>" alt="Image" class="img-fluid"></p>
                </div>
                <h1 class="mb-4"><?= $article->title?></h1>
                <p>
                    <?= StringHelper::truncate(Html::encode($article->description),256) ?>
                    <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Читать далее</a>
                </p>
                <div class="post-meta d-flex mb-5">
                    <div class="vcard">
                        <span class="d-block"><a href="#">Dave Rogers</a> в категории <a href="#"><?= $article->category->title; ?></a></span>
                        <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span>
                            <?php if ($article->viewed > 0): ?>
                                Количество просмотров: <?= (int) Html::encode($article->viewed); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>




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
            </div>

    </div>
</div>


