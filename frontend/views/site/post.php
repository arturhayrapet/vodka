<div class="post_content">
    <div class="container">
        <div class="row">
            <h1 class="post_title"><?= $post->{'title_' . Yii::$app->language} ?></h1>
            <div class="img_div">
                <?php if (isset($post->media->unique_name)): ?>
                    <img src="/uploads/<?= $post->media->unique_name ?>" alt="" width="35%">
                <?php endif; ?>
            </div>
            <p class="post_text">
                <?= $post->{'content_' . Yii::$app->language} ?>
            </p>
        </div>
        <div class="row" style="margin-top: 100px; margin-bottom: 100px">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-4 col-xs-12 post_box_mobile">
                    <a href="/site/post/<?= $post->id ?>">
                        <div style="box-shadow: 0px 0px 5px 1px silver;">
                            <div style="text-align: center">
                                <?php if (isset($post->media->unique_name)): ?>
                                    <img src="/uploads/<?= $post->media->unique_name ?>" alt=""
                                         width="100%" height="50%">
                                <?php endif; ?>
                            </div>
                            <div style="padding: 10px">
                                <p><b><?= $post->{'title_' . Yii::$app->language} ?></b></p>
                                <hr style="width: 50%;border-top: 2px solid; margin-left: 0;">
                                <p><?= $post->{'content_' . Yii::$app->language} ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>