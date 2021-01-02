<?php

use app\models\Article;
use app\models\Category;
	use yii\helpers\Html;
	use yii\helpers\Url;

/** @var Article $popular */
/** @var Article $recent */
/** @var Category $categories */
?>

            <div class="col-lg-3 ml-auto">
                <div class="section-title">
                    <h2>Популярные посты</h2>
                </div>
                <?php foreach($popular as $article): ?>
                    <div class="trend-entry d-flex">
                        <div class="trend-contents">
                            <h2><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= Html::encode($article->title); ?></a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> в категории <a href="#"><?= Html::encode($article->category->title); ?></span>
                                <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <p><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more">Читать далее<span class="icon-keyboard_arrow_right"></span></a></p>
                <?php endforeach; ?>
                
                <div class="section-title">
                    <h2>Последние посты</h2>
                </div>
                <?php foreach($recent as $article): ?>
                    <div class="trend-entry d-flex">
                        <div class="trend-contents">
                            <h2><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= Html::encode($article->title); ?></a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> в категории <a href="#"><?= Html::encode($article->category->title); ?></span>
                                <span class="date-read"><?= Html::encode($article->getDate()); ?> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <p><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more">Читать далее<span class="icon-keyboard_arrow_right"></span></a></p>
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
