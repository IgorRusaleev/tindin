<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class CategoriesWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $categories = Category::find()->all();
        return $this->render('categories-widget-view', ['categories' => $categories]);
    }
}