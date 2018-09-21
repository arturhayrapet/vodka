<?php

use yii\db\Migration;

/**
 * Handles dropping type from table `menu`.
 */
class m180821_095939_drop_type_column_from_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('menu', 'type');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
