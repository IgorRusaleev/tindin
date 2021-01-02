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
            <div class="col-lg-8 single-content">
                <?php foreach($articles as $article):?>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>">
                            <p class="mb-5"><img src="<?= $article->getImage();?>" alt="Image" class="img-fluid"></p>
                        </a>
                    </div>
                    <h1 class="mb-4"><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link"><?= $article->title; ?></a></h1>
                    <div class="post-meta d-flex mb-5">
                        <div class="vcard">
                            <span class="d-block">
                                <a href="#"><?= $article->author->name?></a> в категории <a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>">
                                    <?= $article->category->title; ?>
                                </a>
                            </span>
                            <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span>
                                <?php if ($article->viewed > 0): ?>
                                    Количество просмотров: <?= (int) Html::encode($article->viewed); ?>
                                    
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <p>
                        <?= StringHelper::truncate($article->description,256) ?>
                        <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Читать далее<span class="icon-keyboard_arrow_right"></span></a>
                    </p>
                <?php endforeach; ?>
                <div>
                    <nav aria-label="Page navigation example">
                        <?php echo LinkPager::widget([
                                    'pagination' => $pagination,
                                    //Css option for container
                                    'options' => ['class' => 'custom-pagination list-unstyled'],
                                    //Current Active option value
                                    'activePageCssClass' => 'active',
                        ]);?>
                    </nav>
                </div>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>





<!--<div class="site-section">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-8 single-content">-->
<!--                --><?php //foreach($articles as $article):?>
<!--                    <div>-->
<!--                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">-->
<!--                            <a href="--><?//= Url::toRoute(['site/view', 'id'=>$article->id]);?><!--">-->
<!--                                <p class="mb-5"><img src="--><?//= $article->getImage();?><!--" alt="Image" class="img-fluid"></p>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <h1 class="mb-4">--><?//= $article->title?><!--</h1>-->
<!--                        <p>-->
<!--                            --><?//= StringHelper::truncate(Html::encode($article->description),256) ?>
<!--                            <a href="--><?//= Url::toRoute(['site/view', 'id'=>$article->id]);?><!--" class="more-link">Читать далее<span class="icon-keyboard_arrow_right"></span></a>-->
<!--                        </p>-->
<!--                        <div class="post-meta d-flex mb-5">-->
<!--                            <div class="vcard">-->
<!--                                <span class="d-block">-->
<!--                                    <a href="#">--><?//= $article->author->name?><!--</a> в категории <a href="--><?//= Url::toRoute(['site/category','id'=>$article->category->id])?><!--">-->
<!--                                        --><?//= $article->category->title; ?>
<!--                                    </a>-->
<!--                                </span>-->
<!--                                <span class="date-read">--><?//= Html::encode($article->getDate()); ?><!-- <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span>-->
<!--                                    --><?php //if ($article->viewed > 0): ?>
<!--                                        Количество просмотров: --><?//= (int) Html::encode($article->viewed); ?>
<!--                                        -->
<!--                                    --><?php //endif; ?>
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!--                <div>-->
<!--                    <nav aria-label="Page navigation example">-->
<!--                        --><?php //echo LinkPager::widget([
//                                    'pagination' => $pagination,
//                                    //Css option for container
//                                    'options' => ['class' => 'custom-pagination list-unstyled'],
//                                    //Current Active option value
//                                    'activePageCssClass' => 'active',
//                        ]);?>
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?//= $this->render('/partials/sidebar', [
//                'popular'=>$popular,
//                'recent'=>$recent,
//                'categories'=>$categories
//            ]);?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->