<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sotish_lang}}`.
 */
class m220509_130315_create_sotish_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sotish_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('sotish ni sotish_lang ga', 'sotish_lang', 'owner_id', 'sotish', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sotish_lang}}');
    }
}
