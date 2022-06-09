<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consumers_lang}}`.
 */
class m220514_014414_create_consumers_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consumers_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('consumers ni consumers_lang ga', 'consumers_lang', 'owner_id', 'consumers', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%consumers_lang}}');
    }
}
