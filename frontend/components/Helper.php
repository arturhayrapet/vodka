<?php

namespace frontend\components;


use common\models\Advertisement;
use common\models\Chat;
use common\models\Menu;
use common\models\Metas;
use common\models\Posts;
use common\models\Rates;
use common\models\Settings;
use common\models\Tags;
use common\models\Translation;
use Yii;
use yii\base\Component;
use common\models\Menus;
use yii\helpers\ArrayHelper;
use common\models\Videos;
use SoapClient;
use SoapFault;

class Helper extends Component
{
    public $menu;
    public static $social = ['Address', 'text', 'facebook', 'Phone', 'Email', 'vimeo', 'linkedin', 'instagram', 'pinterest', 'google', 'twitter', 'youtube-play', 'youtube'];

    public function getMenuChild($menu, $sub = 1)
    {
        $this->menu .= ' <div class="dropdown-content">';
        foreach ($menu as $item) {
            if (!empty($item['items'])) {
                $this->menu .= '<a href="' . '/' . Yii::$app->language . '/' . $item['url'][0] . '">' . $item['label'] . '</a>';
                $this->getMenuChild($item['items'], ++$sub);
            } else {
                $this->menu .= '<a href="' . '/' . Yii::$app->language . '/' . $item['url'][0] . '">' . $item['label'] . '</a>';
            }
        }
        //  if ($sub > 1) {
        //$this->menu .= '</li>';
        // }
        $this->menu .= '</div>';
        return $this->menu;
    }


    public static function getFooterMenus()
    {
        $footer = \common\models\Settings::find()->select('key,value')->where(['in', 'key', self::$social])->asArray()->all();
        /*$footerEmail = '';
        $footerAddress = '';*/
        $footerPhone = '';
        $social = [];
        foreach ($footer as $key => $foot) {
            switch ($foot['key']) {
                case 'phone':
                    $footerPhone = $foot['value'];
                    break;
                case 'text' :
                    $text = $foot['value'];
                    break;
                case 'Email':
                    $footerEmail = $foot['value'];
                    break;
                case 'Address':
                    $footerAddress = $foot;
                    break;
                default:
                    $social[$foot['key']] = $foot['value'];
            }
        }

        /*$menusObj = new Menus();
        $menus = $menusObj->getMenus('footer_1');
        $footerMenus = $menusObj->getMenus('footer_3');
        $footerMenuItems = '';
        $menuItems = '<ul>';
        foreach ($menus as $menu):
            $items = empty($menu['items']);
            $href = !$items ? 'javascript:void(0);' : $menu['url'][0];
            $class = !$items ? 'submenu' : '';
            $menuItems .= '<li class="' . $class . '">
            <a href="' . '/' .Yii::$app->language.$href . '"
               class="show-submenu">' . $menu['label'] . '
            </a>';
            if (!$items) {
                $menuItems .= Yii::$app->helper->getMenuChild($menu['items']);
            }
            $menuItems = $menuItems . '</li>';

        endforeach;
        $menuItems .= '</ul>';

        foreach ($footerMenus as $footerMenu):

            $items = empty($footerMenu['items']);
            $href = !$items ? 'javascript:void(0);' : $footerMenu['url'][0];
            $class = !$items ? 'submenu' : '';
            $footerMenuItems .= '<li class="' . $class . '">
            <a href="' . $href . '"
               class="show-submenu">' . $footerMenu['label'] . '
            </a>';
            if (!$items) {
                $footerMenuItems .= Yii::$app->helper->getMenuChild($footerMenu['items']);
            }
            $footerMenuItems = $footerMenuItems . '</li>';
        endforeach;*/

        // return ['footerEmail' => $footerEmail, 'address' => $footerAddress, 'social' => $social, 'footerPhone' => $footerPhone, 'menuItems' => $menuItems, 'footerMenuItems' => $footerMenuItems];
        return ['phone' => $footerPhone, 'text' => $text, 'email' => $footerEmail, 'social' => $social];
    }

    public static function getLanguage()
    {
        return Yii::$app->params['lang'][Yii::$app->language];
    }


    public static function getMetas($type = null, $type_id = null)
    {
        if ($type_id) {
            return Metas::find()->where(['type' => $type])->andWhere(['type_id' => $type_id])->asArray()->all();
        } else {
            return Metas::find()->where(['global' => true])->asArray()->all();
        }
    }

    public static function getMenus()
    {
        return Menu::find()->all();
    }

    public static function getFooter()
    {
        return Settings::find()->where(['kay' => ['address', 'phone', 'email']])->all();

    }

    public static function getSocial()
    {
        return Settings::find()->where(['kay' => ['facebook', 'instagram', 'twitter', 'linkedin']])->all();
    }

}