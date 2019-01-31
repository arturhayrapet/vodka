<div class="post_content">
    <div class="container">
        <div class="row">
            <h1 class="post_title"><?= $post->{'title_' . Yii::$app->language} ?></h1>
            <div class="img_div">
                <?php if (isset($post->media->unique_name)): ?>
                    <img src="/uploads/<?= $post->media->unique_name ?>" alt="" width="35%">
                <?php endif; ?>
            </div>
            <div class="post_text" style="width: 60%">
                <?= $post->{'content_' . Yii::$app->language} ?>
            </div>
        </div>
        <div class="row" style="margin-top: 100px; margin-bottom: 100px">
            <?php foreach ($posts as $p): ?>
                    <div class="col-md-4 col-xs-12 post_box_mobile">
                        <a href="/site/post/<?= $p->id ?>">
                            <div style="box-shadow: 0px 0px 5px 1px silver;height: 367px">
                                <div style="text-align: center">
                                    <?php if (isset($p->media->unique_name)): ?>
                                        <img src="/uploads/<?= $p->media->unique_name ?>" alt=""
                                             width="100%" height="50%">
                                    <?php endif; ?>
                                </div>
                                <div style="padding: 10px" class="text_line">
                                    <div style="height: 40px">
                                        <p><b><?= $p->{'title_' . Yii::$app->language} ?></b></p>
                                    </div>
                                    <hr style="width: 50%;border-top: 2px solid; margin-left: 0;">
                                    <p><?= $p->{'caption_' . Yii::$app->language} ?></p>
                                    <p class="date_stile"><?= isset($p->manual_date) ? $p->manual_date : '' ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>