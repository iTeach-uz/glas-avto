<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tanlov_item}}`.
 */
class m220513_053104_create_tanlov_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tanlov_item}}', [
            'id' => $this->primaryKey(),
            'value' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
        
        $this->addForeignKey('tanlov ni tanlov_item ga', 'tanlov_item', 'category_id', 'tanlov', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tanlov_item}}');
    }
}
