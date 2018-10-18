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
        $this->menu .= '</div>';
        return $this->menu;
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