<?php

use yii\db\Migration;

/**
 * Handles adding position to table `menu`.
 */
class m180727_141136_add_position_column_to_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('menu', 'position', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('menu', 'position');
    }
}
