<div class="post_content">
    <div class="container">
        <div class="row">
            <h1 class="post_title"><?= $product->{'title_' . Yii::$app->language} ?></h1>
            <div class="img_div">
                <?php if (isset($product->media->unique_name)): ?>
                    <img src="/uploads/<?= $product->media->unique_name ?>" alt="" width="35%">
                <?php endif; ?>
            </div>
            <div class="content_div">
                <div class="post_text">
                    <?= $product->{'content_' . Yii::$app->language} ?>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 100px; margin-bottom: 100px">
            <?php foreach ($products as $post): ?>
                <div class="col-md-4 col-xs-12 post_box_mobile">
                    <a href="/site/product/<?= $post->id ?>">
                        <div style="box-shadow: 0px 0px 5px 1px silver; height: 850px; overflow: hidden;">
                            <div style="text-align: center">
                                <?php if (isset($product->media->unique_name)): ?>
                                    <img src="/uploads/<?= $post->media->unique_name ?>" alt=""
                                         width="100%" height="50%">
                                <?php endif; ?>
                            </div>
                            <div style="padding: 10px">
                                <p><b><?= $post->{'title_' . Yii::$app->language} ?></b></p>
                                <hr style="width: 50%;border-top: 2px solid; margin-left: 0;">
                                <div class="text_line3"><?= $post->{'content_' . Yii::$app->language} ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>