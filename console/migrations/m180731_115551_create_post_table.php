<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180731_115551_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title_am' =>$this->string(),
            'title_ru' =>$this->string(),
            'title_en' =>$this->string(),
            'caption_am' =>$this->string(),
            'caption_ru' =>$this->string(),
            'caption_en' =>$this->string(),
            'content_am' =>$this->text(),
            'content_ru' =>$this->text(),
            'content_en' =>$this->text(),
            'picture' =>$this->string(),
            'type' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}
