<section id="sec1">
    <img src="/images/sec1.png" alt="" class="sec1_bg">
    <img src="/images/sec1.png" alt="" class="sec1_bg">
    <img src="/images/sec1.png" alt="" class="sec1_bg">
    <?php if (Yii::$app->session->hasFlash('message')): ?>
        <div class="alert alert-success alert-dismissable" style="z-index: 999999999999;
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    display: table-caption;
    float: right;
    position: absolute;
    right: 25px;">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('message');
            $model->clearErrors('email') ?>
        </div>
    <?php endif; ?>
    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
        <!-- Overlay -->
        <div class="overlay"></div>

        <!--         Indicators -->
        <!--        <ol class="carousel-indicators">-->
        <!--        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>-->
        <!--        <li data-target="#bs-carousel" data-slide-to="1"></li>-->
        <!--        <li data-target="#bs-carousel" data-slide-to="2"></li>-->
        <!--        </ol>-->

        <!-- Wrapper for slides -->
        <div class="carousel-inner custom_carousel-inner">
            <?php foreach ($slider1 as $key => $slid): ?>
                <div class="item slides <?= $key == 0 ? 'active' : "" ?>">
                    <div class="slide-1" style="background-image: url(/uploads/<?= $slid->unique_name ?>);">
                    </div>
                    <div class="hero">
                        <hgroup>
                            <h1><?= $slid->{'title_' . Yii::$app->language} ?></h1>
                            <h3><?= $slid->{'description_' . Yii::$app->language} ?></h3>
                        </hgroup>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section id="sec2">
    <a name="products"></a>
    <img src="/images/sec2bg.png" alt="" class="sec2_bg">
    <div class="container about_us_cont">
        <div class="col-md-12 product_title">
            <h1><?= Yii::t('app', 'products') ?></h1>
        </div>
        <?php foreach ($products as $key => $product): ?>
            <div class="col-md-4 col-xs-12 about_us_left">
                <a href="/site/product/<?= $product->id ?>">
                    <div class="product_img_div">
                        <img src="/uploads/<?= $product->media ? $product->media->unique_name : '' ?>" alt="#"
                             class="product_img_<?= $key ?>">
                    </div>
                    <div class="product_text">
                        <h3><?= $product->{'title_' . Yii::$app->language} ?></h3>
                        <hr class="hr1">
                        <p><?= $product->{'description_' . Yii::$app->language} ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="sec3">
    <a name="technology" class="scroll_technology"></a>
    <img src="/images/sec3bg.jpg" alt="" class="sec3_bg">
    <div class="about_text">
        <h1><?= Yii::t('app', 'Technology') ?></h1>
        <h3><?= isset($technology[0]) ? $technology[0]->{'value_' . Yii::$app->language} : '' ?></h3>
        <p><?= isset($technology[1]) ? $technology[1]->{'value_' . Yii::$app->language} : '' ?></p>
    </div>
</section>
<section id="sec4">
    <img src="/images/sec4bg.svg" alt="" class="sec4_bg">
    <h1><?= Yii::t('app', 'New aroma') ?></h1>
    <div class="container">
        <div class="row">
            <?php foreach ($aromats as $aromat): ?>
                <div class="col-md-4 post_col">
                    <div class="post_img_div">
                        <img src="/uploads/<?= $aromat->media ? $aromat->media->unique_name : '' ?>" alt="Aromat"
                             class="post_img">
                    </div>
                    <div class="post_text_div">
                        <h3><?= $aromat->{'title_' . Yii::$app->language} ?></h3>
                        <hr class="post_hr_1">
                        <p><?= $aromat->{'content_' . Yii::$app->language} ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section id="sec5">
    <img src="/images/sec5bg.svg" alt="" class="sec5_bg">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php foreach ($slider2 as $key => $slid): ?>
                    <div class="item <?= $key == 0 ? 'active' : "" ?>">
                        <h1><?= $slid->{'title_' . Yii::$app->language} ?></h1>
                        <h3><?= $slid->{'description_' . Yii::$app->language} ?></h3>
                        <img src="/uploads/<?= $slid->unique_name ?>" alt="mijnaberd" class="slid_2">
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control custom_carousel_control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control custom_carousel_control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <p class="carousel_footer_text"><?= isset($slider2_text) ? $slider2_text->{'value_' . Yii::$app->language} : '' ?></p>
</section>
<div>
    <img src="/images/5-7.png" alt="" width="100%">
</div>
<!--    GALLERY  ------------------------------------------------------>


<section id="gallery" class="sec_gallery">
    <h1><?= Yii::t('app', 'Gallery') ?></h1>
    <div id="gallery_slider_wrp" class="container">
        <div class="galery">
            <div class="slide">
                <ul class="slide_ul">
                    <?php foreach ($gallery as $item): ?>
                        <li class="slide_li">
                            <img src="/uploads/<?= $item->unique_name ?>" alt=""></li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="gal_btn_prev"><i class="fa fa-angle-left"></i></div>
        <div class="gal_btn_next"><i class="fa fa-angle-right"></i></div>
    </div>
</section>

<!--     GALLERY  END  ------------------------------------------------>


<section class="sec_news">
    <img src="/images/newsBG.svg" alt="" class="news_bg">
    <h1><?= Yii::t('app', 'News') ?></h1>
    <div class="container">
        <?php foreach ($posts as $key => $post): ?>
            <a href="/site/post/<?= $post->id ?>">
                <div class="col-md-6 col-xs-12 post_box_col">
                    <div class=" col-md-12 post_box">
                        <div class="col-md-3 col-xs-3 post_number">
                            <img src='/images/post.svg' alt="">
                            <span><?= $key + 1 ?></span>
                        </div>
                        <div class="col-md-9 col-xs-9 text_style">
                            <b><?= $post->{'title_' . Yii::$app->language} ?></b>
                                                        <p>
                            <?= $post->{'caption_' . Yii::$app->language} ?></p>
                                                        <hr style="border-top: 1px solid #042c52;">
                            <p class="date_stile"><?= isset($post->manual_date) ? $post->manual_date : '' ?></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>
<section class="sec_sub">
    <img src="/images/sec_sub.jpg" alt="" class="sub_bg">
    <div class="subscribe">
        <h1><?= Yii::t('app', 'Stay in touch') ?></h1>
        <div class="sub_left">
            <?php if (isset($subscribe[0])): ?>
                <img src="<?= $subscribe[0]->{'value_' . Yii::$app->language} ?>"
                     alt="subscribe">
            <?php endif; ?>
        </div>
        <div class="sub_right">
            <div class="sub_right_style">
                <p><b><?= isset($subscribe[1]) ? $subscribe[1]->{'value_' . Yii::$app->language} : '' ?></b></p>
                <p class="sub_text"><?= isset($subscribe[2]) ? $subscribe[2]->{'value_' . Yii::$app->language} : '' ?></p>

                <?php $form = \yii\widgets\ActiveForm::begin(['enableClientValidation' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['class' => 'sub_input'])->label(false); ?>

                <button type="submit" class="sub_btn"><?= Yii::t('app', 'send') ?></button>

                <?php \yii\widgets\ActiveForm::end() ?>
            </div>
        </div>
    </div>
</section>

<?php $this->registerJs("
  $(document).ready(function () {
        var img_arr = $(\".sec1_bg\");
        for (var i = 1; i < img_arr.length; i++) {
            $(img_arr[i]).hide();
        }
       i = 1;
        setInterval(function () {
            img_arr.fadeOut(1000);
            $(img_arr[i]).fadeIn(1000);
            if (i < img_arr.length - 1) {
                i++;
            } else {
                i = 0
            }
        }, 4000);
    });

", yii\web\View::POS_READY) ?>
