<?php

use yii\db\Migration;

/**
 * Handles the creation of table `media`.
 */
class m180727_142455_create_media_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('media', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'title_am' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'description_am' => $this->text(),
            'description_ru' => $this->text(),
            'description_en' => $this->text(),
            'type' => $this->integer(),
            'unique_name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('media');
    }
}
