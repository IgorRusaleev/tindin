<?php

use app\models\Category;
use yii\helpers\Url;

    /**
 * @var Category $categories
 */
?>

<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <?php foreach($categories as $category):?>
    <a class="dropdown-item" href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>">
        <?= $category->title?>
    </a>
    <?php endforeach;?>
</div>
