<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180801_121529_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title_am' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'bottled' => $this->date(),
            'ingredient' => $this->string(),
            'description_am' => $this->string(),
            'description_ru' => $this->string(),
            'description_en' => $this->string(),
            'content_am' => $this->string(),
            'content_ru' => $this->string(),
            'content_en' => $this->string(),
            'image' => $this->string(),
            'size' => $this->integer(),
            'degree' => $this->integer()->defaultValue(45),
            'type' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
