<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m180821_101819_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'kay' => $this->string(),
            'value_am' => $this->string(),
            'value_ru' => $this->string(),
            'value_en' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('settings');
    }
}
