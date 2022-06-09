<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220514_015710_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
        
        $this->addForeignKey('product_category ni product ga', 'product', 'category_id', 'product_category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
