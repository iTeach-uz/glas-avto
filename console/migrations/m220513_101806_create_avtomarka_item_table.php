<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%avtomarka_item}}`.
 */
class m220513_101806_create_avtomarka_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%avtomarka_item}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey('avtomarka ni avtomarka_item ga', 'avtomarka_item', 'category_id', 'avtomarka', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%avtomarka_item}}');
    }
}
