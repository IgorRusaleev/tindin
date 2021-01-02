<?php
/** @var Article $article */
/** @var Comment $commentForm */
/** @var Comment $comments */

use app\models\Article;
use app\models\Comment;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

?>

<div class="pt-5">
    <?php if(!empty($comments)):?>
        <ul class="comment-list">
        <?php foreach($comments as $comment):?>
            <li class="comment">
                <?php if ($comment->user->image): ?>
                    <div class="vcard bio">
                        <img src="<?= $comment->user->image; ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="comment-body">
                    <h3><?= $comment->user->name;?></h3>
                    <div class="meta"><?= Html::encode($comment->getDate()); ?></div>
                    <p><?= Html::encode($comment->text); ?></p>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
    <?php endif;?>
    
    
    <?php if(Yii::$app->user->isGuest):?>
        <p>* оставить комментарии могут только зарегистрированные пользователи</p>
    <?php endif; ?>
    <?php if(!Yii::$app->user->isGuest):?>
        <div class="comment-form-wrap pt-5">
            <div class="section-title">
                <h2 class="mb-5">Оставьте комментарий</h2>
            </div>
            <?php if(Yii::$app->session->getFlash('comment')):?>
                <div class="alert alert-success" role="alert">
                    <?= Yii::$app->session->getFlash('comment'); ?>
                </div>
            <?php endif;?>
            <?php $form = ActiveForm::begin([
                    'action'=>[
                        'site/comment',
                        'id'=>$article->id
                    ],
                    'options'=>[
                        'class'=>'form-horizontal contact-form',
                        'role'=>'form'
                    ]
            ])?>
            
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($commentForm, 'comment')
                        ->textarea(['class'=>'form-control','placeholder'=>'Напишите комментарий'])
                        ->label(false)?>
                </div>
            </div>
            <button type="submit" class="btn send-btn">Отправить комментарий</button>
            <?php ActiveForm::end();?>
        </div>
    <?php endif;?>
</div>

