<?php

use yii\db\Migration;

/**
 * Class m181018_123549_add_subscribe_to_post
 */
class m181018_123549_add_subscribe_to_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post','subscribers',$this->boolean()->defaultValue(false));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181018_123549_add_subscribe_to_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181018_123549_add_subscribe_to_post cannot be reverted.\n";

        return false;
    }
    */
}
