<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category_lang}}`.
 */
class m220514_015702_create_product_category_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('product_category ni product_category_lang ga', 'product_category_lang', 'owner_id', 'product_category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_category_lang}}');
    }
}
