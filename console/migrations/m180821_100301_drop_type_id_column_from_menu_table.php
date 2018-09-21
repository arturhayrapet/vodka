<?php

use yii\db\Migration;

/**
 * Handles dropping type_id from table `menu`.
 */
class m180821_100301_drop_type_id_column_from_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('menu','type_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
