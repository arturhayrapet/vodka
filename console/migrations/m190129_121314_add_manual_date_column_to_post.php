<?php

use yii\db\Migration;

/**
 * Class m190129_121314_add_manual_date_column_to_post
 */
class m190129_121314_add_manual_date_column_to_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'manual_date', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190129_121314_add_manual_date_column_to_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190129_121314_add_manual_date_column_to_post cannot be reverted.\n";

        return false;
    }
    */
}
