<?php

namespace frontend\controllers;

use common\models\Media;
use common\models\Menu;
use common\models\Post;
use common\models\Product;
use common\models\Settings;
use common\models\Subscribers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'new'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'new';
        $posts = Post::find()->with('media')->orderBy(['id' => SORT_DESC])->limit(4)->all();
        $products = Product::find()->with('media')->where(['type' => 0])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $aromats = Product::find()->with('media')->where(['type' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $technology = Settings::find()->where(['kay' => ['technology_sub', 'technology_text']])->all();
        $slider1 = Media::find()->where(['type' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $slider2 = Media::find()->where(['type' => '2'])->orderBy(['id' => SORT_DESC])->all();
        $gallery = Media::find()->where(['type' => '3'])->orderBy(['id' => SORT_DESC])->all();
        $slider2_text = Settings::find()->where(['kay' => 'slider2_text'])->one();
        $subscribe = Settings::find()->where(['kay' => ['subscribe_photo', 'subscribe_title', 'subscribe_text']])->all();
        $model = new Subscribers();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('message', Yii::t('app','Thanks for subscription please check your email'));
            $model->sendEmail();
        }elseif($model->getErrors()){
            Yii::$app->session->setFlash('message', Yii::t('app',$model->getErrors('email')[0]));
        }


//        var_dump($technology);die;
        return $this->render('index', [
            'posts' => $posts,
            'products' => $products,
            'technology' => $technology,
            'aromats' => $aromats,
            'slider1' => $slider1,
            'slider2' => $slider2,
            'slider2_text' => $slider2_text,
            'subscribe' => $subscribe,
            'gallery' => $gallery,
            'model' => $model,
        ]);
    }
    public function actionAcceptSubscribe(){
        if( Yii::$app->request->get('email') && Yii::$app->request->get('token')){
            $token = Yii::$app->request->get('token');
            $email = Yii::$app->request->get('email');
            $subscriber = Subscribers::find()->where(['email' => $email])->andWhere(['token' => $token])->one();
            if($subscriber){
                $subscriber->active = true;
                $subscriber->save();
            }
        }
        return $this->goHome();
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        return $this->redirect('/');
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            $model->password = '';
//
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        return $this->redirect('/');
//        Yii::$app->user->logout();
//
//        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->layout = 'post';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->layout = 'post';
        $about = Settings::find()->where(['kay' => ['about_description', 'about_text1', 'about_text2', 'about_text3','about_text4','about_image']])->all();

        return $this->render('about', [
            'about' => $about
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        return $this->redirect('/');
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        return $this->redirect('/');
//        $model = new PasswordResetRequestForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
//            } else {
//                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
//            }
//        }
//
//        return $this->render('requestPasswordResetToken', [
//            'model' => $model,
//        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        return $this->redirect('/');
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->session->setFlash('success', 'New password saved.');
//
//            return $this->goHome();
//        }
//
//        return $this->render('resetPassword', [
//            'model' => $model,
//        ]);
    }

    public function actionSetAge($age){

        if($age == 'yes'){
            Yii::$app->session->set('18+','yes');
            return $this->goBack('index');
        }else{
            return $this->render('plus');
        }
    }

    public function actionPost($id)
    {
        $this->layout = 'post';
        $post = Post::find()->with('media')->where(['id' => $id])->one();
        $posts = Post::find()->with('media')->orderBy(['id' => SORT_DESC])->limit(3)->all();
        return $this->render('post', ['post' => $post, 'posts' => $posts]);
    }


    public function actionProduct($id)
    {
        $this->layout = 'post';
        $product = Product::find()->with('media')->where(['id' => $id])->one();
        $products = Product::find()->with('media')->where(['type' => 0])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        return $this->render('product', ['product' => $product, 'products' => $products]);
    }
}
