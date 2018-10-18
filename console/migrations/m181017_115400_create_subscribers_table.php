<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribers`.
 */
class m181017_115400_create_subscribers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribers', [
            'id' => $this->primaryKey(),
            'active' => $this->boolean()->defaultValue(false),
            'email' => $this->string(150)->notNull(),
            'token' => $this->string()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscribers');
    }
}
