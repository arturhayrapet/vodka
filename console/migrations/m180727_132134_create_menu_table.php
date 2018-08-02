<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m180727_132134_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name_am'=>$this->string(),
            'name_en'=>$this->string(),
            'name_ru'=>$this->string(),
            'type'=>$this->string(),
            'type_id'=>$this->integer(),
            'url'=>$this->string(),

        ]);
    }

    /**  ,,, ,,,
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menu');
    }
}
