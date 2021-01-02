<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\assets\PublicAsset;
use app\models\Category;
    use app\widgets\CategoriesWidget;
    use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/** @var Category $categories */

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<?php $this->beginBody() ?>

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 d-flex">
                    <a href="<?= Yii::$app->homeUrl; ?>" class="site-logo">
                        Tindin
                    </a>
                    <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
                <div class="col-12 col-lg-6 ml-auto d-flex">
                    <div class="ml-md-auto top-social d-none d-lg-inline-block"></div>
                    <form action="#" class="search-form d-inline-block">
                        <div class="d-flex">
                            <input type="email" class="form-control" placeholder="Искать...">
                            <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
                        </div>
                    </form>
                </div>
                <div class="col-6 d-block d-lg-none text-right"></div>
            </div>
            <ul class="nav justify-content-end">
                        <?php if(Yii::$app->user->isGuest):?>
                            <li class="nav-item"><a class="nav-link" href="<?= Url::toRoute(['auth/login'])?>">Авторизоваться</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= Url::toRoute(['auth/signup'])?>">Зарегистрироваться</a></li>
                        <?php else: ?>
                            
                            <?= Html::beginForm(['/auth/logout'], 'post') . Html::submitButton(
                                            'Выйти (' . Yii::$app->user->identity->name . ')',
                                            ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            ) . Html::endForm() ?>
                            
                        <?php endif;?>
            </ul>
        </div>

        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
            <div class="container">

                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                <li class="nav-item active">
                                    <a href="<?= Yii::$app->homeUrl; ?>" class="nav-link text-left">Главная</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-left dropdown-toggle" href="#" id="navbarDropdown"
                                       role="button" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">Категории</a>
                                    <?= CategoriesWidget::widget(); ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $content ?>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Разработано <i class="icon-heart text-danger" aria-hidden="true"></i> <a href="https://rehni.ru/" target="_blank" >Веб студией Рэни</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .site-wrap -->
<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
